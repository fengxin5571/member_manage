function get_sales_item(project_class_id,sales_type){
    var html=$("#sales_item_div").html();
	var price=0;
    $.ajax({
		url:admin_url+"/ajax/project_item.php",
		type:"post",
		dataType:"json",
		data:{method:"add",project_class_id:project_class_id,sales_type:sales_type},
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
				if($("#procject_item_lb_"+v.project_id).length==0){
					html +='<label style="display: inline-block;font-size: 12px;padding-right: 100px;" id="procject_item_lb_'+v.project_id+'" class="procject_item_label"><input type="checkbox" name="project_item[]" value="'+v.project_id+'"  required  id="project_item" class="project_item" price="'+v.project_postage[0].postage_price+'">'+v.project_name+' ( 资费：￥'+v.project_postage[0].postage_price+' )</label>';
				}
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