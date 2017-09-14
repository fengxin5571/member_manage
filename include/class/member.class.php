<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Member extends Base{
    // 表名
    private static $table_name = 'member';
    //查询字段
    private  static $columns ="member_id,member_name,member_moblie,member_card,member_level_id,member_sex,member_age,member_add_time";
    
    public static function getTableName(){
        return parent::$table_prefix.self::$table_name;
    }
    //会员列表
    public static function getAllMember($start ='' ,$page_size='' ,$member_condition="",$member_level=0){
        $db=self::__instance();
        $limit ="";
        $where="1=1 ";
        if($page_size){
            $limit =" limit $start,$page_size ";
        }
        if($member_condition){
            if(preg_match("/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/", $member_condition)){
                $where.=" AND member_mobile='$member_condition'";
            }else{
                $where.=" AND member_card LIKE '%$member_condition%'";
            }
        }
        if($member_level>0){
            $where.=" AND  member_level_id=".$member_level;
        }
        $sql="SELECT *  from ".self::getTableName()." as m LEFT JOIN ".Memberlevel::getTableName()." as ml ON m.member_level_id=ml.m_level_id WHERE ".$where." ORDER BY m.member_id desc ".$limit;
        $list = $db->query($sql)->fetchAll();
        if ($list) {
            foreach ($list as &$value){
                $value['member_add_time']=Common::getDateTime($value['member_add_time']);
            }
            return $list;
        }
        return array ();
    }
    //获取单个会员信息
    public static function get_member_info($member_id){
        if(empty($member_id)){
            return false;
        }
        $db=self::__instance();
        $condition['member_id']=$member_id;
        $member_info=$db->get(self::getTableName(),"*",$condition);
        if($member_info){
            $member_info['member_add_time']=Common::getDateTime($member_info['member_add_time']);
        }
        return $member_info;
    }
    
    //添加会员
    public static function addMember($user_data,$member_money ){
        if(empty($user_data)&&!is_array($user_data)||empty($member_money)){
            return false;
        }
        $db=self::__instance();
        try{
            $db->beginTransaction();
            $id = $db->insert ( self::getTableName(), $user_data );
            if(!$id){
                throw new Exception("insert member error");
            }
            $money_array=array(
                "m_member_id"=>$id,
                "m_money_price"=>$member_money
            );
            $result=MemberMoney::update_money($money_array);
            if(!$result){
                throw new Exception("insert member_money error");
            }
            $db->commit();
            return $id;
        }catch (Exception $e){
            $db->rollBack();
            return false;
        }
       
    }
    //删除会员
    public static function dropMember($user_id){
        if(empty($user_id)||! is_numeric($user_id)){
            return false;
        }
        $db=self::__instance();
        $condition['member_id']=$user_id;
        $result=$db->delete(self::getTableName(),$condition);
        return $result;
    }
    //会员总数
    public static function count($condition = '') {
        $db=self::__instance();
        $num = $db->count ( self::getTableName(), $condition );
        return $num;
    }
    //是否唯一
    public static function is_only($member_mobile){
        if(empty($member_mobile)){
            return false;
        }
        $db=self::__instance();
        $condition['member_mobile']=$member_mobile;
        $member_count=$db->count(self::getTableName(),$condition);
        if($member_count){
            return false;
        }else{
            return true;
        }
    }
    //编辑会员
    public static function update_member($member_id,$member_data,$price=0){
        if(empty($member_id)||empty($member_data)&&!is_array($member_data)){
            return false;
        }
        $db=self::__instance();
        try{
            $db->beginTransaction();
            $condition['member_id']=$member_id;
            $result=$db->update(self::getTableName(),$member_data,$condition);
            if($result!==0&&!$result){
                throw new Exception('update member error');
            }
            if($price>0){
                $money_data['m_member_id']=$member_id;
                $money_data['m_money_price']=$price;
                MemberMoney::update_money($money_data);
            }
             $db->commit();
             return $result;
        }catch (Exception $e){
            $db->rollBack();
            return false;
        }
        
    }
}