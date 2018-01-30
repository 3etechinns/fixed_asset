<div class="panel panel-default">
                <div class="panel-body">
               <a href="tbl_pages/edit/{$id}"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="tbl_pages"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="tbl_pages/create/"> <button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="tbl_pages/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="tbl_pages/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

                        <h3 class="page-title">Details of {$table_name}, record #{$id}</h3>
                         {if isset($direction)}
                            <div class="flash">
                                <div class="alert alert-info">
                                    <p>You have reached end of navigation</p>
                                </div>
                            </div>
                        {/if}
						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="{cycle values='odd,even'}">
                            <td>{$tbl_pages_fields.pg_id}:</td>
                            <td>{$tbl_pages_data.pg_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_pages_fields.pg_name}:</td>
                            <td>{$tbl_pages_data.pg_name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_pages_fields.pg_description}:</td>
                            <td>{$tbl_pages_data.pg_description}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_pages_fields.pg_controller}:</td>
                            <td>{$tbl_pages_data.pg_controller}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_pages_fields.pg_status}:</td>
                            <td>{$tbl_pages_data.pg_status}</td>
                        </tr>
						</table>                       
                    </div><!-- .inner -->
                </div><!-- .content -->