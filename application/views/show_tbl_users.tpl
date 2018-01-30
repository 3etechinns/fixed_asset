<div class="panel panel-default">
                <div class="panel-body">
               <a href="tbl_users/edit/{$id}"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="tbl_users"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="tbl_users/create/"> <button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="tbl_users/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="tbl_users/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

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
                            <td>{$tbl_users_fields.userId}:</td>
                            <td>{$tbl_users_data.userId}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.email}:</td>
                            <td>{$tbl_users_data.email}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.password}:</td>
                            <td>{$tbl_users_data.password}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.name}:</td>
                            <td>{$tbl_users_data.name}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.mobile}:</td>
                            <td>{$tbl_users_data.mobile}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.roleId}:</td>
                            <td>{$tbl_users_data.roleId}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.isDeleted}:</td>
                            <td>{$tbl_users_data.isDeleted}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.createdBy}:</td>
                            <td>{$tbl_users_data.createdBy}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.createdDtm}:</td>
                            <td>{$tbl_users_data.createdDtm}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.updatedBy}:</td>
                            <td>{$tbl_users_data.updatedBy}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$tbl_users_fields.updatedDtm}:</td>
                            <td>{$tbl_users_data.updatedDtm}</td>
                        </tr>
						</table>                       
                    </div><!-- .inner -->
                </div><!-- .content -->