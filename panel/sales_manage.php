<?php
require ('../include/init.inc.php');
$search=$method="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
$project_classes=Projectclass::getAllproject_class();
if($method=="add_salse_type1"){//非会员消费录入
    Template::assign("admin_url",ADMIN_URL);
    Template::assign("project_classes",$project_classes);
    Template::display("panel/sales_add_type1.tpl");
    exit;
}else{ 
    if($search){
        $row_count = Project::searchcount ($project_class_id,$project_name);
        $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
        $total_page=$total_page<1?1:$total_page;
        $page_no=$page_no>($total_page)?($total_page):$page_no;
        $start = ($page_no - 1) * $page_size;
        $projects = Project::search ($project_class_id, $project_name,$start , $page_size );
    }else{
        $row_count = Sales::count ();
        $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
        $total_page=$total_page<1?1:$total_page;
        $page_no=$page_no>($total_page)?($total_page):$page_no;
        $start = ($page_no - 1) * $page_size;
        $projects = Project::getAllProjects ( $start , $page_size );
    }
}




//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");
$page_html=Pagination::showPager("sales_manage.php?project_class_id=$project_class_id&project_name=$project_name&search=$search",$page_no,$page_size,$row_count);
Template::assign ( 'page_no', $page_no );
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display("panel/sales_manage.tpl");