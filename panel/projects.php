<?php
require ('../include/init.inc.php');
$search=$project_name=$project_class_id=$project_desc=$method=$project_id=$page_no="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;
$project_classes=Projectclass::getAllproject_class($project_class_id,$project_name);
if($method=="add_project"){
    if(empty($project_classes)){
        Common::exitWithError("请先添加项目分类！","panel/project_class.php?method=add_class",3,"error");
    }
    if(Common::isPost()){//是否提交
        if(!Project::is_only($project_name,$project_class_id)){
            Common::exitWithError("请勿添加重复数据！","panel/projects.php",3,"error");
        }
        $insert_array=array("project_name"=>$project_name,"project_class_id"=>$project_class_id,"project_desc"=>$project_desc);
        $project_id=Project::add_project($insert_array);
        if($project_id){
            SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Project' ,$project_id,'SUCCESS' );
            Common::exitWithSuccess ('项目添加成功','panel/projects.php');
        }
        OSAdmin::alert("error");
    }
    
    Template::assign("project_classes",$project_classes);
    Template::display("panel/project_add.tpl");
    exit;
}elseif($method=="edit"&&!empty($project_id)){//修改项目
    if(Common::isPost()){//是否提交修改
        $update_array=array("project_name"=>$project_name,"project_desc"=>$project_desc,"project_class_id"=>$project_class_id);
        $result=Project::updateProject($update_array, $project_id);
        if($result===0||$result){
            SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Project' ,$project_id,'SUCCESS' );
            Common::exitWithSuccess ('项目修改成功','panel/projects.php');
        }
        OSAdmin::alert("error");
    }
    $project_info=Project::getProject_info($project_id);
    Template::assign("project_classes",$project_classes);
    Template::assign("project_info",$project_info);
    Template::display("panel/project_add.tpl");
    exit;
}elseif($method=="del"&&!empty($project_id)){//删除项目
    $result=Project::delProject($project_id);
    if($result){
        SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Project' ,$project_id,'SUCCESS' );
        Common::exitWithSuccess ('项目删除成功','panel/projects.php');
    }
    OSAdmin::alert("error");
}else{
    if($search){
        $row_count = Project::searchcount ($project_class_id,$project_name);
        $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
        $total_page=$total_page<1?1:$total_page;
        $page_no=$page_no>($total_page)?($total_page):$page_no;
        $start = ($page_no - 1) * $page_size;
        $projects = Project::search ($project_class_id, $project_name,$start , $page_size );
    }else{
        $row_count = Project::count ();
        $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
        $total_page=$total_page<1?1:$total_page;
        $page_no=$page_no>($total_page)?($total_page):$page_no;
        $start = ($page_no - 1) * $page_size;
        $projects = Project::getAllProjects ( $start , $page_size );
    }
}
//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");
$page_html=Pagination::showPager("projects.php?project_class_id=$project_class_id&project_name=$project_name&search=$search",$page_no,$page_size,$row_count);
Template::assign("project_classes",$project_classes);
Template::assign ( 'projects', $projects );
Template::assign ( 'page_no', $page_no );
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display("panel/projects.tpl");