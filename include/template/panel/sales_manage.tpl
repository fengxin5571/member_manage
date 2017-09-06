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
		<select name="sales_type">
		<option value="">-请选择-</option>
		<option value="1">非会员</option>
		<option value="2">会员卡</option>
		</select>
	</div>
	<div style="float:left;margin-right:5px">
		<label>查询所有顾客请留空</label>
		<input type="text" name="user_name" value="<{$_GET.user_name}>" placeholder="输入顾客姓名" > 
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
					<th style="width:80px">操作人员</th>
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody>							  
                <{foreach name=user from=$user_infos item=user_info}>				 
					<tr>
					<td><{$user_info.user_id}></td>
					<td><{$user_info.user_name}></td>
					<td><{$user_info.real_name}></td>
					<td><{$user_info.mobile}></td>
					<td><{$user_info.email}></td>
					<td><{$user_info.login_time}></td>
					<td><{$user_info.login_ip}></td>
					<td><{$user_info.group_name}></td>
					<td><{$user_info.user_desc}></td>
					<td>
					<a href="user_modify.php?user_id=<{$user_info.user_id}>" title= "修改" ><i class="icon-pencil"></i></a>
					&nbsp;
					
					<{if $user_info.user_id != 1}>
					<{if $user_info.status == 1}>
					<a data-toggle="modal" href="#myModal"  title= "封停账号" ><i class="icon-pause" href="users.php?page_no=<{$page_no}>&method=pause&user_id=<{$user_info.user_id}>"></i></a>
					<{/if }>
					<{if $user_info.status == 0}>
					<a data-toggle="modal" href="#myModal" title= "解封账号" ><i class="icon-play" href="users.php?page_no=<{$page_no}>&method=play&user_id=<{$user_info.user_id}>"></i></a>
					<{/if }>
					&nbsp;
					<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="users.php?page_no=<{$page_no}>&method=del&user_id=<{$user_info.user_id}>" ></i></a>
					<{/if}>
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