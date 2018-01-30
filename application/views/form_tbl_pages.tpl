<div class="panel panel-default">           
                <div class="panel-body">
                 <a href="tbl_pages" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-success" href="tbl_pages/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        {if $action_mode != 'create'}
                        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="tbl_pages/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="tbl_pages/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
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
                        <form class="form" method='post' action='tbl_pages/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pg_name">{$tbl_pages_fields.pg_name}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_pages_fields.pg_name}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_pages_data)}{$tbl_pages_data.pg_name}{/if}" name="pg_name" id="pg_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pg_description">{$tbl_pages_fields.pg_description} name="pg_description" id="pg_description">{if isset($tbl_pages_data)}{$tbl_pages_data.pg_description}{/if}</textarea>
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pg_controller">{$tbl_pages_fields.pg_controller}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_pages_fields.pg_controller}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_pages_data)}{$tbl_pages_data.pg_controller}{/if}" name="pg_controller" id="pg_controller" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pg_status">{$tbl_pages_fields.pg_status}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_pages_fields.pg_status}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_pages_data)}{$tbl_pages_data.pg_status}{/if}" name="pg_status" id="pg_status" />
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
