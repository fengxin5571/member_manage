<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Memberlevel extends Base{
    // 表名
    private static $table_name = 'member_level';
    // 查询字段
    private static $columns = 'm_level_id,m_level_name,m_level_desc,m_level_condition';
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //获取列表
    public static function get_levelAll(){
        $db=self::__instance();
        $list=$db->select(self::getTableName(),self::$columns);
        return $list;
    }
    //获取单个信息
    public static function get_level($m_level_id){
        if(empty($m_level_id)){
            return false;
        }
        $db=self::__instance();
        $condition['m_level_id']=$m_level_id;
        $member_level=$db->get(self::getTableName(),self::$columns,$condition);
        return $member_level;
    }
    //增加会员等级
    public static function add_level($member_level){
        if(empty($member_level)&&!is_array($member_level)){
            return false;
        }
        $db=self::__instance();
        $insert_id=$db->insert(self::getTableName(),$member_level);
        return $insert_id;
    }
    //修改会员等级
    public static  function update_level($m_level_id,$member_data){
        if(empty($m_level_id)||empty($member_data)&&!is_array($member_data)){
            return false;
        }
        $db=self::__instance();
        $condition['m_level_id']=$m_level_id;
        $result=$db->update(self::getTableName(),$member_data,$condition);
        return $result;
    }
    //删除会员等级
    public static function delete_level($m_level_id){
        if(empty($m_level_id)){
            return false;
        }
        $db=self::__instance();
        $condition['m_level_id']=$m_level_id;
        $result=$db->delete(self::getTableName(),$condition);
        return $result;
    }
}