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
       $insert_array();
    }
}
Template::assign("member_level",$member_level);
Template::display("panel/member_add.tpl");