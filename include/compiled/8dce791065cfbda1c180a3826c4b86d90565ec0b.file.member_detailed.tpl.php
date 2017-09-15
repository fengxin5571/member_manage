<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:51:51
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/member_detailed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28825714259bb78874bfcc2-35554812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dce791065cfbda1c180a3826c4b86d90565ec0b' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/member_detailed.tpl',
      1 => 1505453590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28825714259bb78874bfcc2-35554812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'member_info' => 0,
    'member_detailed' => 0,
    'detailed' => 0,
    'admin_url' => 0,
    'page_html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb7887500425_31942931',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb7887500425_31942931')) {function content_59bb7887500425_31942931($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="well">
    <ul class="nav nav-tabs">
      <li class="active" style="padding-left: 45%;"><a href="#home" data-toggle="tab" style="color: #0088cc;">会员余额 - 金额明细查看</a></li>
    </ul>	
     <div class="tab-pane active in" id="home" style="width: 900px;margin: auto;overflow: hidden;">
    <div  style="width: 450px;float: left;">
	<label>会员姓名<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_name'];?>
" class="input-xlarge"  disabled="true" style="margin-left: 50px;"></label>
	
	<label>会员手机<input type="text" name="sales_people_mobile" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_mobile'];?>
" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
	
	<label>会员卡号<input type="text" name="sales_people_mobile" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_card'];?>
" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
	</div>
	
	<div id="sales_item_div" style="width: 400px;float: left;margin-left: 50px;">
	<label>会员等级<input type="text" name="sales_people_mobile" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_level']['m_level_name'];?>
" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
	<label>加入时间<input type="text" name="sales_people_mobile" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_add_time'];?>
" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
	<label>会员余额<input type="text" name="sales_people_mobile" value="￥<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_money']['m_money_price'];?>
" class="input-xlarge" disabled="true" style="margin-left: 50px;color:#0088cc" ></label>
	</div>
	<div style="overflow: hidden;float: left;width: 900px;text-align: right;">
		<label style="padding-right: 20px;color: #505050; font-weight: bold;font-size: .85em;"><button onclick="member_deposit(<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_id'];?>
)">充值</button></label>
	</div>
    </div>
     <div class="block" style="overflow: hidden;">
     <a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">余额明细</a>
     <div id="page-stats_1"   class="block-body collapse in" >
		 <table class="table table-striped">
	             <thead>
	               <tr>
					<th style="width:20px">#</th>
					<th style="width:80px">明细操作 </th>
					<th style="width:100px">明细金额</th>
					<th style="width:100px">变动时间</th>
					<th style="width:80px">明细类型</th>
					<th style="width:80px">消费编号</th>
					<th style="width:80px">操作人</th>
					
	               </tr>
	             </thead>
	             <tbody>							  
	               <?php  $_smarty_tpl->tpl_vars['detailed'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['detailed']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_detailed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['detailed']->key => $_smarty_tpl->tpl_vars['detailed']->value) {
$_smarty_tpl->tpl_vars['detailed']->_loop = true;
?>				 
					<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['detailed']->value['detailed_id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['detailed']->value['detailed_operation'];?>
</td>
					<td style="color:#0088cc">￥<?php echo $_smarty_tpl->tpl_vars['detailed']->value['detailed_price'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['detailed']->value['detailed_time'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['detailed']->value['detailed_type'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['detailed']->value['detailed_sales_no']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/panel/sales_manage.php?method=sales_info&sales_id=<?php echo $_smarty_tpl->tpl_vars['detailed']->value['detailed_sales_no'];?>
"><?php echo $_smarty_tpl->tpl_vars['detailed']->value['detailed_sales_no'];?>
</a><?php } else { ?>充值单<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['detailed']->value['detailed_admin'];?>
</td>
					</tr>
				<?php } ?>
	             </tbody>
	           </table> 
	           <!--- START 分页模板 --->
				
               <?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>

					
			   <!--- END --->
	           </div>
	       </div>
	       
</div>
<script>
//会员充值
var admin_url='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
';
function member_deposit(member_id){
	window.location.href=admin_url+"/panel/member_deposit.php?method=add_money&member_id="+member_id;
}
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
