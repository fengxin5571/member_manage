<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:43:35
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/project_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206499605259bb7697e04c40-04781119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5acc32a105ab374b5b1c7ac2be6dc71be91de939' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/project_add.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206499605259bb7697e04c40-04781119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'project_info' => 0,
    'project_classes' => 0,
    'project_class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb7697e2d097_74759331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb7697e2d097_74759331')) {function content_59bb7697e2d097_74759331($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写项目资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" autocomplete="off">
				<label>项目名</label>
				<input type="text" name="project_name" value="<?php echo $_smarty_tpl->tpl_vars['project_info']->value['project_name'];?>
" class="input-xlarge" autofocus="true" required="true" >
				<label>描述</label>
				<textarea name="project_desc" rows="3" class="input-xlarge"><?php echo $_smarty_tpl->tpl_vars['project_info']->value['project_desc'];?>
</textarea>
				<label>所属项目分类</label>
				<select name="project_class_id">
				<?php  $_smarty_tpl->tpl_vars['project_class'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project_class']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_classes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project_class']->key => $_smarty_tpl->tpl_vars['project_class']->value) {
$_smarty_tpl->tpl_vars['project_class']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['project_class']->value['p_class_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['project_info']->value['project_class_id']==$_smarty_tpl->tpl_vars['project_class']->value['p_class_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['project_class']->value['p_class_name'];?>
</option>
				<?php } ?>
				</select>
				
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
