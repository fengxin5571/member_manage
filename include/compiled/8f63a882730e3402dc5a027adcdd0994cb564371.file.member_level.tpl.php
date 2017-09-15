<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:41:06
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/member_level.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43739148159bb76026a7e05-80865189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f63a882730e3402dc5a027adcdd0994cb564371' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/member_level.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43739148159bb76026a7e05-80865189',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'member_levels' => 0,
    'member_level' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb76026cb566_22837573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb76026cb566_22837573')) {function content_59bb76026cb566_22837573($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<div class="btn-toolbar">
	<a href="member_level.php?method=add_level" class="btn btn-primary"><i class="icon-plus"></i> 会员等级</a>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">会员等级列表</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>会员等级名称</th>
				<th>等级条件</th>
				<th>描述</th>
				<th width="80px">操作</th>
			</tr>
			</thead>
			<tbody>							  
			<?php  $_smarty_tpl->tpl_vars['member_level'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['member_level']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_levels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['member_level']->key => $_smarty_tpl->tpl_vars['member_level']->value) {
$_smarty_tpl->tpl_vars['member_level']->_loop = true;
?>
				 
				<tr>
 
				<td><?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_name'];?>
</td>
				<td>首年首次充值&nbsp;&nbsp;<span style="color:#0088cc">￥<?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_condition'];?>
</span></td>
				<td><?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_desc'];?>
</td>
				<td>
				<a href="member_level.php?method=edit_level&m_level_id=<?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
				&nbsp;
				<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="member_level.php?method=del_level&m_level_id=<?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_id'];?>
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
