<?php
require ('../include/init.inc.php');
$search=$page_no=$member_level_id=$member_condition=$method=$member_id=$member_name=$member_mobile=$member_card=$member_sex=$member_age="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
$member_level=Memberlevel::get_levelAll();
//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;
$new_price=0;
if($method=="edit"&&$member_id){
    $member_info=Member::get_member_info($member_id);
    if(Common::isPost()){//是否提交
        if($member_info['member_mobile']!=$member_mobile||$member_info['member_card']!=$member_card){
            if(!Member::is_only($member_mobile)||!Member::is_only($member_card)){
                Common::exitWithError('当前手机已注册或会员号已存在,请勿重复添加！',"panel/member_list.php?method=edit&member_id=".$member_id);
            }
        }
        if($member_info['member_level_id']!=$member_level_id){//如果修改了会员等级则需更新增加会员对应等级的余额
            $member_money_info=Membermoney::get_member_money($member_id);
            $member_level_one=Memberlevel::get_level($member_level_id);
            $new_price=$member_level_one['m_level_condition']+$member_money_info['m_money_price'];//累加会员原先余额
        }
        $update_array=array(
            "member_name"=>$member_name,
            "member_mobile"=>$member_mobile,
            "member_card"=>$member_card,
            "member_sex" =>$member_sex,
            "member_age"=>$member_age,
            'member_level_id'=>$member_level_id
        );
        $result=Member::update_member($member_id, $update_array,$new_price);
        if($result===0||$result){
            SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Member' ,$member_id);
            Common::exitWithSuccess ('会员信息修改成功','panel/member_list.php');
        }
        OSAdmin::alert("error");
    
    }
    Template::assign("member_info",$member_info);
    Template::assign("member_level",$member_level);
    Template::assign("method",$method);
    Template::display("panel/member_add.tpl");
    exit;
}elseif($method=="member_detailed"&&$member_id){//查看会员余额
    $page_size = 10;
    $member_info=Member::get_member_info($member_id);
    if($member_info){
        $member_info['member_level']=Memberlevel::get_level($member_info['member_level_id']);
        $member_info['member_money']=Membermoney::get_member_money($member_info['member_id']);
    }
    $start = ($page_no - 1) * $page_size;
    $row_count = Moneydetailed::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $member_detailed=Moneydetailed::get_memeber_detailed($start,$page_size,$member_id);
    $page_html=Pagination::showPager("member_list.php?method=member_detailed&member_id=$member_id",$page_no,$page_size,$row_count);
    Template::assign ( 'member_detailed',$member_detailed );
    Template::assign ( 'page_html', $page_html );
    Template::assign("admin_url",ADMIN_URL);
    Template::assign ( 'page_no', $page_no );
    Template::assign("member_info",$member_info);
    Template::display("panel/member_detailed.tpl");
    exit;
}else{
    $start = ($page_no - 1) * $page_size;
    $row_count = Member::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    if($search){
        $member_list=Member::getAllMember($start,$page_size,$member_condition,$member_level_id);
    }else{
        $member_list= Member::getAllMember($start,$page_size);
    }
}


//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");
$page_html=Pagination::showPager("member_list.php?member_level_id=$member_level_id&member_condition=$member_condition&search=$search",$page_no,$page_size,$row_count);
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_no', $page_no );
Template::assign("member_list",$member_list);
Template::assign("member_level",$member_level);
Template::display ( 'panel/members.tpl' );