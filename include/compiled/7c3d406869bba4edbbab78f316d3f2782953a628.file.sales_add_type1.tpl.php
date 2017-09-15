<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:47:19
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/sales_add_type1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46749479659bb7777de5b44-16784961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c3d406869bba4edbbab78f316d3f2782953a628' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/sales_add_type1.tpl',
      1 => 1505454437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46749479659bb7777de5b44-16784961',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'project_classes' => 0,
    'project_class' => 0,
    'project_info' => 0,
    'admin_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb7777e0ac17_58162912',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb7777e0ac17_58162912')) {function content_59bb7777e0ac17_58162912($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

 <style>
#sales_people_name-error{
	color:red
}
#sales_people_mobile-error{
	color:red
}
#project_class_id-error{
	color:red
}
#sales_price-error{
	color:red
}
.procject_item_label  label{
	float:left;
	color:red;
	padding-right: 10px;
}
</style>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">非会员消费 - 请填写顾客消费资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="sale_add_type1" method="post" action="" autocomplete="off">
				<label>顾客姓名</label>
				<input type="text" name="sales_people_name" value="" class="input-xlarge" autofocus="true" required="true" >
				<label>顾客手机</label>
				<input type="text" name="sales_people_mobile" value="" class="input-xlarge" autofocus="true" required="true" >
				<label>所属项目分类</label>
				<select name="project_class_id" onchange="get_sales_item(this.options[this.selectedIndex].value,1)" validate="required:true">
				<option value="">-请选择-</option>
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
				<div id="sales_item_div" style="display:none">
				<label>消费项目</label>
				
				</div>
				<label>消费金额</label>
				<input type="text" name="sales_price" value="" class="input-xlarge" autofocus="true" required="true" style="width:70px" id="sales_price">
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>录入</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>
<script>
var admin_url='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
';

$(function(){
	$("#sale_add_type1").validate({
		rules:{
			sales_people_name:{
				required: true ,
				
			},
			sales_people_mobile :{
				required: true ,
				isMobile: true
			},
			sales_price:{
				required:true,
				min:1
			},
			project_class_id:"required",
			"project_item[]":"required"
		},
		messages:{
			sales_people_name: {
				required: "请填写顾客姓名",
				
			},
			sales_people_mobile :{
				required: "请填写顾客手机" ,
				
			},
			sales_price:{
				required:"请填写消费金额",
				min:"请填写正确的消费金额"
			},
			project_class_id:"请选择项目分类",
			"project_item[]":"请选择理疗项目"
		}
	});
});
jQuery.validator.addMethod("isMobile", function(value, element) { 
	  var length = value.length; 
	  var mobile = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/; 
	  return this.optional(element) || (length == 11 && mobile.test(value)); 
	}, "请正确填写您的手机号码"); 

</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
