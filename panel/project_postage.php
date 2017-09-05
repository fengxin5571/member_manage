<?php
require ('../include/init.inc.php');
$project_id=$method=$postage_type_1_price=$postage_type_2_price=$postage_type_2_count='';
extract ( $_REQUEST, EXTR_IF_EXISTS );
$project_postage=Projectpostage::get_postage($project_id);
if($method =="set_postage"&&!empty($project_id)){
   if($project_postage){//如果有值就更新 
       if(Common::isPost()){
           $update_array=array();
           $update_array[1]=array("postage_type"=>1,"postage_price"=>$postage_type_1_price,"project_id"=>$project_id);
           $update_array[2]=array("postage_type"=>2,"postage_price"=>$postage_type_2_price,"postage_count"=>$postage_type_2_count,"project_id"=>$project_id);
           $update_ids=Projectpostage::update_postage($project_id, $update_array);
           if(count($update_ids)==2){
               SysLog::addLog ( UserSession::getUserName(), 'SET', 'Postage' ,"$project_id",'SUCCESS' );
               Common::exitWithSuccess("设置项目资费成功", "panel/project_postage.php");
           }
           OSAdmin::alert("error");
       }
       Template::assign("project_id",$project_id);
       Template::assign("project_postage",$project_postage);
       Template::display("panel/project_postage.tpl");
       exit;
   }else{//插入
       $insert_array=array();
       $insert_array[1]=array("postage_type"=>1,"postage_price"=>$postage_type_1_price,"project_id"=>$project_id);
       $insert_array[2]=array("postage_type"=>2,"postage_price"=>$postage_type_2_price,"postage_count"=>$postage_type_2_count,"project_id"=>$project_id);
       $insert_ids=Projectpostage::add_postage($insert_array);
      if(count($insert_ids)==2){
          SysLog::addLog ( UserSession::getUserName(), 'SET', 'Postage' ,$project_id,'SUCCESS' );
          Common::exitWithSuccess("设置项目资费成功", "panel/project_postage.php");
      }
   }
   OSAdmin::alert("error");
}

$projects=Project::getAllProjects(0,0);//获取项目列表
if(empty($projects)&&!is_array($projects)){
       Common::exitWithError('请先去项目列表中设置项目','panel/projects.php',3,"error");
}
Template::assign("project_id",$project_id);
Template::assign("projects",$projects);
Template::assign("project_postage",$project_postage);
Template::display("panel/project_postage.tpl");