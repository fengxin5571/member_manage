<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Recommendsetting extends Base {
    // 表名
    private static $table_name = 'recommend_setting';
    // 查询字段
    private static $columns = 'recommend_id,one_people_price,iteration_num,iteration_people_price';
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //获取推荐设置
    public static function getRecommend_set(){
        $db=self::__instance();
        $recommend_set=$db->get(self::getTableName(),self::$columns);
        return $recommend_set;
    }
    //新增设置
    public static function insert_set($recommend_data){
        if(empty($recommend_data)&&!is_array($recommend_data)){
            return false;
        }
        $db=self::__instance();
        $insert_id=$db->insert(self::getTableName(),$recommend_data);
        return $insert_id;
    }
    //更新设置
    public static function update_set($recommed_id,$rcommend_data){
        if(empty($recommed_id)||empty($rcommend_data)&&!is_array($rcommend_data)){
            return  false;
        }
        $db=self::__instance();
        $condition['recommend_id']=$recommed_id;
        $result=$db->update(self::getTableName(),$rcommend_data,$condition);
        return $result;
    }
}