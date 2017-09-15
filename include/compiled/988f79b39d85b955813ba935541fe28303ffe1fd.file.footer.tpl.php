<?php /* Smarty version Smarty-3.1.15, created on 2017-09-15 13:19:50
         compiled from "E:\wamp64\www\member_manage\include\template\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1868159bb62f67ed237-14385958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '988f79b39d85b955813ba935541fe28303ffe1fd' => 
    array (
      0 => 'E:\\wamp64\\www\\member_manage\\include\\template\\footer.tpl',
      1 => 1505452634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1868159bb62f67ed237-14385958',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59bb62f680d4d2_42086400',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bb62f680d4d2_42086400')) {function content_59bb62f680d4d2_42086400($_smarty_tpl) {?>                    
	
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
