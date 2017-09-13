<?php
require ('../include/init.inc.php');
$search=$page_no=$member_level_id=$member_condition=$method=$member_id="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
$member_level=Memberlevel::get_levelAll();
//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;
if($method=="edit"&&$member_id){
    if(Common::isPost()){//是否提交
     
    }
    $member_info=Member::get_member_info($member_id);
    Template::assign("member_info",$member_info);
    Template::assign("member_level",$member_level);
    Template::display("panel/member_add.tpl");
    exit;
}else{
    $start = ($page_no - 1) * $page_size;
    $row_count = Member::count ();
    $total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
    $total_page=$total_page<1?1:$total_page;
    $page_no=$page_no>($total_page)?($total_page):$page_no;
    if($search){
        $member_list=Member::getAllMember($start,$page_size,$member_condition,$member_level_id);
    }else{
        $member_list= Member::getAllMember($start,$page_size);
    }
}


//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");
$page_html=Pagination::showPager("member_list.php?project_class_id=$project_class_id&project_name=$project_name&search=$search",$page_no,$page_size,$row_count);
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'page_no', $page_no );
Template::assign("member_list",$member_list);
Template::assign("member_level",$member_level);
Template::display ( 'panel/members.tpl' );