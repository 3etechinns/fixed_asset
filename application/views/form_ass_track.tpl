<div class="panel panel-default">           
                <div class="panel-body">
                 <a href="ass_track" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-success" href="ass_track/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        {if $action_mode != 'create'}
                        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="ass_track/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="ass_track/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
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
                        <form class="form" method='post' action='ass_track/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="date_trasferred">{$ass_track_fields.date_trasferred}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$ass_track_fields.date_trasferred}"  class="form-control" type="text" maxlength="50"  value="{if isset($ass_track_data)}{$ass_track_data.date_trasferred}{/if}" name="date_trasferred" id="date_trasferred" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="date_returned">{$ass_track_fields.date_returned}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$ass_track_fields.date_returned}"  class="form-control" type="text" maxlength="50"  value="{if isset($ass_track_data)}{$ass_track_data.date_returned}{/if}" name="date_returned" id="date_returned" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="penality_amount">{$ass_track_fields.penality_amount}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$ass_track_fields.penality_amount}"  class="form-control" type="text" maxlength="50"  value="{if isset($ass_track_data)}{$ass_track_data.penality_amount}{/if}" name="penality_amount" id="penality_amount" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="current_value">{$ass_track_fields.current_value}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$ass_track_fields.current_value}"  class="form-control" type="text" maxlength="50"  value="{if isset($ass_track_data)}{$ass_track_data.current_value}{/if}" name="current_value" id="current_value" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label">{$ass_track_fields.payment_status}</label>
            <div class="col-md-6">
            <label class="form-control">
            <input type="checkbox" value="1" name="payment_status" id="payment_status" {if isset($ass_track_data)}{if $ass_track_data.payment_status == 1} checked="checked" {/if}{/if} /></label>
    		
            </div>
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="payment_date">{$ass_track_fields.payment_date}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$ass_track_fields.payment_date}"  class="form-control" type="text" maxlength="50"  value="{if isset($ass_track_data)}{$ass_track_data.payment_date}{/if}" name="payment_date" id="payment_date" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="Asset_ass_id">{$ass_track_fields.Asset_ass_id}<span class="error">*</span></label>
            <div class="col-md-6">
    		<select class="form-control field select addr" name="Asset_ass_id" id="Asset_ass_id"  required="required" >
                <option value="">Select One</option>
                {foreach $related_asset as $rel}
                    <option value="{$rel.asset_id}"{if isset($ass_track_data)}{if $ass_track_data.Asset_ass_id == $rel.asset_id} selected="selected"{/if}{/if}>{$rel.asset_name}</option>
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
