<?php
require ('../include/init.inc.php');
$method =$project_class_id  ='';
extract ( $_REQUEST, EXTR_IF_EXISTS );
if($method=="add"&&!empty($project_class_id)){
    $project_list=Project::search($project_class_id,"",0,0);
    if($project_list){
        $ret=json_encode($project_list);
    }
    echo $ret;
}
