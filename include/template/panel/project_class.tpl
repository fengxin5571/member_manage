<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="btn-toolbar">
	<a href="project_class.php?method=add_class" class="btn btn-primary"><i class="icon-plus"></i> 项目分类</a>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">账号组列表</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>项目分类名称</th>
				<th>描述</th>
				<th width="80px">操作</th>
			</tr>
			</thead>
			<tbody>							  
			<{foreach name=group from=$project_classes  item=proejct_class}>
				 
				<tr>
 
				<td><{$proejct_class.p_class_id}></td>
				<td><{$proejct_class.p_class_name}></td>
				<td><{$proejct_class.p_class_desc}></td>
				<td>
				<a href="project_class.php?method=edit_class&p_id=<{$proejct_class.p_class_id}>" title= "修改" ><i class="icon-pencil"></i></a>
				&nbsp;
				<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="project_class.php?method=del_class&p_id=<{$proejct_class.p_class_id}>#myModal" data-toggle="modal" ></i></a>
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