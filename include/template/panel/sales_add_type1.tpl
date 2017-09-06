<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写顾客消费资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="sale_add_type1" method="post" action="" autocomplete="off">
				<label>顾客姓名</label>
				<input type="text" name="sales_people_name" value="<{$project_info.project_name}>" class="input-xlarge" autofocus="true" required="true" >
				<label>顾客手机</label>
				<input type="text" name="sales_people_mobile" value="<{$project_info.project_name}>" class="input-xlarge" autofocus="true" required="true" >
				<label>所属项目分类</label>
				<select name="project_class_id" onchange="get_sales_item(this.options[this.selectedIndex].value)">
				<option value="">-请选择-</option>
				<{foreach from=$project_classes item=project_class}>
				<option value="<{$project_class.p_class_id}>" <{if $project_info.project_class_id==$project_class.p_class_id}>selected<{/if}>><{$project_class.p_class_name}></option>
				<{/foreach}>
				</select>
				<div id="sales_item_div" style="display:none">
				<label>消费项目</label>
				</div>
				<label>消费金额</label>
				<input type="text" name="sales_people_name" value="<{$project_info.project_name}>" class="input-xlarge" autofocus="true" required="true" style="width:70px">
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>录入</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>
<script>
var admin_url='<{$admin_url}>';
function get_sales_item(project_class_id){
	$.ajax({
		url:admin_url+"/ajax/project_item.php",
		type:"post",
		dataType:"json",
		data:{method:"add",project_class_id:project_class_id},
		success:function(data){
			console.log(data);
		},
	});
}
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>