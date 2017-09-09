<?php
require ('../include/init.inc.php');
$method=$m_level_name=$m_level_desc=$m_level_condition=$m_level_id="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
if($method=="add_level"){//增加会员等级
    if(Common::isPost()){//是否提交数据
        $insert_array=array("m_level_name"=>$m_level_name,"m_level_desc"=>$m_level_desc,"m_level_condition"=>$m_level_condition);
        $insert_id=Memberlevel::add_level($insert_array);
        if($insert_id){
            SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Member' ,$insert_id );
            Common::exitWithSuccess ('会员等级添加成功','panel/member_level.php');
        }
        OSAdmin::alert("error");
    }
    Template::display("panel/member_level.add.tpl");
    exit;
}elseif($method=="edit_level"&&$m_level_id){//修改会员等级
    $member_level=Memberlevel::get_level($m_level_id);
    if(Common::isPost()){
        $update_array=array("m_level_name"=>$m_level_name,"m_level_desc"=>$m_level_desc,"m_level_condition"=>$m_level_condition);
        $result=Memberlevel::update_level($m_level_id, $update_array);
        if($result){
            SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Member' ,$result );
            Common::exitWithSuccess ('会员等级修改成功','panel/member_level.php');
        }
        OSAdmin::alert("error");
    }
    Template::assign("member_level",$member_level);
    Template::display("panel/member_level.add.tpl");
    exit;
    
}elseif($method=="del_level"&&$m_level_id){//删除会员等级
    $result=Memberlevel::delete_level($m_level_id);
    if($result){
        SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Member' ,$result );
        Common::exitWithSuccess ('会员等级删除成功','panel/member_level.php');
    }
    OSAdmin::alert("error");
}
$member_level_list=Memberlevel::get_levelAll();
//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");
Template::assign("member_levels",$member_level_list);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display("panel/member_level.tpl");