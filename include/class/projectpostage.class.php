<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Projectpostage extends Base{
    // 表名
    private static $table_name = 'project_postage_setting';
    // 查询字段
    private static $columns = 'postage_id,postage_type,postage_price,postage_count,project_id';
    
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //获取资费设置
    public static function get_postage($project_id,$postage_type=0){
        if(empty($project_id)){
            return false;
        }
        $db=self::__instance();
		if($postage_type==0){
			$condition['project_id']=$project_id;
        	$condition['ORDER']="postage_type asc";
		}else{
			$condition['AND']['project_id']=$project_id;
        	$condition['AND']['postage_type']=$postage_type;
		}
       
        
        $list=$db->select(self::getTableName(),self::$columns,$condition);
        return $list;
    }
    //添加
    public static function add_postage($postage_data){
        $insert_ids=array();
        if(empty($postage_data)&&!is_array($postage_data)){
            return false;
        }
        $db=self::__instance();
        try {
            $db->beginTransaction();
            for($i=1;$i<=2;$i++){
                $insert_ids[$i]=$db->insert(self::getTableName(),$postage_data[$i]);
                if(! $insert_ids[$i]){
                    throw new Exception("insert error");
                }
            }
            $db->commit(); 
            return $insert_ids;
        }catch(Exception $e){
            $db->rollBack(); 
            return array();
       }
        
    }
    //修改资费设置
    public static function update_postage($project_id,$project_date){
        if(empty($project_id)||empty($project_date)&&!is_array($project_date)){
            return false;
        }
        $update_ids=array();
        $db=self::__instance();
        for($i=1;$i<=2;$i++){
            $condition['AND']['project_id']=$project_id;
            $condition['AND']['postage_type']=$i;
            $update_ids[$i]=$db->update(self::getTableName(),$project_date[$i],$condition);
          
        }
         return $update_ids;
       
    }
}