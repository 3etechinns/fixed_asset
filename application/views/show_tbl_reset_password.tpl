<div class="panel panel-default">
                <div class="panel-body">
               <a href="tbl_reset_password/edit/{$id}"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="tbl_reset_password"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="tbl_reset_password/create/"> <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="tbl_reset_password/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="tbl_reset_password/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

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
                            <td>{$tbl_reset_password_fields.id}:</td>
                            <td>{$tbl_reset_password_data.id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.email}:</td>
                            <td>{$tbl_reset_password_data.email}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.activation_id}:</td>
                            <td>{$tbl_reset_password_data.activation_id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.agent}:</td>
                            <td>{$tbl_reset_password_data.agent}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.client_ip}:</td>
                            <td>{$tbl_reset_password_data.client_ip}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.isDeleted}:</td>
                            <td>{$tbl_reset_password_data.isDeleted}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.createdBy}:</td>
                            <td>{$tbl_reset_password_data.createdBy}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.createdDtm}:</td>
                            <td>{$tbl_reset_password_data.createdDtm}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.updatedBy}:</td>
                            <td>{$tbl_reset_password_data.updatedBy}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_reset_password_fields.updatedDtm}:</td>
                            <td>{$tbl_reset_password_data.updatedDtm}</td>
                        </tr>
						</table>                       
                    </div><!-- .inner -->
                </div><!-- .content -->