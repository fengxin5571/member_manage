<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
 <style>
#sales_people_name-error{
	color:red
}
#sales_people_mobile-error{
	color:red
}
#project_class_id-error{
	color:red
}
#sales_price-error{
	color:red
}
#project_item_label label{
	float:left;
	color:red;
	padding-right: 10px;
}
</style>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">非会员消费 - 请填写顾客消费资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="sale_add_type1" method="post" action="" autocomplete="off">
				<label>顾客姓名</label>
				<input type="text" name="sales_people_name" value="" class="input-xlarge" autofocus="true" required="true" >
				<label>顾客手机</label>
				<input type="text" name="sales_people_mobile" value="" class="input-xlarge" autofocus="true" required="true" >
				<label>所属项目分类</label>
				<select name="project_class_id" onchange="get_sales_item(this.options[this.selectedIndex].value)" validate="required:true">
				<option value="">-请选择-</option>
				<{foreach from=$project_classes item=project_class}>
				<option value="<{$project_class.p_class_id}>" <{if $project_info.project_class_id==$project_class.p_class_id}>selected<{/if}>><{$project_class.p_class_name}></option>
				<{/foreach}>
				</select>
				<div id="sales_item_div" style="display:none">
				<label>消费项目</label>
				
				</div>
				<label>消费金额</label>
				<input type="text" name="sales_price" value="" class="input-xlarge" autofocus="true" required="true" style="width:70px" id="sales_price">
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
    var html='';
	var price=0;
    $.ajax({
		url:admin_url+"/ajax/project_item.php",
		type:"post",
		dataType:"json",
		data:{method:"add",project_class_id:project_class_id},
		success:function(data){
			console.log(data);
			$.each(data,function(k,v){
				if(!v.project_postage){
					var href="../panel/project_postage.php";
					bootbox.confirm('请先去设置项目资费', function(result) {
						if(result){
							location.replace(href);
						}
					});		
				}
				html +='<label style="display: inline-block;font-size: 12px;padding-right: 100px;" id="project_item_label"><input type="checkbox" name="project_item[]" value="'+v.project_id+'"  required  id="project_item" class="project_item" price="'+v.project_postage[0].postage_price+'">'+v.project_name+' ( 资费：￥'+v.project_postage[0].postage_price+' )</label>';
				$("#sales_item_div").html(html);
				$("#sales_item_div").show();
			});
			 $(".project_item").change(function(){
				 if($(this).is(':checked')){
					 price=price+parseFloat($(this).attr("price"));
					
				 }else{
					 price=price-parseFloat($(this).attr("price"));
				 }
				 $("#sales_price").attr("value",price);
			 });
		},
	});
}
$(function(){
	$("#sale_add_type1").validate({
		rules:{
			sales_people_name:{
				required: true ,
				
			},
			sales_people_mobile :{
				required: true ,
				isMobile: true
			},
			sales_price:{
				required:true,
				min:1
			},
			project_class_id:"required",
			"project_item[]":"required"
		},
		messages:{
			sales_people_name: {
				required: "请填写顾客姓名",
				
			},
			sales_people_mobile :{
				required: "请填写顾客手机" ,
				
			},
			sales_price:{
				required:"请填写消费金额",
				min:"请填写正确的消费金额"
			},
			project_class_id:"请选择项目分类",
			"project_item[]":"请选择理疗项目"
		}
	});
});
jQuery.validator.addMethod("isMobile", function(value, element) { 
	  var length = value.length; 
	  var mobile = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/; 
	  return this.optional(element) || (length == 11 && mobile.test(value)); 
	}, "请正确填写您的手机号码"); 

</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>