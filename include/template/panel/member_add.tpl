<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
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
<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写会员基本资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="member_form" method="post" action="" autocomplete="off">
				<label>会员姓名</label>
				<input type="text" name="member_name" value="<{$member_info.member_name}>" class="input-xlarge" autofocus="true" required="true" >
				<label>手机号码</label>
				<input type="text" name="member_mobile" value="<{$member_info.member_mobile}>" class="input-xlarge" required="true"  id="member_mobile">
				<label>会员卡号</label>
				<input type="text" name="member_card" value="<{$member_info.member_card}>" class="input-xlarge"  id="member_card">&nbsp;&nbsp;<span style="color:#0088cc">卡号会自动生成，如需默认可不修改</span>
				<label>会员年龄</label>
				<input type="text" name="member_age" value="<{$member_info.member_age}>"  class="input-xlarge" >
				<label>会员性别</label>
				<label><input type="radio" name="member_sex" value="0" <{if $member_info.member_sex ==0}>checked<{/if}>>男 &nbsp;&nbsp;<input type="radio" name="member_sex" value="1" <{if $member_info.member_sex ==1}>checked<{/if}>>女</label>
				<label>会员等级</label>
				<select name="member_level_id"  validate="required:true">
				<option value="">-请选择-</option>
				<{foreach from=$member_level item=level}>
				<option value="<{$level.m_level_id}>" <{if $member_info.member_level_id ==$level.m_level_id}>selected<{/if}>><{$level.m_level_name}></option>
				<{/foreach}>
				</select>
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
<{include file="footer.tpl" }>