<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 14:26:11
         compiled from "/data/home/byu2472090001/htdocs/jinguiyuan/include/template/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89936460759bb7283e3d688-77405313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25b31f6d9c86987e508f6daaff028ecf82496e0c' => 
    array (
      0 => '/data/home/byu2472090001/htdocs/jinguiyuan/include/template/footer.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89936460759bb7283e3d688-77405313',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb7283e41112_47707714',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb7283e41112_47707714')) {function content_59bb7283e41112_47707714($_smarty_tpl) {?>                    
	
					<footer>
                        <hr>

                        <p style="text-align: center;">&copy; 2017 <a href="#" target="_blank">Member_manage_system</a></p>
                    </footer>
				</div>
			</div>
		</div>
    <script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/js/bootstrap.js"></script>
	
<!--- + -快捷方式的提示 --->
	
<script type="text/javascript">	
	
alertDismiss("alert-success",3);
alertDismiss("alert-info",10);
	
listenShortCut("icon-plus");
listenShortCut("icon-minus");
doSidebar();
</script>
  </body>
</html><?php }} ?>
