<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:42:34
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/member_level.add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124644161759bb765a163d21-55161586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f367667b03655c8d4c4696ef06d2d0be3277aac' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/member_level.add.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124644161759bb765a163d21-55161586',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'member_level' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb765a17bcd6_10964113',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb765a17bcd6_10964113')) {function content_59bb765a17bcd6_10964113($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<style>
#m_level_name-error{
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#m_level_condition-error{
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
</style>
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写会员等级资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home" style="width:600px">

           <form id="member_level" method="post" action="">
				<label>会员等级名称</label>
				<input type="text" name="m_level_name" value="<?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_name'];?>
" class="input-xlarge" required="true" autofocus="true" >
				<label>会员等级条件</label>
				首年首次&nbsp;&nbsp;<input type="text" name="m_level_condition" value="<?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_condition'];?>
" class="input-xlarge" required="true" autofocus="true" style="width:70px" >&nbsp;&nbsp;元
				<label>描述</label>
				<textarea name="m_level_desc" rows="3" class="input-xlarge"><?php echo $_smarty_tpl->tpl_vars['member_level']->value['m_level_desc'];?>
</textarea>
				<div class="btn-toolbar">
					<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				</div>
			</form>
        </div>
    </div>
</div>
<script>
$(function(){
	$("#member_level").validate({
		rules:{
			m_level_name:"required",
			m_level_condition:{
				required:true,
				min:1
			}
		},
		messages:{
			m_level_name:"请填写会员等级名称",
			m_level_condition:{
				required:"请填写等级条件价格",
				min:"请输入正确的价格"
			}
		}
	});
});
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
