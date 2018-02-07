<div class="panel panel-default">
                <div class="panel-body">
               <a href="employee/edit/{$id}"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="employee"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="employee/create/"> <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}" href="employee/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}" href="employee/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

                        <h3 class="page-title">Details of {$table_name}, record #{$id}</h3>
                         {if isset($direction)}
                            <div class="flash">
                                <div class="alert alert-info">
                                    <p>You have reached end of navigation</p>
                                </div>
                            </div>
                        {/if}
					<div class="col-sm-6">
                        <table class="table table-bordered" >
                            <thead>
                            <th width="40%">Field</th>
                            <th>Value</th>
                            </thead>
                            <tr class="{cycle values='odd,even'}">
                                <td>{$employee_fields.idEmployee}:</td>
                                <td>{$employee_data.idEmployee}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$employee_fields.firstName}:</td>
                                <td>{$employee_data.firstName}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$employee_fields.lastName}:</td>
                                <td>{$employee_data.lastName}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$employee_fields.title}:</td>
                                <td>{$employee_data.title}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$employee_fields.telephone}:</td>
                                <td>{$employee_data.telephone}</td>
                            </tr><tr class="{cycle values='odd,even'}">
                                <td>{$employee_fields.location}:</td>
                                <td>{$employee_data.location}</td>
                            </tr>
                        </table>
                    </div>
                    </div><!-- .inner -->
                </div><!-- .content -->