<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 13:31:57
         compiled from "E:\wamp64\www\member_manage\include\template\panel\projects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1024359bb65cd46d7b0-85824978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80044da3b7dcf192e1fcd9c13404dc8c5d5dad69' => 
    array (
      0 => 'E:\\wamp64\\www\\member_manage\\include\\template\\panel\\projects.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1024359bb65cd46d7b0-85824978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'project_classes' => 0,
    'project_class' => 0,
    'projects' => 0,
    'project' => 0,
    'page_no' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb65cdceb1e8_31592899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb65cdceb1e8_31592899')) {function content_59bb65cdceb1e8_31592899($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<div class="btn-toolbar" style="margin-bottom:2px;">
    <a href="projects.php?method=add_project" class="btn btn-primary"><i class="icon-plus"></i> 项目</a>
	<a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>
<?php if ($_smarty_tpl->tpl_vars['_GET']->value['search']) {?>
<div id="search" class="collapse in">
<?php } else { ?>
<div id="search" class="collapse out" >
<?php }?>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
	<div style="float:left;margin-right:5px">
		<label>选择账号分类</label>
		<select name="project_class_id" >
		<?php  $_smarty_tpl->tpl_vars['project_class'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project_class']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_classes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project_class']->key => $_smarty_tpl->tpl_vars['project_class']->value) {
$_smarty_tpl->tpl_vars['project_class']->_loop = true;
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['project_class']->value['p_class_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['project_class']->value['p_class_name'];?>
</option>
		<?php } ?>
		</select>
	</div>
	<div style="float:left;margin-right:5px">
		<label>查询所有项目请留空</label>
		<input type="text" name="project_name" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['user_name'];?>
" placeholder="输入项目名" > 
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
					<th style="width:80px">所属分类#</th>
					<th style="width:80px">项目名称</th>
					<th style="width:80px">描述</th>
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody>							  
                <?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value) {
$_smarty_tpl->tpl_vars['project']->_loop = true;
?>				 
					<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['project']->value['project_id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['project']->value['p_class_name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['project']->value['project_name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['project']->value['project_desc'];?>
</td>
					<td>
					<a href="projects.php?method=edit&project_id=<?php echo $_smarty_tpl->tpl_vars['project']->value['project_id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
					&nbsp;
					<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="projects.php?page_no=<?php echo $_smarty_tpl->tpl_vars['page_no']->value;?>
&method=del&project_id=<?php echo $_smarty_tpl->tpl_vars['project']->value['project_id'];?>
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

<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
