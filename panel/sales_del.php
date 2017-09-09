<?php
require ('../include/init.inc.php');
$sales_id='';
extract ( $_REQUEST, EXTR_IF_EXISTS );
if($sales_id){
    $result=Sales::delete_sales($sales_id);
    if($result){
        SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Sales' ,$result );
        Common::exitWithSuccess ('消费信息删除成功','panel/sales_manage.php');
    }
    Common::exitWithError('消费信息删除失败','panel/sales_manage.php');
}