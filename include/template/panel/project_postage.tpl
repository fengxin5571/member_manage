<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<style>
#postage_type_1_price-error  {
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#postage_type_2_price-error  {
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#postage_type_2_count-error{
	float: right;
    line-height: 30px;
	color:red;
	font-weight: bold;
}
#project_id-error{

    line-height: 30px;
	color:red;
	font-weight: bold;
}
</style>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<form method="post" action="" id="project_postage">
<select name="project_id" onchange="javascript:location.replace('project_postage.php?project_id='+this.options[this.selectedIndex].value)" style="margin:5px 0px 0px"validate="required:true">
	<option value="">-请选择-</option>
	<{foreach from=$projects  item=project}>
	<option value="<{$project.project_id}>" <{if $project_id==$project.project_id}>selected<{/if}>><{$project.project_name}></option>
	<{/foreach}>
</select>
        <{if $project_id }>
        <input  type="hidden" name="method" value="set_postage">
		<div class="block">
			<a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">常规单次</a>
			<div id="page-stats_1"   class="block-body collapse in" style="width:300px">
			<input type="text" name="postage_type_1_price" value="<{$project_postage[0].postage_price}>" style="width:50px" autofocus="true" required="true" onfocusout="true">&nbsp;&nbsp;元/次/30分钟
			
			</div>
		</div>
		<div class="block">
			<a href="#page-stats_2" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">会员办卡</a>
			<div id="page-stats_2" class="block-body collapse in" style="width:300px">
		    <input type="text" name="postage_type_2_price" value="<{$project_postage[1].postage_price}>" style="width:50px">&nbsp;&nbsp;元/ <input type="text" name="postage_type_2_count" value="<{$project_postage[1].postage_count}>" style="width:50px">&nbsp;&nbsp;次
			
			</div>
		</div>										
	<div>
		<button class="btn btn-primary">更新</button>
	</div>
	<{/if}>
</form>

<script>
$(function(){
	$("#project_postage").validate({
		rules:{
			postage_type_1_price:{
				required: true ,
				min: 1
			},
			postage_type_2_price :{
				required: true ,
				min: 1
			},
			postage_type_2_count:{
				required: true ,
				min: 1
			},
			project_id:"required"
		},
		messages:{
			postage_type_1_price: {
				required: "请填写单次价格",
				min: "请输入大于0的金额"
			},
			postage_type_2_price :{
				required: "请填写办卡价格" ,
				min: "请输入大于0的金额"
			},
			postage_type_2_count:{
				required: "请填写办卡次数" ,
				min: "请输入大于0的次数"
			},
			project_id:"请选择项目"
		}
	});
});

</script>
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>