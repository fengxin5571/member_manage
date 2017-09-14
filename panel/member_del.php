<?php
require ('../include/init.inc.php');
$method=$member_id='';
extract ( $_REQUEST, EXTR_IF_EXISTS );
if($method='del'&&$member_id){
    $result=Member::dropMember($member_id);
    if($result){
        SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Member' ,$result );
        Common::exitWithSuccess ('会员删除成功','panel/member_list.php');
    }
    Common::exitWithError('会员删除失败','panel/member_list.php');

}