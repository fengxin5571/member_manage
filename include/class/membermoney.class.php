<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class MemberMoney extends base{
    // 表名
    private static $table_name = 'member_money';
    // 查询字段
    private static $columns = 'm_money_id,m_member_id,m_money_price';
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //更新余额
    public static function update_money($money_data){
        if(empty($money_data)&&!is_array($money_data)){
            return false;
        }
        $db=self::__instance();
        $sql="REPLACE  into ".self::getTableName()." (m_member_id,m_money_price) VALUES (".$money_data['member_id'].",".$money_data['m_money_price'].")";
        $result=$db->exec($sql);
        return $result;
    }
}