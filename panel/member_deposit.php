<?php
require ('../include/init.inc.php');
$method=$member_id=$member_add_money="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
if($method=="add_money"&&$member_id){//充值
    $member_info=Member::get_member_info($member_id);
    if(empty($member_info)){
        Common::exitWithError("对不起，没有此会员！", "panel/member_list.php");
    }
    if(Common::isPost()){//是否提交
        $member_money_info=MemberMoney::get_member_money($member_id);//获取会员金额
        if($member_money_info){
            $new_price=$member_money_info['m_money_price']+$member_add_money;
            $money_data['m_money_price']=$new_price;
            $money_data['m_member_id']=$member_id;
            $result=MemberMoney::update_money($money_data);
            if($result===0||$result){
                $insert_array=array(
                    'detailed_operation'=>"+",
                    "detailed_price"=>$member_add_money,
                    "detailed_admin"=>UserSession::getUserName(),
                    "detailed_member_id"=>$member_id,
                    "detailed_time"=>time(),
                    "detailed_type"=>0
                );
                $insert_id=Moneydetailed::add_detailed($insert_array);
                if($insert_id){
                    SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Member' ,$insert_id);
                    Common::exitWithSuccess ('会员充值成功','panel/member_list.php?method=member_detailed&member_id='.$member_id);
                }
            }
        }
        OSAdmin::alert("error");
    }
    Template::assign("member_info",$member_info);
    Template::display("panel/add_money.tpl");
}
