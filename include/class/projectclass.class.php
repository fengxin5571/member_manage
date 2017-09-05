<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Projectclass extends Base{
   // 表名
	private static $table_name = 'project_class';
	// 查询字段
	private static $columns = 'p_class_id,p_class_name,p_class_desc';
	
	public static function getTableName(){
		return parent::$table_prefix.self::$table_name;
	}
	//获取列表
	public static function getAllproject_class(){
	    $db=self::__instance();
	    $sql="select ".self::$columns." from ".self::$table_prefix.self::$table_name;
	    $list = $db->query($sql)->fetchAll();
	    if($list){
	        return $list;
	        exit;
	    }
	    return array();
	} 
	//获取单个数据
	public static  function get_one_class($p_id){
	    $db=self::__instance();
	    $sql="select ".self::$columns." from ".self::$table_prefix.self::$table_name." where p_class_id =".$p_id;
	    $project_class=$db->query($sql)->fetch();
	    return $project_class;
	}
	//添加
	public static function add_project_class($project_class){
	    if(empty($project_class)||!is_array($project_class)){
	        return false;
	    }
	    $db=self::__instance();
	    $id = $db->insert ( self::getTableName(), $project_class );
	    return $id;
	}
	//修改
	public static function update_project_class($p_id,$project_class){
	    if(empty($project_class)||!is_array($project_class)){
	        return false;
	    }
	    $db=self::__instance();
	    $condition=array("p_class_id"=>$p_id);
	    $id = $db->update ( self::getTableName(), $project_class,$condition );
	    return $id;
	}
	//删除
	public static function del_project_class($p_id){
	    if(empty($p_id)||!is_numeric($p_id)){
	        return false;
	    }
	   $db=self::__instance();
		$condition = array("p_class_id" => $p_id);
		$result = $db->delete ( self::getTableName(), $condition );
		return $result;
	    
	}
}