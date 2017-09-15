<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:52:35
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/add_money.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69875665859bb78b3c41876-59003286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe446d1c50c6b78e3e61e8e40cafba75bd310783' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/add_money.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69875665859bb78b3c41876-59003286',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'member_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb78b3c56fa3_44538340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb78b3c56fa3_44538340')) {function content_59bb78b3c56fa3_44538340($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<style>
#member_add_money-error{
	color:red
}
</style>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">会员充值</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="member_deposit" method="post" action="">
				<label>会员姓名</label>
				<input type="text" name="member_name" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_name'];?>
" class="input-xlarge" required="true" autofocus="true" readonly = "readonly">
				<label>会员卡号</label>
				<input type="text" name="member_card" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member_card'];?>
" class="input-xlarge" required="true" autofocus="true"  readonly = "readonly">
				<label>充值金额</label>
				<input  type="text" name="member_add_money" value="" required="true" />
				<div class="btn-toolbar">
					<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				</div>
			</form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
	$("#member_deposit").validate({
		rules:{
			member_name:{
				required: true ,
				
			},
			member_card :{
				required: true ,
			},
			member_add_money:{
				required: true ,
				min:1
			}
		},
		messages:{
			member_name: {
				required: "请填写会员姓名",
				
			},
			member_card :{
				required: "请填写会员卡号" ,
				
			},
			member_add_money:{
				required:"请填写充值金额",
				min:"请输入正确的金额"
			}
		}
	});
});
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
