<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div class="btn-toolbar" style="margin-bottom:2px;">
    <a href="sales_manage.php?method=add_salse_type1" class="btn btn-primary"><i class="icon-plus"></i> 非会员消费录入</a>
	<a data-toggle="collapse"   href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-plus"></i>会员消费录入</button></a>
     <a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>
<{if $_GET.search }>
<div id="search" class="collapse in">
<{else }>
<div id="search" class="collapse out" >
<{/if }>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
	<div style="float:left;margin-right:5px">
		<label>选择消费类型</label>
		<select name="sales_type" >
		<option value="1">非会员</option>
		<option value="2">会员卡</option>
		</select>
	</div>
	<div style="float:left;margin-right:5px">
		<label>查询所有顾客请留空</label>
		<input type="text" name="sales_people_name" value="<{$_GET.user_name}>" placeholder="输入顾客姓名" > 
		<input type="hidden" name="search" value="1" > 
	</div>
	<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
		<button type="submit" class="btn btn-primary">检索</button>
	</div>
	<div style="clear:both;"></div>
</form>
</div>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">消费记录</a>
        <div id="page-stats" class="block-body collapse in">
               <table class="table table-striped">
              <thead>
                <tr>
					<th style="width:20px">#</th>
					<th style="width:80px">顾客姓名</th>
					<th style="width:80px">手机</th>
					<th style="width:80px">顾客身份</th>
					<th style="width:80px">消费类型</th>
					<th style="width:80px">项目分类</th>
					<th style="width:80px">消费金额</th>
					<th style="width:80px">消费时间</th>
					<th style="width:80px">操作人员</th>
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody>							  
                <{foreach  from=$sales_list item=sales}>				 
					<tr>
					<td><{$sales.sales_id}></td>
					<td><{$sales.sales_people_name}></td>
					<td><{$sales.sales_people_mobile}></td>
					<td><{$user_info.group_name}></td>
					<td><{if $sales.sales_type ==1}>非会员<{else}>会员<{/if}></td>
					<td><{$sales.p_class_name}></td>
					<td>￥<{$sales.sales_price}></td>
					<td><{$sales.sales_add_time}></td>
					<td><{$sales.sales_admin_name}></td>
					<td>
					<a href="sales_manage.php?method=sales_info&sales_id=<{$sales.sales_id}>" title= "查看详单" ><i class="icon-folder-open"></i></a>
					&nbsp;
					<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="sales_del.php?sales_id=<{$sales.sales_id}>" ></i></a>
					
					</td>
					</tr>
				<{/foreach}>
              </tbody>
            </table> 
				<!--- START 分页模板 --->
				
               <{$page_html}>
					
			   <!--- END --->
        </div>
    </div>

<!---操作的确认层，相当于javascript:confirm函数--->
<{$osadmin_action_confirm}>

<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
<{include file="footer.tpl" }>