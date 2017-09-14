<?php
require ('../include/init.inc.php');
$member_mobile=$member_card=$member_name=$member_age=$member_sex=$member_level_id="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
$member_level=Memberlevel::get_levelAll();
if(empty($member_level)){
    Common::exitWithError("请先添加会员等级！","panel/member_level.php?method=add_level",3,"error");
}
if(Common::isPost()){
    if(!Member::is_only($member_mobile)||!Member::is_only($member_card)){
        OSAdmin::alert("error","当前手机已注册或会员号已存在，请勿重复添加！");
    }else{
       $insert_array=array(
           "member_name"=>$member_name,
           "member_mobile"=>$member_mobile,
           "member_card"=>$member_card,
           "member_sex" =>$member_sex,
           "member_age"=>$member_age,
           'member_level_id'=>$member_level_id,
           "member_add_time"=>time(),
       );
       $member_level_info=Memberlevel::get_level($member_level_id);//获取指定的会员等级信息
       $insert_id=Member::addMember($insert_array, $member_level_info['m_level_condition']);
       if($insert_id){
           SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Member' ,$insert_id);
           Common::exitWithSuccess ('会员办卡成功','panel/member_list.php');
       }
       OSAdmin::alert("error");
    }
}
Template::assign("member_level",$member_level);
Template::display("panel/member_add.tpl");