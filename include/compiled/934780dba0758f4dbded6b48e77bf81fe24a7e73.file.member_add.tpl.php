<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:42:24
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/member_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136943124159bb76503c2993-13607159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '934780dba0758f4dbded6b48e77bf81fe24a7e73' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/member_add.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136943124159bb76503c2993-13607159',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'member_info' => 0,
    'member_level' => 0,
    'level' => 0,
    'method' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb76503f8111_88578639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb76503f8111_88578639')) {function content_59bb76503f8111_88578639($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<style>
#member_name-error{
	color:red
}
#member_mobile-error{
	color:red
}
#member_level_id-error{
	color:red
}
</style>
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写会员基本资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="member_form" method="post" action="" autocomplete="off">
				<label>会员姓名</label>
				<input type="text" name="member_name" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_name'];?>
" class="input-xlarge" autofocus="true" required="true" >
				<label>手机号码</label>
				<input type="text" name="member_mobile" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_mobile'];?>
" class="input-xlarge" required="true"  id="member_mobile">
				<label>会员卡号</label>
				<input type="text" name="member_card" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_card'];?>
" class="input-xlarge"  id="member_card">&nbsp;&nbsp;<span style="color:#0088cc">卡号会自动生成，如需默认可不修改</span>
				<label>会员年龄</label>
				<input type="text" name="member_age" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_age'];?>
"  class="input-xlarge" >
				<label>会员性别</label>
				<label><input type="radio" name="member_sex" value="0" <?php if ($_smarty_tpl->tpl_vars['member_info']->value['member_sex']==0) {?>checked<?php }?>>男 &nbsp;&nbsp;<input type="radio" name="member_sex" value="1" <?php if ($_smarty_tpl->tpl_vars['member_info']->value['member_sex']==1) {?>checked<?php }?>>女</label>
				<label>会员等级</label>
				<select name="member_level_id"  validate="required:true">
				<option value="">-请选择-</option>
				<?php  $_smarty_tpl->tpl_vars['level'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_level']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level']->key => $_smarty_tpl->tpl_vars['level']->value) {
$_smarty_tpl->tpl_vars['level']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['level']->value['m_level_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['member_info']->value['member_level_id']==$_smarty_tpl->tpl_vars['level']->value['m_level_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['level']->value['m_level_name'];?>
</option>
				<?php } ?>
				</select>
				<?php if ($_smarty_tpl->tpl_vars['method']->value=='edit') {?>
				&nbsp;&nbsp;<span style="color:#0088cc">如果修改了会员等级，会员余额不会清空</span>
				<?php }?>
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>
<script>
$(function(){
	$('#member_mobile').blur(function() {
		var mobile = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/; 
        if($(this).val().length==11&&mobile.test($(this).val())){
        	$("#member_card").val("00"+$(this).val());
        }
    });
	$("#member_form").validate({
		rules:{
			member_name:{
				required: true ,
			},
			member_mobile:{
				required: true ,
				isMobile:true
			},
			member_card:"required",
			member_level_id:"required",
		},
		messages:{
			member_name: {
				required: "请填写会员姓名",
			},
			member_mobile:{
				required: "请填写手机号码",
			},
			member_card:"请填写会员卡号",
			member_level_id:"请选择会员等级",
		}
	});
});
jQuery.validator.addMethod("isMobile", function(value, element) { 
	  var length = value.length; 
	  var mobile = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/; 
	  var result=this.optional(element) || (length == 11 && mobile.test(value));
	  return result; 
	}, "请正确填写您的手机号码"); 
</script>
<script>
function set_member_card(){
	  alert(1);
	}
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
