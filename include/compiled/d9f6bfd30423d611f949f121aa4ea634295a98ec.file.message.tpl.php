<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:48:40
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113335848059bb77c83cb966-77957348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9f6bfd30423d611f949f121aa4ea634295a98ec' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/message.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113335848059bb77c83cb966-77957348',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'message_detail' => 0,
    'forward_url' => 0,
    'forward_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb77c83efb89_92189155',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb77c83efb89_92189155')) {function content_59bb77c83efb89_92189155($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("simple_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <body class="simple_body">

    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                </ul>
                <a class="brand" href="<?php echo @constant('ADMIN_URL');?>
/index.php"><span class="first"></span> <span class="second"><?php echo @constant('COMPANY_NAME');?>
</span></a>
        </div>
    </div>
<div>
<div class="container-fluid">	
        <div class="row-fluid">
			<div class="http-error">
				
				<?php if ($_smarty_tpl->tpl_vars['type']->value=="success") {?>
				<h1>成功!</h1>
				<?php } elseif ($_smarty_tpl->tpl_vars['type']->value=="error") {?>
				<h1>错误!</h1>
				<?php } else { ?>
				<h1>O~!</h1>
				<?php }?>
				<p class="info"><?php echo $_smarty_tpl->tpl_vars['message_detail']->value;?>
</p>
				<h2>返回 <a href="<?php echo @constant('ADMIN_URL');?>
<?php echo $_smarty_tpl->tpl_vars['forward_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['forward_title']->value;?>
</a></h2>
			</div>
	<div>	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php }} ?>
