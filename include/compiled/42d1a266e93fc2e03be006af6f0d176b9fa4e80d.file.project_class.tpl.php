<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 13:32:04
         compiled from "E:\wamp64\www\member_manage\include\template\panel\project_class.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1673559bb65d45a29e4-64448120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42d1a266e93fc2e03be006af6f0d176b9fa4e80d' => 
    array (
      0 => 'E:\\wamp64\\www\\member_manage\\include\\template\\panel\\project_class.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1673559bb65d45a29e4-64448120',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'project_classes' => 0,
    'proejct_class' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb65d4af3608_98252343',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb65d4af3608_98252343')) {function content_59bb65d4af3608_98252343($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<div class="btn-toolbar">
	<a href="project_class.php?method=add_class" class="btn btn-primary"><i class="icon-plus"></i> 项目分类</a>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">账号组列表</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>项目分类名称</th>
				<th>描述</th>
				<th width="80px">操作</th>
			</tr>
			</thead>
			<tbody>							  
			<?php  $_smarty_tpl->tpl_vars['proejct_class'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proejct_class']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_classes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proejct_class']->key => $_smarty_tpl->tpl_vars['proejct_class']->value) {
$_smarty_tpl->tpl_vars['proejct_class']->_loop = true;
?>
				 
				<tr>
 
				<td><?php echo $_smarty_tpl->tpl_vars['proejct_class']->value['p_class_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['proejct_class']->value['p_class_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['proejct_class']->value['p_class_desc'];?>
</td>
				<td>
				<a href="project_class.php?method=edit_class&p_id=<?php echo $_smarty_tpl->tpl_vars['proejct_class']->value['p_class_id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
				&nbsp;
				<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="project_class.php?method=del_class&p_id=<?php echo $_smarty_tpl->tpl_vars['proejct_class']->value['p_class_id'];?>
#myModal" data-toggle="modal" ></i></a>
				</td>
				</tr>
			<?php } ?>
		  </tbody>
		</table>  
	</div>
</div>

<!---操作的确认层，相当于javascript:confirm函数--->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>

	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
