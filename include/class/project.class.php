<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Project extends Base{
    // 表名
    private static $table_name = 'project';
    // 查询字段
    private static $columns = 'project_id,project_name,project_class_id,project_desc';
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
    //项目列表
    public static function getAllProjects( $start ='' ,$page_size='' ) {
        $db=self::__instance();
        $limit ="";
        if($page_size){
            $limit =" limit $start,$page_size ";
        }
        $sql = "select * from ".self::getTableName()." p, ".Projectclass::getTableName()." pc  where p.project_class_id=pc.p_class_id order by p.project_id desc $limit";
        $list=$db->query($sql)->fetchAll();
        if ($list) {
            return $list;
        }
        return array ();
    }
    //搜索列表
    public static function search($project_class_id, $project_name,$start , $page_size ){
        $db=self::__instance();
        $where = "and 1=1 ";
        $limit ="";
        if($page_size){
            $limit =" limit $start,$page_size ";
        }
        if($project_class_id>0){
            $where.=" and p.project_class_id=$project_class_id";
        }
        if($project_name!=""){
            $where.=" and p.project_name like '%$project_name%'";
        }
        $sql = "select * from ".self::getTableName()." p, ".Projectclass::getTableName()." pc  where   p.project_class_id=pc.p_class_id $where  order by p.project_id desc $limit";
        $list=$db->query($sql)->fetchAll();
        if ($list) {
            return $list;
        }
        return array ();
    }
    //是否唯一
    public static function is_only($project_name,$project_class_id){
        $condition=array();
        if(empty($project_name)){
            return false;
        }
        if($project_class_id>0){
            $condition['AND']["project_class_id"]=$project_class_id;
        }
        $condition['AND']['project_name']=$project_name;
        $db=self::__instance();
        $num=$db->count(self::getTableName(),$condition);
       
        if($num){
            return false;
        }else{
            return true;
        }
    }
    //添加
    public static function add_project($project_data){
        if(empty($project_data)&&!is_array($project_data)){
            return false;
        }
        $db=self::__instance();
        $id = $db->insert ( self::getTableName(), $project_data );
        return $id;
    }
    //获取项目信息
    public static function getProject_info($project_id){
        if(empty($project_id)){
            return false;
        }
        $db=self::__instance();
        $sql="select * from ".self::getTableName()." p ,".Projectclass::getTableName()." pc where p.project_class_id=pc.p_class_id and p.project_id=".$project_id;
        $info=$db->query($sql)->fetch();
        return $info;
    }
    //更新
    public static function updateProject($project_data,$project_id){
        if(empty($project_data)&&!is_array($project_data)||empty($project_id)){
            return false;
        }
        $db=self::__instance();
        $condition=array('project_id'=>$project_id);
        $result=$db->update(self::getTableName(),$project_data,$condition);
        return $result;
    }
    //删除
    public static function delProject($project_id){
        if(empty($project_id)){
            return false;
        }
        $db=self::__instance();
        $condition = array("project_id" => $project_id);
        $result=$db->delete(self::getTableName(),$condition);
        return $result;
    }
}