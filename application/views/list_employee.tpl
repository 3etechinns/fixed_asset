<!-- CUSTOM -->
<div class="panel panel-default">                    
                    <div class="panel-body">
                        <form action="employee/search" method="post" id="search_form">                     
                        <a href="employee/create/" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>                   
                        {if isset($search_form)}{$search_form}{/if}
                    </form>                        
                       <h3 class="page-title">List of {$table_name}</h3>                  
                        {if !empty( $employee_data )}
                        <form action="employee/delete" method="post" id="listing_form">
                          <div class="table-responsive">
                            <table class="table exportable" id="employee" name="employee">
                                <thead>
                                    <th> </th>
                                    			<th>{$employee_fields.idEmployee}</th>
			<th>{$employee_fields.firstName}</th>
			<th>{$employee_fields.lastName}</th>
			<th>{$employee_fields.title}</th>
			<th>{$employee_fields.telephone}</th>
			<th>{$employee_fields.location}</th>

                                    <th style="width:180;">Actions</th>
                                </thead>
                                <tbody>
                                    {foreach $employee_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.idEmployee}" /></td>
                                            				<td>{$row.idEmployee}</td>
				<td>{$row.firstName}</td>
				<td>{$row.lastName}</td>
				<td>{$row.title}</td>
				<td>{$row.telephone}</td>
				<td>{$row.location}</td>

                                            <td style="float:right">
                                            <div class="row-actions">
                                            <a href="employee/show/{$row.idEmployee}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="employee/edit/{$row.idEmployee}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                             <a href="javascript:chk('employee/delete/{$row.idEmployee}')" class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
                                             </div>
                                            </td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                            <div class="actions-bar wat-cf">
                                <div class="actions">
                                    <button class="btn btn-danger btn-xs" type="submit">
                                       <i class="fa fa-close" aria-hidden="true"></i> Delete Selected
                                    </button>
                                    {if $showall==0}
                                    <a href="employee/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i> Show All</a>
                                    {/if}
                                    <div class="pagination-wrapper pull-right">
                                    {$pager}
                                </div>
                                </div>
                                
                            </div>
                        </form>
                        <div class="col-sm-12" id="chartArea" name="chartArea">
                        </div>
                        </div>
                        {else}
                            No records found.
                        {/if}
                    </div>
                </div>