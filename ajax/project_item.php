<?php
require ('../include/init.inc.php');
$method =$project_class_id  ='';
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
}
