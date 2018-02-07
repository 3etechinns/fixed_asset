<div class="panel panel-default">           
                <div class="panel-body">
                 <a href="employee" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-primary" href="employee/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        {if $action_mode != 'create'}
                        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="employee/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="employee/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
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
                        <form class="form" method='post' action='employee/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="firstName">{$employee_fields.firstName}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$employee_fields.firstName}"  class="form-control" type="text" maxlength="50"  value="{if isset($employee_data)}{$employee_data.firstName}{/if}" name="firstName" id="firstName" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="lastName">{$employee_fields.lastName}<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$employee_fields.lastName}"  class="form-control" type="text" maxlength="50"  value="{if isset($employee_data)}{$employee_data.lastName}{/if}" name="lastName" id="lastName" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="title">{$employee_fields.title}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$employee_fields.title}"  class="form-control" type="text" maxlength="50"  value="{if isset($employee_data)}{$employee_data.title}{/if}" name="title" id="title" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="telephone">{$employee_fields.telephone}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$employee_fields.telephone}"  class="form-control" type="text" maxlength="50"  value="{if isset($employee_data)}{$employee_data.telephone}{/if}" name="telephone" id="telephone" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="location">{$employee_fields.location}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$employee_fields.location}"  class="form-control" type="text" maxlength="50"  value="{if isset($employee_data)}{$employee_data.location}{/if}" name="location" id="location" />
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
