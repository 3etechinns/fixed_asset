<div class="panel panel-default">           
                <div class="panel-body">
                 <a href="depreciation" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-primary" href="depreciation/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        {if $action_mode != 'create'}
                        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="depreciation/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="depreciation/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
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
                        <form class="form" method='post' action='depreciation/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_date">{$depreciation_fields.dep_date}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$depreciation_fields.dep_date}"  class="form-control" type="text" maxlength="50"  value="{if isset($depreciation_data)}{$depreciation_data.dep_date}{/if}" name="dep_date" id="dep_date" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_amount">{$depreciation_fields.dep_amount}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$depreciation_fields.dep_amount}"  class="form-control" type="text" maxlength="50"  value="{if isset($depreciation_data)}{$depreciation_data.dep_amount}{/if}" name="dep_amount" id="dep_amount" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_status">{$depreciation_fields.dep_status}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$depreciation_fields.dep_status}"  class="form-control" type="text" maxlength="50"  value="{if isset($depreciation_data)}{$depreciation_data.dep_status}{/if}" name="dep_status" id="dep_status" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_description">{$depreciation_fields.dep_description}</label>
    		<div class="col-md-6">
        		<textarea placeholder="Enter {$depreciation_fields.dep_description}" class="form-control" rows="5" cols="50" class="text_area" name="dep_description" id="dep_description">{if isset($depreciation_data)}{$depreciation_data.dep_description}{/if}</textarea>
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_commnet">{$depreciation_fields.dep_commnet}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$depreciation_fields.dep_commnet}"  class="form-control" type="text" maxlength="50"  value="{if isset($depreciation_data)}{$depreciation_data.dep_commnet}{/if}" name="dep_commnet" id="dep_commnet" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="asset_ass_id">{$depreciation_fields.asset_ass_id}<span class="error">*</span></label>
            <div class="col-md-6">
    		<select class="form-control field select addr" name="asset_ass_id" id="asset_ass_id"  required="required" >
                <option value="">Select One</option>
                {foreach $related_asset as $rel}
                    <option value="{$rel.asset_id}"{if isset($depreciation_data)}{if $depreciation_data.asset_ass_id == $rel.asset_id} selected="selected"{/if}{/if}>{$rel.asset_name}</option>
                {/foreach}
        	</select>
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
