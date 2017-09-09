<?php
require ('../include/init.inc.php');
$search=$method=$sales_people_name=$sales_people_mobile=$project_class_id=$sales_price=$project_item=$sales_type=$sales_id=$page_no="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;
$project_classes=Projectclass::getAllproject_class();
if($method=="add_salse_type1"){//非会员消费录入

    if(Common::isPost()){//是否提交
        $insert_array=array(
            "sales_type"=>1,
            "sales_people_name"=>$sales_people_name,
            "sales_people_mobile"=>$sales_people_mobile,
            "sales_price"=>$sales_price,
            "sales_admin_name"=>UserSession::getUserName(),
            "sales_project_class"=>$project_class_id,
            "sales_add_time"      =>time(),
        );
        $insert_id=Sales::add_sales($insert_array,$project_item);
        if($insert_id){
            SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Sales' ,$insert_id );
            Common::exitWithSuccess ('消费录入成功','panel/sales_manage.php');
        }
        OSAdmin::alert("error");
    }
    Template::assign("admin_url",ADMIN_URL);
    Template::assign("project_classes",$project_classes);
    Template::display("panel/sales_add_type1.tpl");
    exit;
}elseif($method=="sales_info"&&$sales_id){//消费详单
    $sales_info=Sales::get_sales_info($sales_id);
    Template::assign("sales_info",$sales_info);
    Template::display("panel/sales_info.tpl");
    exit;
    
}else{ 
    if($search){
        $row_count = Sales::searchcount ($sales_type,$sales_people_name);
        $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
        $total_page=$total_page<1?1:$total_page;
        $page_no=$page_no>($total_page)?($total_page):$page_no;
        $start = ($page_no - 1) * $page_size;
        $sales_list = Sales::getAllsales ( $start , $page_size,$sales_type,$sales_people_name );
    }else{
        $row_count = Sales::count ();
        $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
        $total_page=$total_page<1?1:$total_page;
        $page_no=$page_no>($total_page)?($total_page):$page_no;
        $start = ($page_no - 1) * $page_size;
        $sales_list = Sales::getAllsales ( $start , $page_size );
    }
}
//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");
$page_html=Pagination::showPager("sales_manage.php?sales_type=$sales_type&sales_people_name=$sales_people_name&search=$search",$page_no,$page_size,$row_count);
Template::assign ( 'page_no', $page_no );
Template::assign ( 'page_html', $page_html );
Template::assign("sales_list",$sales_list);
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display("panel/sales_manage.tpl");