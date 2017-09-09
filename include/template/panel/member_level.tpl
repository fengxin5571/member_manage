<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="btn-toolbar">
	<a href="member_level.php?method=add_level" class="btn btn-primary"><i class="icon-plus"></i> 会员等级</a>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">会员等级列表</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>会员等级名称</th>
				<th>等级条件</th>
				<th>描述</th>
				<th width="80px">操作</th>
			</tr>
			</thead>
			<tbody>							  
			<{foreach  from=$member_levels  item=member_level}>
				 
				<tr>
 
				<td><{$member_level.m_level_id}></td>
				<td><{$member_level.m_level_name}></td>
				<td>首年首次充值&nbsp;&nbsp;<span style="color:#0088cc">￥<{$member_level.m_level_condition}></span></td>
				<td><{$member_level.m_level_desc}></td>
				<td>
				<a href="member_level.php?method=edit_level&m_level_id=<{$member_level.m_level_id}>" title= "修改" ><i class="icon-pencil"></i></a>
				&nbsp;
				<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="member_level.php?method=del_level&m_level_id=<{$member_level.m_level_id}>#myModal" data-toggle="modal" ></i></a>
				</td>
				</tr>
			<{/foreach}>
		  </tbody>
		</table>  
	</div>
</div>

<!---操作的确认层，相当于javascript:confirm函数--->
<{$osadmin_action_confirm}>
	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>