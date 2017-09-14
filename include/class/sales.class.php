<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Sales extends Base{
    // 表名
    private static $table_name = 'sales';
    // 查询字段
    private static $columns = 'sales_id,sales_type,sales_people_name,sales_people_mobile,sales_price,sales_admin_name,sales_add_time,sales_project_class,p_class_name';
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
    public static function searchcount($sales_type,$sales_people_name){
        $db=self::__instance();
        $condition = array();
        $condition['sales_type']=$sales_type;
        if($project_name!=""){
            $condition['LIKE']=array("sales_people_name"=>$sales_people_name);
        }
        $num = $db->count ( self::getTableName(), $condition );
        return $num;
    }
    //获取列表
    public static function getAllsales($start,$page_size,$sales_type=0,$sales_people_name=""){
        $db=self::__instance();
        $limit ="";
        $where = "1=1 ";
        if($page_size){
            $limit =" LIMIT $start,$page_size ";
        }
        if($sales_type>0){
            $where.=" AND  sales_type=$sales_type";
        }
        if($sales_people_name!=""){
           $where.=" AND  sales_people_name LIKE '%$sales_people_name%'";
        }
       $sql="SELECT ".self::$columns." FROM (".self::getTableName()." s  LEFT JOIN ".Projectclass::getTableName()." pc ON s.sales_project_class=pc. p_class_id)  WHERE $where ".$limit;
       $list=$db->query($sql)->fetchAll();
      
        if ($list) {
            foreach ($list as &$value){
                $value['sales_add_time']=Common::getDateTime($value['sales_add_time']);
            }
            return $list;
        }
        return array ();
    }
    //增加消费记录
    public static function add_sales($sales_data,$project_item_array){
        if(empty($sales_data)&&!is_array($sales_data)||!is_array($project_item_array)){
            return false;
        }
        $db=self::__instance();
        try{
            $db->beginTransaction();
            $insert_id=$db->insert(self::getTableName(),$sales_data);
            if($insert_id){
                foreach ($project_item_array as $item){
                    $insert_array=array("sales_id"=>$insert_id,"project_id"=>$item);
                    $insert_item_id=$db->insert(self::$table_prefix."sales_relation",$insert_array);
                    if(!$insert_item_id){
                        throw  new Exception("insert error");
                    }
                    
                }
                
            }else{
                throw  new Exception("insert error");
            }
            $db->commit();
        }catch (Exception $e){
            $db->rollBack();
        }
        return $insert_id;
    }
    //获取单个信息
    public static function get_sales_info($sales_id){
        if(empty($sales_id)){
            return false;
        }
        $db=self::__instance();
        $sql="SELECT ".self::$columns." FROM (".self::getTableName()." s  LEFT JOIN ".Projectclass::getTableName()." pc ON s.sales_project_class=pc. p_class_id)  WHERE sales_id= ".$sales_id;
        $sales_info=$db->query($sql)->fetch();
        if($sales_info){
            $sql="SELECT * FROM ".self::$table_prefix."sales_relation se LEFT JOIN ".Project::getTableName()." p ON se.project_id = p.project_id WHERE se.sales_id= ".$sales_info['sales_id'];
            $sales_info['sales_item']=$db->query($sql)->fetchAll();
            $sales_info['sales_add_time']=Common::getDateTime($sales_info['sales_add_time']);
        }
        return $sales_info;
    }
    //删除消费记录
    public  static function delete_sales($sales_id){
        if(empty($sales_id)){
            return false;
        }
        $db=self::__instance();
        $condition['sales_id']=$sales_id;
        $result=$db->delete(self::getTableName(),$condition);
        return $result;
    }
}