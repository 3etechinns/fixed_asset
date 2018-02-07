<div class="panel panel-default">           
                <div class="panel-body">
                 <a href="tbl_reset_password" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-primary" href="tbl_reset_password/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        {if $action_mode != 'create'}
                        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="tbl_reset_password/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="tbl_reset_password/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
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
                        <form class="form" method='post' action='tbl_reset_password/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="email">{$tbl_reset_password_fields.email}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.email}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.email}{/if}" name="email" id="email" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="activation_id">{$tbl_reset_password_fields.activation_id}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.activation_id}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.activation_id}{/if}" name="activation_id" id="activation_id" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="agent">{$tbl_reset_password_fields.agent}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.agent}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.agent}{/if}" name="agent" id="agent" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="client_ip">{$tbl_reset_password_fields.client_ip}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.client_ip}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.client_ip}{/if}" name="client_ip" id="client_ip" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="isDeleted">{$tbl_reset_password_fields.isDeleted}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.isDeleted}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.isDeleted}{/if}" name="isDeleted" id="isDeleted" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="createdBy">{$tbl_reset_password_fields.createdBy}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.createdBy}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.createdBy}{/if}" name="createdBy" id="createdBy" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="createdDtm">{$tbl_reset_password_fields.createdDtm}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.createdDtm}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.createdDtm}{/if}" name="createdDtm" id="createdDtm" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="updatedBy">{$tbl_reset_password_fields.updatedBy}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.updatedBy}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.updatedBy}{/if}" name="updatedBy" id="updatedBy" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="updatedDtm">{$tbl_reset_password_fields.updatedDtm}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$tbl_reset_password_fields.updatedDtm}"  class="form-control" type="text" maxlength="50"  value="{if isset($tbl_reset_password_data)}{$tbl_reset_password_data.updatedDtm}{/if}" name="updatedDtm" id="updatedDtm" />
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
