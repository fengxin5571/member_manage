<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->
<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="btn-toolbar" style="margin-bottom:2px;">
    <a href="member_add.php" class="btn btn-primary"><i class="icon-plus"></i> 会员办卡</a>
	<a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>
<{if $_GET.search }>
<div id="search" class="collapse in">
<{else }>
<div id="search" class="collapse out" >
<{/if }>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
	<div style="float:left;margin-right:5px">
		<label>选择会员等级</label>
		<select name="member_level_id">
		<option>-请选择-</option>
		<{foreach from=$member_level item=level}>
		<option value='<{$level.m_level_id}>'><{$level.m_level_name}></option>
		<{/foreach}>
		</select>
	</div>
	<div style="float:left;margin-right:5px">
		<label>查询所有会员请留空</label>
		<input type="text" name="member_condition" value="<{$_GET.user_name}>" placeholder="输入会员卡号或手机" > 
		<input type="hidden" name="search" value="1" > 
	</div>
	<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
		<button type="submit" class="btn btn-primary">检索</button>
	</div>
	<div style="clear:both;"></div>
</form>
</div>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">账号列表</a>
        <div id="page-stats" class="block-body collapse in">
               <table class="table table-striped">
              <thead>
                <tr>
					<th style="width:20px">#</th>
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
              <tbody>							  
                <{foreach name=user from=$member_list item=member}>				 
					<tr>
					<td><{$member.member_id}></td>
					<td style="color:#0088cc"><{$member.member_card}></td>
					<td><{$member.member_name}></td>
					<td><{$member.member_mobile}></td>
					<td><{if $member_sex ==0}>男<{else}>女<{/if}></td>
					<td><{$member.member_age}></td>
					<td><{$member.member_add_time}></td>
					<td><{$member.m_level_name}></td>
				
					<td>
					<a href="member_list.php?method=edit&member_id=<{$member.member_id}>" title= "修改" ><i class="icon-pencil"></i></a>
					&nbsp;
					<a href="member_list.php?method=member_detailed&member_id=<{$member.member_id}>" title= "查看余额" ><i class="icon-calendar"></i></a>
					&nbsp;
					
					&nbsp;
					<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="member_del.php?method=del&member_id=<{$member.member_id}>" ></i></a>
					
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