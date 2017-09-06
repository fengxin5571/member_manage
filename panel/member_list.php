<?php
require ('../include/init.inc.php');
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
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_no', $page_no );
Template::display ( 'panel/members.tpl' );