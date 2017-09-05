<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="btn-toolbar" style="margin-bottom:2px;">
    <a href="projects.php?method=add_project" class="btn btn-primary"><i class="icon-plus"></i> 项目</a>
	<a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>
<{if $_GET.search }>
<div id="search" class="collapse in">
<{else }>
<div id="search" class="collapse out" >
<{/if }>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
	<div style="float:left;margin-right:5px">
		<label>选择账号分类</label>
		<select name="project_class_id" >
		<{foreach from=$project_classes  item=project_class}>
		<option value="<{$project_class.p_class_id}>"><{$project_class.p_class_name}></option>
		<{/foreach}>
		</select>
	</div>
	<div style="float:left;margin-right:5px">
		<label>查询所有项目请留空</label>
		<input type="text" name="project_name" value="<{$_GET.user_name}>" placeholder="输入项目名" > 
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
					<th style="width:80px">所属分类#</th>
					<th style="width:80px">项目名称</th>
					<th style="width:80px">描述</th>
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody>							  
                <{foreach  from=$projects item=project}>				 
					<tr>
					<td><{$project.project_id}></td>
					<td><{$project.p_class_name}></td>
					<td><{$project.project_name}></td>
					<td><{$project.project_desc}></td>
					<td>
					<a href="projects.php?method=edit&project_id=<{$project.project_id}>" title= "修改" ><i class="icon-pencil"></i></a>
					&nbsp;
					<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="projects.php?page_no=<{$page_no}>&method=del&project_id=<{$project.project_id}>" ></i></a>
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
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>