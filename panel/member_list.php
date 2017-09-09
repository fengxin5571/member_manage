<?php
require ('../include/init.inc.php');
$search=$page_no="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;
$start = ($page_no - 1) * $page_size;
if($search){
    
}else{
    $row_count = Member::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    $member_list= Member::getAllMember($start,$page_size);
}

//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");
$page_html=Pagination::showPager("member_list.php?project_class_id=$project_class_id&project_name=$project_name&search=$search",$page_no,$page_size,$row_count);
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_no', $page_no );
Template::display ( 'panel/members.tpl' );