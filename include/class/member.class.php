<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Member extends Base{
    // 表名
    private static $table_name = 'member';
    //查询字段
    private  static $columns ="";
    
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //会员列表
    public static function getAllMember($start ='' ,$page_size='' ){
        $db=self::__instance();
        $limit ="";
        if($page_size){
            $limit =" limit $start,$page_size ";
        }
        $sql="select  *  from ".self::$table_name." order by member_id desc ".$limit;
        $list = $db->query($sql)->fetchAll();
        if ($list) {
            return $list;
        }
        return array ();
    }
    //添加会员
    public static function addMember($user_data ){
        if(!$user_data||!is_array($user_data)){
            return false;
        }
        $db=self::__instance();
        $id = $db->insert ( self::getTableName(), $user_data );
        return $id;
    }
    //删除会员
    public static function dropMember($user_id){
        if(empty($user_id)||! is_numeric($user_id)){
            return false;
        }
        $db=self::__instance();
        $result=$db->delete(self::$table_name,$user_id);
        return $result;
    }
    //会员总数
    public static function count($condition = '') {
        $db=self::__instance();
        $num = $db->count ( self::getTableName(), $condition );
        return $num;
    }
}