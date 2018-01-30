<!-- CUSTOM -->
<div class="panel panel-default">                    
                    <div class="panel-body">
                        <form action="tbl_pages/search" method="post" id="search_form">                     
                        <a href="tbl_pages/create/" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>                        
                        <div class="input-group" style="width:300px;float:right">
                            <input type="text" required="true" class="form-control" name="search" id="search" onkeyup="myFunction()" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            <span class="input-group-btn">
                                <a class="btn btn-default" type="submit" id="exportToExcell" name="exportToExcell">
                                    <i class="fa fa-download"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                         <span id="searchResult" name="searchResult" class="label-info">{if !empty($search_result)} {$search_result}{/if}</span>
                       <h3 class="page-title">List of {$table_name}</h3>                  
                        {if !empty( $tbl_pages_data )}
                        <form action="tbl_pages/delete" method="post" id="listing_form">
                          <div class="table-responsive">
                            <table class="table exportable" id="tbl_pages" name="tbl_pages">
                                <thead>
                                    <th> </th>
                                    			<th>{$tbl_pages_fields.pg_name}</th>
			<th>{$tbl_pages_fields.pg_controller}</th>
			<th>{$tbl_pages_fields.pg_status}</th>

                                    <th style="width:180;">Actions</th>
                                </thead>
                                <tbody>
                                    {foreach $tbl_pages_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.pg_id}" /></td>
                                            				<td>{$row.pg_name}</td>
				<td>{$row.pg_controller}</td>
				<td>{$row.pg_status}</td>

                                            <td style="float:right">
                                            <div class="row-actions">
                                            <a href="tbl_pages/show/{$row.pg_id}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="tbl_pages/edit/{$row.pg_id}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                             <a href="javascript:chk('tbl_pages/delete/{$row.pg_id}')" class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
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
                                    <a href="tbl_pages/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i> Show All</a>
                                    {/if}
                                    <div class="pagination-wrapper pull-right">
                                    {$pager}
                                </div>
                                </div>
                                
                            </div>
                        </form>
                     
                        </div>
                        {else}
                            No records found.
                        {/if}
                    </div>
                </div>