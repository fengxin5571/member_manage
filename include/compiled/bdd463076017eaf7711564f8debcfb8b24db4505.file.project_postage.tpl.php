<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:43:52
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/project_postage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191917612159bb76a8ac95a3-24250084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdd463076017eaf7711564f8debcfb8b24db4505' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/project_postage.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191917612159bb76a8ac95a3-24250084',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'projects' => 0,
    'project' => 0,
    'project_id' => 0,
    'project_postage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb76a8af77f6_14643712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb76a8af77f6_14643712')) {function content_59bb76a8af77f6_14643712($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<style>
#postage_type_1_price-error  {
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#postage_type_2_price-error  {
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#postage_type_2_count-error{
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#project_id-error{

    line-height: 30px;
	color:red;
	font-weight: bold;
}
</style>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<form method="post" action="" id="project_postage">
<select name="project_id" onchange="javascript:location.replace('project_postage.php?project_id='+this.options[this.selectedIndex].value)" style="margin:5px 0px 0px"validate="required:true">
	<option value="">-请选择-</option>
	<?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value) {
$_smarty_tpl->tpl_vars['project']->_loop = true;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['project']->value['project_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['project_id']->value==$_smarty_tpl->tpl_vars['project']->value['project_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['project']->value['project_name'];?>
</option>
	<?php } ?>
</select>
        <?php if ($_smarty_tpl->tpl_vars['project_id']->value) {?>
        <input  type="hidden" name="method" value="set_postage">
		<div class="block">
			<a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">常规单次</a>
			<div id="page-stats_1"   class="block-body collapse in" style="width:300px">
			<input type="text" name="postage_type_1_price" value="<?php echo $_smarty_tpl->tpl_vars['project_postage']->value[0]['postage_price'];?>
" style="width:50px" autofocus="true" required="true" onfocusout="true">&nbsp;&nbsp;元/次/30分钟
			
			</div>
		</div>
		<div class="block">
			<a href="#page-stats_2" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">会员办卡</a>
			<div id="page-stats_2" class="block-body collapse in" style="width:300px">
		    <input type="text" name="postage_type_2_price" value="<?php echo $_smarty_tpl->tpl_vars['project_postage']->value[1]['postage_price'];?>
" style="width:50px">&nbsp;&nbsp;元/ <input type="text" name="postage_type_2_count" value="<?php echo $_smarty_tpl->tpl_vars['project_postage']->value[1]['postage_count'];?>
" style="width:50px">&nbsp;&nbsp;次
			
			</div>
		</div>										
	<div>
		<button class="btn btn-primary">更新</button>
	</div>
	<?php }?>
</form>

<script>
$(function(){
	$("#project_postage").validate({
		rules:{
			postage_type_1_price:{
				required: true ,
				min: 1
			},
			postage_type_2_price :{
				required: true ,
				min: 1
			},
			postage_type_2_count:{
				required: true ,
				min: 1
			},
			project_id:"required"
		},
		messages:{
			postage_type_1_price: {
				required: "请填写单次价格",
				min: "请输入大于0的金额"
			},
			postage_type_2_price :{
				required: "请填写办卡价格" ,
				min: "请输入大于0的金额"
			},
			postage_type_2_count:{
				required: "请填写办卡次数" ,
				min: "请输入大于0的次数"
			},
			project_id:"请选择项目"
		}
	});
});

</script>
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
