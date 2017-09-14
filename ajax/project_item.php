<?php
require ('../include/init.inc.php');
$method =$project_class_id  =$member_condition=$member_id='';
extract ( $_REQUEST, EXTR_IF_EXISTS );
if($method=="add"&&!empty($project_class_id)){
    $project_list=Project::search($project_class_id,"",0,0);
    if($project_list){
        foreach ($project_list as &$project){
          $project_postage=Projectpostage::get_postage($project['project_id']);
            if($project_postage){
                $project['project_postage']=$project_postage;
            }
        }
        $ret=json_encode($project_list);
    }
    echo $ret;
}elseif($method=="get_member"&&$member_condition){
    $member_array=array();
    $member_info=Member::getAllMember(0,0,$member_condition);
    
    if($member_info){
        $member_array['member_info']=$member_info;
    }
    $ret=json_encode($member_array);
    echo $ret;
}elseif($method=="input_member_sale"&&$member_id){
    $member_info=Member::get_member_info($member_id);
    $member_array=array();
    if($member_info){
        $member_array['member_info']=$member_info;
    }
     $ret=json_encode($member_array);
     echo $ret;
}
