<div class="panel panel-default">           
                <div class="panel-body">
                 <a href="status" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-primary" href="status/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        {if $action_mode != 'create'}
                        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="status/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="status/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
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
                        <form class="form" method='post' action='status/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="status">{$status_fields.status}</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter {$status_fields.status}"  class="form-control" type="text" maxlength="50"  value="{if isset($status_data)}{$status_data.status}{/if}" name="status" id="status" />
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
