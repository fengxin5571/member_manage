<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:41:57
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/members.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5389397659bb7635ea8972-97416310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06c952365192bcf7383bc1af5e15cb3018c36dbb' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/members.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5389397659bb7635ea8972-97416310',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'member_level' => 0,
    'level' => 0,
    'member_list' => 0,
    'member' => 0,
    'member_sex' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb7635ee88e1_54160582',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb7635ee88e1_54160582')) {function content_59bb7635ee88e1_54160582($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<div class="btn-toolbar" style="margin-bottom:2px;">
    <a href="member_add.php" class="btn btn-primary"><i class="icon-plus"></i> 会员办卡</a>
	<a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>
<?php if ($_smarty_tpl->tpl_vars['_GET']->value['search']) {?>
<div id="search" class="collapse in">
<?php } else { ?>
<div id="search" class="collapse out" >
<?php }?>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
	<div style="float:left;margin-right:5px">
		<label>选择会员等级</label>
		<select name="member_level_id">
		<option>-请选择-</option>
		<?php  $_smarty_tpl->tpl_vars['level'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_level']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level']->key => $_smarty_tpl->tpl_vars['level']->value) {
$_smarty_tpl->tpl_vars['level']->_loop = true;
?>
		<option value='<?php echo $_smarty_tpl->tpl_vars['level']->value['m_level_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['level']->value['m_level_name'];?>
</option>
		<?php } ?>
		</select>
	</div>
	<div style="float:left;margin-right:5px">
		<label>查询所有会员请留空</label>
		<input type="text" name="member_condition" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['user_name'];?>
" placeholder="输入会员卡号或手机" > 
		<input type="hidden" name="search" value="1" > 
	</div>
	<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
		<button type="submit" class="btn btn-primary">检索</button>
	</div>
	<div style="clear:both;"></div>
</form>
</div>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">账号列表</a>
        <div id="page-stats" class="block-body collapse in">
               <table class="table table-striped">
              <thead>
                <tr>
					<th style="width:20px">#</th>
					<th style="width:80px">会员卡号 </th>
					<th style="width:100px">姓名</th>
					<th style="width:100px">手机</th>
					<th style="width:80px">会员性别</th>
					<th style="width:80px">会员年龄</th>
					<th style="width:80px">加入时间</th>
					<th style="width:80px">会员等级#</th>
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody>							  
                <?php  $_smarty_tpl->tpl_vars['member'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['member']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['member']->key => $_smarty_tpl->tpl_vars['member']->value) {
$_smarty_tpl->tpl_vars['member']->_loop = true;
?>				 
					<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['member']->value['member_id'];?>
</td>
					<td style="color:#0088cc"><?php echo $_smarty_tpl->tpl_vars['member']->value['member_card'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['member']->value['member_name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['member']->value['member_mobile'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['member_sex']->value==0) {?>男<?php } else { ?>女<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['member']->value['member_age'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['member']->value['member_add_time'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['member']->value['m_level_name'];?>
</td>
				
					<td>
					<a href="member_list.php?method=edit&member_id=<?php echo $_smarty_tpl->tpl_vars['member']->value['member_id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
					&nbsp;
					<a href="member_list.php?method=member_detailed&member_id=<?php echo $_smarty_tpl->tpl_vars['member']->value['member_id'];?>
" title= "查看余额" ><i class="icon-calendar"></i></a>
					&nbsp;
					
					&nbsp;
					<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="member_del.php?method=del&member_id=<?php echo $_smarty_tpl->tpl_vars['member']->value['member_id'];?>
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
