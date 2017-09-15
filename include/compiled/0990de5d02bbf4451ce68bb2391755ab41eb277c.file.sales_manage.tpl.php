<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:47:17
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/sales_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97178993859bb77751d0124-81130919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0990de5d02bbf4451ce68bb2391755ab41eb277c' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/sales_manage.tpl',
      1 => 1505454053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97178993859bb77751d0124-81130919',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'sales_list' => 0,
    'sales' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb777520bd87_11107470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb777520bd87_11107470')) {function content_59bb777520bd87_11107470($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="btn-toolbar" style="margin-bottom:2px;">
    <a href="sales_manage.php?method=add_salse_type1" class="btn btn-primary" title="非会员消费录入"><i class="icon-plus"></i> 非会员消费录入</a>
	<a  href="sales_manage.php?method=add_salse_type2" title= "会员消费录入" class="btn btn-primary"><i class="icon-plus"></i>会员消费录入</a>
     <a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>
<?php if ($_smarty_tpl->tpl_vars['_GET']->value['search']) {?>
<div id="search" class="collapse in">
<?php } else { ?>
<div id="search" class="collapse out" >
<?php }?>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
	<div style="float:left;margin-right:5px">
		<label>选择消费类型</label>
		<select name="sales_type" >
		<option value="1">非会员</option>
		<option value="2">会员卡</option>
		</select>
	</div>
	<div style="float:left;margin-right:5px">
		<label>查询所有顾客请留空</label>
		<input type="text" name="sales_people_name" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['user_name'];?>
" placeholder="输入顾客姓名" > 
		<input type="hidden" name="search" value="1" > 
	</div>
	<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
		<button type="submit" class="btn btn-primary">检索</button>
	</div>
	<div style="clear:both;"></div>
</form>
</div>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">消费记录</a>
        <div id="page-stats" class="block-body collapse in">
               <table class="table table-striped">
              <thead>
                <tr>
					<th style="width:20px">#</th>
					<th style="width:50px">顾客姓名</th>
					<th style="width:80px">手机</th>
					<th style="width:80px">会员卡号</th>
					<th style="width:50px">消费类型</th>
					<th style="width:80px">项目分类</th>
					<th style="width:80px">消费金额</th>
					<th style="width:80px">消费时间</th>
					<th style="width:80px">操作人员</th>
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody>							  
                <?php  $_smarty_tpl->tpl_vars['sales'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sales']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sales_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sales']->key => $_smarty_tpl->tpl_vars['sales']->value) {
$_smarty_tpl->tpl_vars['sales']->_loop = true;
?>				 
					<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_people_name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_people_mobile'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['sales']->value['sales_type']==2) {?><?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_people_card'];?>
<?php } else { ?>非会员消费<?php }?></td>
					<td><?php if ($_smarty_tpl->tpl_vars['sales']->value['sales_type']==1) {?>非会员<?php } else { ?>会员<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['sales']->value['p_class_name'];?>
</td>
					<td>￥<?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_price'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_add_time'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_admin_name'];?>
</td>
					<td>
					<a href="sales_manage.php?method=sales_info&sales_id=<?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_id'];?>
" title= "查看详单" ><i class="icon-folder-open"></i></a>
					&nbsp;
					<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="sales_del.php?sales_id=<?php echo $_smarty_tpl->tpl_vars['sales']->value['sales_id'];?>
" ></i></a>
					
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

<!---操作的确认层，相当于javascript:confirm函数--->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>


<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
