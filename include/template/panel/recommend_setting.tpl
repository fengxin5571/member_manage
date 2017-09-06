<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
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
<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<form method="post" action="" id="recommend_setting">

       
        
		<div class="block">
			<a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">推荐1/人规则</a>
			<div id="page-stats_1"   class="block-body collapse in" style="width:530px">
			推荐一人账户余额增加&nbsp;&nbsp;<input type="text" name="one_people_price" value="<{$recommend_set.one_people_price}>" style="width:50px" autofocus="true" required="true" onfocusout="true">&nbsp;&nbsp;元
			
			</div>
		</div>
		<div class="block">
			<a href="#page-stats_2" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">累计推荐规则</a>
			<div id="page-stats_2" class="block-body collapse in" style="width:550px">
		    累计推荐&nbsp;&nbsp;<input type="text" name="iteration_num" value="<{$recommend_set.iteration_num}>" style="width:50px">&nbsp;&nbsp;人，账户余额增加 <input type="text" name="iteration_people_price" value="<{$recommend_set.iteration_people_price}>" style="width:50px">&nbsp;&nbsp;元
			
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
<{include file="footer.tpl" }>