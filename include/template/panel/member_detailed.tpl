<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active" style="padding-left: 45%;"><a href="#home" data-toggle="tab" style="color: #0088cc;">会员余额 - 金额明细查看</a></li>
    </ul>	
     <div class="tab-pane active in" id="home" style="width: 900px;margin: auto;overflow: hidden;">
    <div  style="width: 450px;float: left;">
	<label>会员姓名<input type="text" name="" value="<{$member_info.member_name}>" class="input-xlarge"  disabled="true" style="margin-left: 50px;"></label>
	
	<label>会员手机<input type="text" name="sales_people_mobile" value="<{$member_info.member_mobile}>" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
	
	<label>会员卡号<input type="text" name="sales_people_mobile" value="<{$member_info.member_card}>" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
	</div>
	
	<div id="sales_item_div" style="width: 400px;float: left;margin-left: 50px;">
	<label>会员等级<input type="text" name="sales_people_mobile" value="<{$member_info.member_level.m_level_name}>" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
	<label>加入时间<input type="text" name="sales_people_mobile" value="<{$member_info.member_add_time}>" class="input-xlarge" disabled="true" style="margin-left: 50px;" ></label>
	<label>会员余额<input type="text" name="sales_people_mobile" value="￥<{$member_info.member_money.m_money_price}>" class="input-xlarge" disabled="true" style="margin-left: 50px;color:#0088cc" ></label>
	</div>
	<div style="overflow: hidden;float: left;width: 900px;text-align: right;">
		<label style="padding-right: 20px;color: #505050; font-weight: bold;font-size: .85em;"><button onclick="member_deposit(<{$member_info.member_id}>)">充值</button></label>
	</div>
    </div>
     <div class="block" style="overflow: hidden;">
     <a href="#page-stats_1" class="block-heading" data-toggle="collapse" style="margin-bottom: 15px">余额明细</a>
     <div id="page-stats_1"   class="block-body collapse in" >
		 <table class="table table-striped">
	             <thead>
	               <tr>
					<th style="width:20px">#</th>
					<th style="width:80px">明细操作 </th>
					<th style="width:100px">明细金额</th>
					<th style="width:100px">变动时间</th>
					<th style="width:80px">明细类型</th>
					<th style="width:80px">消费编号</th>
					<th style="width:80px">操作人</th>
					
	               </tr>
	             </thead>
	             <tbody>							  
	               <{foreach  from=$member_detailed  item=detailed}>				 
					<tr>
					<td><{$detailed.detailed_id}></td>
					<td><{$detailed.detailed_operation}></td>
					<td style="color:#0088cc">￥<{$detailed.detailed_price}></td>
					<td><{$detailed.detailed_time}></td>
					<td><{$detailed.detailed_type}></td>
					<td><{if $detailed.detailed_sales_no}><a href="<{$admin_url}>/panel/sales_manage.php?method=sales_info&sales_id=<{$detailed.detailed_sales_no}>"><{$detailed.detailed_sales_no}></a><{else}>充值单<{/if}></td>
					<td><{$detailed.detailed_admin}></td>
					</tr>
				<{/foreach}>
	             </tbody>
	           </table> 
	           <!--- START 分页模板 --->
				
               <{$page_html}>
					
			   <!--- END --->
	           </div>
	       </div>
	       
</div>
<script>
//会员充值
var admin_url='<{$admin_url}>';
function member_deposit(member_id){
	window.location.href=admin_url+"/panel/member_deposit.php?method=add_money&member_id="+member_id;
}
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>