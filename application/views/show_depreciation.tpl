<div class="panel panel-default">
                <div class="panel-body">
               <a href="depreciation/edit/{$id}"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="depreciation"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="depreciation/create/"> <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="depreciation/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="depreciation/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

                        <h3 class="page-title">Details of {$table_name}, record #{$id}</h3>
                         {if isset($direction)}
                            <div class="flash">
                                <div class="alert alert-info">
                                    <p>You have reached end of navigation</p>
                                </div>
                            </div>
                        {/if}
					<div class="col-sm-6">
                        <table class="table table-bordered table-responsive" width="50%">
                            <thead>
                            <th width="50%">Field</th>
                            <th>Value</th>
                            </thead>
                            <tr class="{cycle values='odd,even'}">
                                <td>{$depreciation_fields.dep_id}:</td>
                                <td>{$depreciation_data.dep_id}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$depreciation_fields.dep_date}:</td>
                                <td>{$depreciation_data.dep_date}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$depreciation_fields.dep_amount}:</td>
                                <td>{$depreciation_data.dep_amount}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$depreciation_fields.dep_status}:</td>
                                <td>{$depreciation_data.dep_status}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$depreciation_fields.dep_description}:</td>
                                <td>{$depreciation_data.dep_description}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$depreciation_fields.dep_commnet}:</td>
                                <td>{$depreciation_data.dep_commnet}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$depreciation_fields.asset_ass_id}:</td>
                                <td>{$depreciation_data.asset_ass_id}</td>
                            </tr>
                        </table>
                    </div>
                    </div><!-- .inner -->
                </div><!-- .content -->