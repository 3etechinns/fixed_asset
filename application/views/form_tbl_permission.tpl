<div class="panel panel-default">           
                <div class="panel-body">
                 <a href="tbl_permission" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-primary" href="tbl_permission/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        {if $action_mode != 'create'}
                        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="tbl_permission/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="tbl_permission/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
                          {/if}
                        {if $action_mode == 'create'}
                            <h3 class="page-title">Add new record</h3>
                        {else}
                            <h3 class="page-title">Edit record: #{$record_id}</h3>
                        {/if}
                        {if isset($errors)}
                            <div class="flash">
                                <div class="alert alert-danger">
                                    <p>{$errors}</p>
                                </div>
                            </div>
                        {/if}
                        {if isset($direction)}
                            <div class="flash">
                                <div class="alert alert-info">
                                    <p>You have reached end of navigation</p>
                                </div>
                            </div>
                        {/if}
                        <form class="form" method='post' action='tbl_permission/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pm_pg_id">{$tbl_permission_fields.pm_pg_id}<span class="error">*</span></label>
            <div class="col-md-6">
    		<select class="form-control field select addr" name="pm_pg_id" id="pm_pg_id"  required="required" >
                <option value="">Select One</option>
                {foreach $related_tbl_pages as $rel}
                    <option value="{$rel.tbl_pages_id}"{if isset($tbl_permission_data)}{if $tbl_permission_data.pm_pg_id == $rel.tbl_pages_id} selected="selected"{/if}{/if}>{$rel.tbl_pages_name}</option>
                {/foreach}
        	</select>
            </div>
    		
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label">{$tbl_permission_fields.pm_enabled}</label>
                <select class="form-control" name="pm_enabled" id="pm_enabled"  required="required" >
                    <option value="0">Select One</option>
                    {foreach $metadata.pm_enabled.enum_values as $k => $e}
                        <option value="{$e}"{if isset($tbl_permission_data.pm_enabled)}{if $tbl_permission_data.pm_enabled == $metadata.pm_enabled.enum_values[$k]} selected="selected"{/if}{/if}>{$metadata.pm_enabled.enum_values[$k]}</option>
                    {/foreach}
            	</select>
    		
            </div>
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label">{$tbl_permission_fields.pm_edit} ></label>
             <select class="form-control" name="pm_edit" id="pm_edit"  required="required" >
                    <option value="0">Select One</option>
                    {foreach $metadata.pm_edit.enum_values as $k => $e}
                        <option value="{$e}"{if isset($tbl_permission_data.pm_edit)}{if $tbl_permission_data.pm_edit == $metadata.pm_edit.enum_values[$k]} selected="selected"{/if}{/if}>{$metadata.pm_edit.enum_values[$k]}</option>
                    {/foreach}
            	</select>
    		
            </div>
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label">{$tbl_permission_fields.pm_insert} ></label>
                 <select class="form-control" name="pm_insert" id="pm_insert"  required="required" >
                    <option value="0">Select One</option>
                    {foreach $metadata.pm_insert.enum_values as $k => $e}
                        <option value="{$e}"{if isset($tbl_permission_data.pm_insert)}{if $tbl_permission_data.pm_insert == $metadata.pm_insert.enum_values[$k]} selected="selected"{/if}{/if}>{$metadata.pm_insert.enum_values[$k]}</option>
                    {/foreach}
            	</select>
    		
            </div>
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label">{$tbl_permission_fields.pm_view} ></label>
                <select class="form-control" name="pm_view" id="pm_view"  required="required" >
                    <option value="0">Select One</option>
                    {foreach $metadata.pm_view.enum_values as $k => $e}
                        <option value="{$e}"{if isset($tbl_permission_data.pm_view)}{if $tbl_permission_data.pm_view == $metadata.pm_view.enum_values[$k]} selected="selected"{/if}{/if}>{$metadata.pm_view.enum_values[$k]}</option>
                    {/foreach}
            	</select>
    		
            </div>
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label">{$tbl_permission_fields.pm_delete} ></label>
             <select class="form-control" name="pm_delete" id="pm_delete"  required="required" >
                    <option value="0">Select One</option>
                    {foreach $metadata.pm_delete.enum_values as $k => $e}
                        <option value="{$e}"{if isset($tbl_permission_data.pm_delete)}{if $tbl_permission_data.pm_delete == $metadata.pm_delete.enum_values[$k]} selected="selected"{/if}{/if}>{$metadata.pm_delete.enum_values[$k]}</option>
                    {/foreach}
            	</select>
    		
            </div>
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label">{$tbl_permission_fields.pm_show} ></label>
              <select class="form-control" name="pm_show" id="pm_show"  required="required" >
                    <option value="0">Select One</option>
                    {foreach $metadata.pm_show.enum_values as $k => $e}
                        <option value="{$e}"{if isset($tbl_permission_data.pm_show)}{if $tbl_permission_data.pm_show == $metadata.pm_show.enum_values[$k]} selected="selected"{/if}{/if}>{$metadata.pm_show.enum_values[$k]}</option>
                    {/foreach}
            	</select>
    		
            </div>
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pm_role">{$tbl_permission_fields.pm_role}<span class="error">*</span></label>
            <div class="col-md-6">
    		<select class="form-control field select addr" name="pm_role" id="pm_role"  required="required" >
                <option value="">Select One</option>
                {foreach $related_tbl_roles as $rel}
                    <option value="{$rel.tbl_roles_id}"{if isset($tbl_permission_data)}{if $tbl_permission_data.pm_role == $rel.tbl_roles_id} selected="selected"{/if}{/if}>{$rel.tbl_roles_name}</option>
                {/foreach}
        	</select>
            </div>
    		
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pm_description">{$tbl_permission_fields.pm_description} name="pm_description" id="pm_description">{if isset($tbl_permission_data)}{$tbl_permission_data.pm_description}{/if}</textarea>
    		</div>
    		
    	</div>
    
<br>
                           <div class="form-group button-actions box-footer">
                           <div class="col-md-offset-4 col-md-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <span class="text_button_padding">or</span>
                                    <a class="btn btn-default" href="javascript:window.history.back();">Cancel</a>
                            </div>
                        </form>
                </div><!-- .content -->
            </div><!-- .block -->
