<?php
require ('../include/init.inc.php');
$method=$p_class_name=$p_class_desc=$p_id="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
if($method =='add_class'){//增加
    if(Common::isPost()){
        $input_data = array ('p_class_name' => $p_class_name, 'p_class_desc' => $p_class_desc );
        $p_id=Projectclass::add_project_class($input_data);
        if($p_id){
            SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Projectclass' ,$p_id, json_encode($input_data) );
            Common::exitWithSuccess ('项目分类添加完成','panel/project_class.php');
        }
    }
    Template::display("panel/project_class_add.tpl");
    exit;
}elseif ($method =='del_class'&&!empty($p_id)){
    if(Common::isGet()){
        $result=Projectclass::del_project_class($p_id);
        if($result){
            SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Projectclass' ,$p_id,'SUCCESS' );
            Common::exitWithSuccess ('项目分类删除成功','panel/project_class.php');
        }
    }
    OSAdmin::alert("error");
}elseif($method="edit_class"&&!empty($p_id)){//修改
    if(Common::isPost()){
        $update_aray=array('p_class_name'=>$p_class_name,"p_class_desc"=>$p_class_desc);
        $result=Projectclass::update_project_class($p_id, $update_aray);
        if($result){
            SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Projectclass' ,$p_id, json_encode($update_aray)  );
            Common::exitWithSuccess ('项目分类修改成功','panel/project_class.php');
        }
         OSAdmin::alert("ERROR");
    }
    $project_class=Projectclass::get_one_class($p_id);
    Template::assign("project_class",$project_class);
    Template::display("panel/project_class_add.tpl");
    exit;
}


$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
$project_classes=Projectclass::getAllproject_class();
Template::assign("project_classes",$project_classes);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display("panel/project_class.tpl");