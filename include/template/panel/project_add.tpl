<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写项目资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" autocomplete="off">
				<label>项目名</label>
				<input type="text" name="project_name" value="<{$project_info.project_name}>" class="input-xlarge" autofocus="true" required="true" >
				<label>描述</label>
				<textarea name="project_desc" rows="3" class="input-xlarge"><{$project_info.project_desc}></textarea>
				<label>所属项目分类</label>
				<select name="project_class_id">
				<{foreach from=$project_classes item=project_class}>
				<option value="<{$project_class.p_class_id}>" <{if $project_info.project_class_id==$project_class.p_class_id}>selected<{/if}>><{$project_class.p_class_name}></option>
				<{/foreach}>
				</select>
				
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>