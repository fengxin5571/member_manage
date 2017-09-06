<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Sales extends Base{
    // 表名
    private static $table_name = 'sales';
    // 查询字段
    private static $columns = 'sales_id,sales_type,sales_people_name,sales_people_mobile,sales_price,sales_admin_id,sales_item_id,sales_add_time,sales_project_class';
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //获取总数
    public static function count($condition = '') {
        $db=self::__instance();
        $num = $db->count ( self::getTableName(), $condition );
        return $num;
    }
    //搜索总数
    public static function searchcount($project_class_id,$project_name){
        $db=self::__instance();
        $condition = array();
        $condition['project_class_id']=$project_class_id;
        if($project_name!=""){
            $condition['LIKE']=array("project_name"=>$project_name);
        }
        $num = $db->count ( self::getTableName(), $condition );
        return $num;
    }
    //获取列表
    public static function getAllsales($start,$page_size){
        $db=self::__instance();
        $limit ="";
        $where = "and 1=1 ";
        if($page_size){
            $limit =" limit $start,$page_size ";
        }
        $sql="select ".self::$columns." from ".self::getTableName()." s  left  join ".User::getTableName() ." u  on s.sales_admin_id=u.user_id  where ".$where." ".$limit;
        $list=$db->query($sql)->fetchAll();
        if ($list) {
            return $list;
        }
        return array ();
    }
}