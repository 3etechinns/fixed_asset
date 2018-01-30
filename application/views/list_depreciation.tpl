<!-- CUSTOM -->
<div class="panel panel-default">                    
                    <div class="panel-body">
                        <form action="depreciation/search" method="post" id="search_form">                     
                        <a href="depreciation/create/" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>                   
                        {if isset($search_form)}{$search_form}{/if}
                    </form>                        
                       <h3 class="page-title">List of {$table_name}</h3>                  
                        {if !empty( $depreciation_data )}
                        <form action="depreciation/delete" method="post" id="listing_form">
                          <div class="table-responsive">
                            <table class="table exportable" id="depreciation" name="depreciation">
                                <thead>
                                    <th> </th>
                                    			<th>{$depreciation_fields.dep_date}</th>
			<th>{$depreciation_fields.dep_amount}</th>
			<th>{$depreciation_fields.dep_status}</th>
			<th>{$depreciation_fields.dep_description}</th>
			<th>{$depreciation_fields.dep_commnet}</th>
			<th>{$depreciation_fields.asset_ass_id}</th>

                                    <th style="width:180;">Actions</th>
                                </thead>
                                <tbody>
                                    {foreach $depreciation_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.dep_id}" /></td>
                                            				<td>{$row.dep_date}</td>
				<td>{$row.dep_amount}</td>
				<td>{$row.dep_status}</td>
				<td>{$row.dep_description}</td>
				<td>{$row.dep_commnet}</td>
				<td>{$row.asset_ass_id}</td>

                                            <td style="float:right">
                                            <div class="row-actions">
                                            <a href="depreciation/show/{$row.dep_id}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="depreciation/edit/{$row.dep_id}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                             <a href="javascript:chk('depreciation/delete/{$row.dep_id}')" class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
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
                                    <a href="depreciation/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i> Show All</a>
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