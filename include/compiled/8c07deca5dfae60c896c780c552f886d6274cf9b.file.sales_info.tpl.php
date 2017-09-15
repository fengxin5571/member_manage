<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 13:31:41
         compiled from "E:\wamp64\www\member_manage\include\template\panel\sales_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2109359bb63ba823fa1-34810523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c07deca5dfae60c896c780c552f886d6274cf9b' => 
    array (
      0 => 'E:\\wamp64\\www\\member_manage\\include\\template\\panel\\sales_info.tpl',
      1 => 1505453376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2109359bb63ba823fa1-34810523',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb63bab50e76_62121786',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'sales_info' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb63bab50e76_62121786')) {function content_59bb63bab50e76_62121786($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="well">
    <ul class="nav nav-tabs">
      <li class="active" style="padding-left: 45%;"><a href="#home" data-toggle="tab" style="color: #0088cc;">非会员消费 - 消费明细查看</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home" style="width: 900px;margin: auto;">

           <form id="sale_add_type1" method="post" action="" autocomplete="off">
                <div class="block" style="overflow: hidden;">
				<a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">消费项目</a>
				<div id="page-stats_1"   class="block-body collapse in" >
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sales_info']->value['sales_item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<label style="display: inline-block;font-size: 12px;padding-right: 70px;" id="project_item_label"><i class="icon-gift" style="padding-right: 5px;"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['project_name'];?>
</label>
			   <?php } ?>
	          
			    </div>
				</div>
                <div  style="width: 450px;float: left;">
				<label>顾客姓名<input type="text" name="sales_people_name" value="<?php echo $_smarty_tpl->tpl_vars['sales_info']->value['sales_people_name'];?>
" class="input-xlarge"  disabled="true" style="margin-left: 50px;"></label>
				
				<label>顾客手机<input type="text" name="sales_people_mobile" value="<?php echo $_smarty_tpl->tpl_vars['sales_info']->value['sales_people_mobile'];?>
" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
				
				<label>所属项目分类<input type="text" name="sales_people_mobile" value="<?php echo $_smarty_tpl->tpl_vars['sales_info']->value['p_class_name'];?>
" class="input-xlarge" disabled="true" style="margin-left: 20px;" ></label>
				</div>
				
				<div id="sales_item_div" style="width: 400px;float: left;margin-left: 50px;">
				<label>会员等级<input type="text" name="sales_people_mobile" value="非会员" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
				<label>消费时间<input type="text" name="sales_people_mobile" value="<?php echo $_smarty_tpl->tpl_vars['sales_info']->value['sales_add_time'];?>
" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
				<label>消费金额<input type="text" name="sales_people_mobile" value="￥<?php echo $_smarty_tpl->tpl_vars['sales_info']->value['sales_price'];?>
" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
				</div>
				<div style="overflow: hidden;float: left;width: 900px;text-align: right;">
				<label style="padding-right: 20px;color: #505050; font-weight: bold;font-size: .85em;">操作人:<?php echo $_smarty_tpl->tpl_vars['sales_info']->value['sales_admin_name'];?>
</label>
				</div>
			
			</form>
        </div>
    </div>
</div>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
