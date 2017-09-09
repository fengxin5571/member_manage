<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<style>
#m_level_name-error{
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#m_level_condition-error{
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
</style>
<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写会员等级资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home" style="width:600px">

           <form id="member_level" method="post" action="">
				<label>会员等级名称</label>
				<input type="text" name="m_level_name" value="<{$member_level.m_level_name}>" class="input-xlarge" required="true" autofocus="true" >
				<label>会员等级条件</label>
				首年首次&nbsp;&nbsp;<input type="text" name="m_level_condition" value="<{$member_level.m_level_condition}>" class="input-xlarge" required="true" autofocus="true" style="width:70px" >&nbsp;&nbsp;元
				<label>描述</label>
				<textarea name="m_level_desc" rows="3" class="input-xlarge"><{$member_level.m_level_desc}></textarea>
				<div class="btn-toolbar">
					<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				</div>
			</form>
        </div>
    </div>
</div>
<script>
$(function(){
	$("#member_level").validate({
		rules:{
			m_level_name:"required",
			m_level_condition:{
				required:true,
				min:1
			}
		},
		messages:{
			m_level_name:"请填写会员等级名称",
			m_level_condition:{
				required:"请填写等级条件价格",
				min:"请输入正确的价格"
			}
		}
	});
});
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>