<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Moneydetailed extends Base{
    // 表名
    private static $table_name = 'money_detailed';
    //查询字段
    private  static $columns ="";
    
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //插入金额明细
    public static  function add_detailed($money_detailed){
        if(empty($money_detailed)&&!is_array($money_detailed)){
            return  false;
        }
        $db=self::__instance();
        $insert_id=$db->insert(self::getTableName(),$money_detailed);
        return $insert_id;
    }
    //获取用户明细
    public static function get_memeber_detailed($start ='' ,$page_size='' ,$member_id){
        if(empty($member_id)){
            return false;
        }
        $limit ="";
        if($page_size){
            $limit =" limit $start,$page_size ";
        }
        $db=self::__instance();
        $sql="SELECT * from ".self::getTableName()." WHERE  detailed_member_id=$member_id ".$limit;
        $member_detailed_list=$db->query($sql)->fetchAll();
        if($member_detailed_list){
            foreach ($member_detailed_list as &$value){
                $value['detailed_operation']=$value['detailed_operation']=="+"?"增加":"减少";
                $value['detailed_type']=$value['detailed_type']==0?"充值":"消费";
                $value['detailed_time']=Common::getDateTime($value['detailed_time']);
            }
        }
        return $member_detailed_list;
    }
    //获取总数
    public static function count($member_id){
        $db=self::__instance();
		$condition['detailed_member_id']=$member_id;
        $num = $db->count ( self::getTableName(), $condition );
        return $num;
    }
}