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
.procject_item_label label{
	color:red;
	padding-right: 10px;
	position: absolute;
    padding-left: 300px;
}
</style>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">会员消费 - 请填写顾客消费资料</a></li>
    </ul>	

	<div style="margin-right:5px">
		<label>请输入会员手机或卡号</label>
		<input type="text" name="member_condition" value=""  placeholder="请输入会员手机或卡号"  required="true" id="member_condition"> 
		<a data-toggle="collapse"  href="#" title="检索"><button class="btn btn-primary" style="margin-left:5px;vertical-align: super;" onclick="get_member()"><i class="icon-search"></i></button></a>
	</div>
   <div style="display:none" id="member_info_div">
	    <div class="block" style="overflow: hidden;">
				<a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">会员信息</a>
				<div id="page-stats_1"   class="block-body collapse in" >
				   <table class="table table-striped">
              <thead>
                <tr>
					<th style="width:20px" >#</th>
					<th style="width:80px">会员卡号 </th>
					<th style="width:100px">姓名</th>
					<th style="width:100px">手机</th>
					<th style="width:80px">会员性别</th>
					<th style="width:80px">会员年龄</th>
					<th style="width:80px">加入时间</th>
					<th style="width:80px">会员等级#</th>
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody  id="member_info_tr">							  
					
				
              </tbody>
            </table> 
	          
			    </div>
		</div>
   </div>
  <div id="myTabContent" class="tab-content" style="display:none">
          <ul class="nav nav-tabs">
		      <li class="active" style="margin-left: 50em;"><a href="#home" data-toggle="tab">会员消费录入</a></li>
		   </ul>	
		  <div class="tab-pane active in" id="home" style="width:400px;margin: auto">
           
           <form id="sale_add_type2" method="post" action="" autocomplete="off">
				<label>会员姓名</label>
				<input type="text" name="sales_people_name" value="1 class="input-xlarge" autofocus="true" required="true"  readonly = "readonly"  id="sales_people_name">
				<input type="hidden" name="member_id" id="member_id"/>
				<label>会员手机</label>
				<input type="text" name="sales_people_mobile" value="" class="input-xlarge" autofocus="true" required="true" readonly = "readonly" id="sales_people_mobile">
				<label>会员卡号</label>
				<input type="text" name="sales_people_card" value="" class="input-xlarge" autofocus="true" required="true" readonly = "readonly"  id="sales_people_card">
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

function get_member(){
	var member_condition=$('#member_condition').val();
	if(member_condition==""){
		alert("请输入会员手机或卡号");
		return;
	}
	$.ajax({
		url:admin_url+"/ajax/project_item.php",
		type:"post",
		dataType:"json",
		data:{method:"get_member",member_condition:member_condition},
		success:function(data){
			console.log(data);
			if(data.member_info){
				     var html="";
				     $.each(data.member_info,function(k,v){
				    	  html+='<tr id="member_info_tr_'+v.member_id+'"><td>'+v.member_id+'</td>';
						  html+='<td style="color:#0088cc">'+v.member_card+'</td>';
						  html+='<td>'+v.member_name+'</td>';
						  html+='<td>'+v.member_mobile+'</td>';
						  html+='<td>'+(v.member_sex==0?"男":"女")+'</td>';
						  html+='<td>'+v.member_age+'</td>';
						  html+='<td>'+v.member_add_time+'</td>';
						  html+='<td>'+v.m_level_name+'</td>';
						  html+='<td><a href="javascript:void(0)" title= "录入" onclick="input_member_sales('+v.member_id+')"><i class="icon-pencil"></i></a>&nbsp;&nbsp;<a data-toggle="modal" href="#myModal" title= "取消" ><i class="icon-remove" href="javascript:void(0)" onclick="del_member_tr('+v.member_id+')" ></i></a></td></tr>';
				     });
				     $('#member_info_tr').html(html);
				     
			}else{
				var html='<tr ><td colspan="9" style="text-align: center;">对不起！，没有找到相关的会员信息，<a href="../panel/member_add.php">点击我</a>&nbsp;&nbsp;办理会员开卡服务</td></tr>';
				$('#member_info_tr').html(html);
				
			}
			$("#member_info_div").show();
		}
	});
}
//删除获取的会员
function del_member_tr(member_id){
	$('#member_info_tr_'+member_id).remove();
}
//会员销售录入赋值
function input_member_sales(member_id){
	if(!member_id){
		return ;
	}
	$.ajax({
		url:admin_url+"/ajax/project_item.php",
		type:"post",
		dataType:"json",
		data:{method:"input_member_sale",member_id:member_id},
		success:function(data){
			if(data.member_info){
				$('#sales_people_name').val(data.member_info.member_name);
				$('#sales_people_mobile').val(data.member_info.member_mobile);
				$("#sales_people_card").val(data.member_info.member_card);
				$('#member_id').val(data.member_info.member_id);
				$("#myTabContent").show();
			}
		}
	});
}
$(function(){
	$("#sale_add_type2").validate({
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
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>