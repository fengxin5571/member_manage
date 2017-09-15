<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active" style="padding-left: 45%;"><a href="#home" data-toggle="tab" style="color: #0088cc;">非会员消费 - 消费明细查看</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home" style="width: 900px;margin: auto;">

           <form id="sale_add_type1" method="post" action="" autocomplete="off">
                <div class="block" style="overflow: hidden;">
				<a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">消费项目</a>
				<div id="page-stats_1"   class="block-body collapse in" >
				<{foreach from=$sales_info.sales_item item=item}>
				<label style="display: inline-block;font-size: 12px;padding-right: 70px;" id="project_item_label"><i class="icon-gift" style="padding-right: 5px;"></i><{$item.project_name}></label>
			   <{/foreach}>
	          
			    </div>
				</div>
                <div  style="width: 450px;float: left;">
				<label>顾客姓名<input type="text" name="sales_people_name" value="<{$sales_info.sales_people_name}>" class="input-xlarge"  disabled="true" style="margin-left: 50px;"></label>
				
				<label>顾客手机<input type="text" name="sales_people_mobile" value="<{$sales_info.sales_people_mobile}>" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
				
				<label>所属项目分类<input type="text" name="sales_people_mobile" value="<{$sales_info.p_class_name}>" class="input-xlarge" disabled="true" style="margin-left: 20px;" ></label>
				</div>
				
				<div id="sales_item_div" style="width: 400px;float: left;margin-left: 50px;">
				<label>会员等级<input type="text" name="sales_people_mobile" value="非会员" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
				<label>消费时间<input type="text" name="sales_people_mobile" value="<{$sales_info.sales_add_time}>" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
				<label>消费金额<input type="text" name="sales_people_mobile" value="￥<{$sales_info.sales_price}>" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
				</div>
				<div style="overflow: hidden;float: left;width: 900px;text-align: right;">
				<label style="padding-right: 20px;color: #505050; font-weight: bold;font-size: .85em;">操作人:<{$sales_info.sales_admin_name}></label>
				</div>
			
			</form>
        </div>
    </div>
</div>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>