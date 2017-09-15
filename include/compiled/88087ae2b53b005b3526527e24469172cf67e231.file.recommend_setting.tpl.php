<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:47:13
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/recommend_setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6272174859bb7771d59372-53459239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88087ae2b53b005b3526527e24469172cf67e231' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/panel/recommend_setting.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6272174859bb7771d59372-53459239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'recommend_set' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb7771d77b33_57365931',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb7771d77b33_57365931')) {function content_59bb7771d77b33_57365931($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<style>
#one_people_price-error  {
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#iteration_num-error  {
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
	margin-right: 70px;
}
#iteration_people_price-error{
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}

</style>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<form method="post" action="" id="recommend_setting">

       
        
		<div class="block">
			<a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">推荐1/人规则</a>
			<div id="page-stats_1"   class="block-body collapse in" style="width:530px">
			推荐一人账户余额增加&nbsp;&nbsp;<input type="text" name="one_people_price" value="<?php echo $_smarty_tpl->tpl_vars['recommend_set']->value['one_people_price'];?>
" style="width:50px" autofocus="true" required="true" onfocusout="true">&nbsp;&nbsp;元
			
			</div>
		</div>
		<div class="block">
			<a href="#page-stats_2" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">累计推荐规则</a>
			<div id="page-stats_2" class="block-body collapse in" style="width:550px">
		    累计推荐&nbsp;&nbsp;<input type="text" name="iteration_num" value="<?php echo $_smarty_tpl->tpl_vars['recommend_set']->value['iteration_num'];?>
" style="width:50px">&nbsp;&nbsp;人，账户余额增加 <input type="text" name="iteration_people_price" value="<?php echo $_smarty_tpl->tpl_vars['recommend_set']->value['iteration_people_price'];?>
" style="width:50px">&nbsp;&nbsp;元
			
			</div>
		</div>										
	<div>
		<button class="btn btn-primary">更新</button>
	</div>

</form>

<script>
$(function(){
	$("#recommend_setting").validate({
		rules:{
			one_people_price:{
				required: true ,
				min: 1
			},
			iteration_num :{
				required: true ,
				min: 1
			},
			iteration_people_price:{
				required: true ,
				min: 1
			},
			
		},
		messages:{
			one_people_price: {
				required: "请填写推荐1人增加的金额",
				min: "请输入大于0的金额"
			},
			iteration_num :{
				required: "请填累计推荐人数" ,
				min: "至少添加一人"
			},
			iteration_people_price:{
				required: "请填写累计推荐人增加的金额" ,
				min: "请输入大于0的金额"
			},
		  
		}
	});
});

</script>
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
