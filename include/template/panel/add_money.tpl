<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
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
				<input type="text" name="member_name" value="<{$member_info.member_name}>" class="input-xlarge" required="true" autofocus="true" readonly = "readonly">
				<label>会员卡号</label>
				<input type="text" name="member_card" value="<{$member_info.member_card}>" class="input-xlarge" required="true" autofocus="true"  readonly = "readonly">
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
<{include file="footer.tpl" }>