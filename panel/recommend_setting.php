<?php
require ('../include/init.inc.php');
$one_people_price=$iteration_num=$iteration_people_price="";
extract ( $_REQUEST, EXTR_IF_EXISTS );
$recommend_set=Recommendsetting::getRecommend_set();
if(Common::isPost()){//是否提交
    if($recommend_set){//如果有值则更新
        $update_array=array("one_people_price"=>$one_people_price,"iteration_num"=>$iteration_num,"iteration_people_price"=>$iteration_people_price);
        $result=Recommendsetting::update_set($recommend_set['recommend_id'], $update_array);
        SysLog::addLog ( UserSession::getUserName(), 'SET', 'Recommend' ,$result);
        Common::exitWithSuccess ('推荐规则设置成功','panel/recommend_setting.php');
       
    }else{
        $insert_array=array("one_people_price"=>$one_people_price,"iteration_num"=>$iteration_num,"iteration_people_price"=>$iteration_people_price);
        $insert_id=Recommendsetting::insert_set($insert_array);
        if($insert_id){
            SysLog::addLog ( UserSession::getUserName(), 'SET', 'Recommend' ,$insert_id );
            Common::exitWithSuccess ('推荐规则设置成功','panel/recommend_setting.php');
        }
    }
    OSAdmin::alert("error");
}
Template::assign("recommend_set",$recommend_set);
Template::display("panel/recommend_setting.tpl");
