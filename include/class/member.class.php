<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Member extends Base{
    // 表名
    private static $table_name = 'member';
    //查询字段
    private  static $columns ="member_id,member_name,member_moblie,member_card,member_level_id,member_sex,member_age";
    
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //会员列表
    public static function getAllMember($start ='' ,$page_size='' ,$member_condition="",$member_level=0){
        $db=self::__instance();
        $limit ="";
        $where="1=1";
        if($page_size){
            $limit =" limit $start,$page_size ";
        }
        if($member_level>0){
            $where.=" AND  member_leavel_id=".$member_level;
        }
        $sql="select  *  from ".self::getTableName()." as m LEFT JOIN ".Memberlevel::getTableName()." as ml ON m.member_level_id=ml.m_level_id WHERE ".$where." ORDER BY m.member_id desc ".$limit;
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