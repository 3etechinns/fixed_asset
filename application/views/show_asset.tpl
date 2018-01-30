<div class="panel panel-default">
    <div class="panel-body">
        <a href="asset/edit/{$id}">
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
        </a>
        <a href="asset">
            <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button>
        </a>
        <a href="asset/create/">
            <button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
        </a>

        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
           href="asset/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
           href="asset/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

        <h3 class="page-title">Details of {$table_name}, record #{$id}</h3>
        {if isset($direction)}
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        {/if}
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered" width="50%">
                    <thead>
                    <th width="50%">Field</th>
                    <th>Value</th>
                    </thead>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_id}:</td>
                        <td>{$asset_data.ass_id}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_status}:</td>
                        <td>{$asset_data.ass_status}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_model}:</td>
                        <td>{$asset_data.ass_model}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_serial_number}:</td>
                        <td>{$asset_data.ass_serial_number}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_barcode_number}:</td>
                        <td>{$asset_data.ass_barcode_number}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_date_acquired}:</td>
                        <td>{$asset_data.ass_date_acquired}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_date_sold}:</td>
                        <td>{$asset_data.ass_date_sold}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_purchase_price}:</td>
                        <td>{$asset_data.ass_purchase_price}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_dep_method}:</td>
                        <td>{$asset_data.ass_dep_method}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_dep_life}:</td>
                        <td>{$asset_data.ass_dep_life}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_cat_id}:</td>
                        <td>{$asset_data.ass_cat_id}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_comment}:</td>
                        <td>{$asset_data.ass_comment}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.ass_description}:</td>
                        <td>{$asset_data.ass_description}</td>
                    </tr>
                    <tr class="{cycle values='odd,even'}">
                        <td>{$asset_fields.status_status_id}:</td>
                        <td>{$asset_data.status_status_id}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Depreciation Detai
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">

                            <thead>

                            <th>    {{$depreciation_fields.dep_id}}  </th>
                            <th> {{$depreciation_fields.dep_date}}  </th>
                            <th> {{$depreciation_fields.dep_amount}} </th>
                            <th>  {{$depreciation_fields.dep_status}}  </th>
                            <th>    {{$depreciation_fields.dep_description}}</th>
                            <th>  {{$depreciation_fields.dep_commnet}} </th>
                            <th>  {{$depreciation_fields.asset_ass_id}}</th>
                            <th> Book Value</th>
                            <th>Accumulative Value</th>

                            </thead>
                            <tbody>
                            {foreach $deep_data as $row}
                                <tr>
                                    <td>   {{$row.dep_id}}</td>
                                    <td>   {{$row.dep_date}} </td>
                                    <td>    {{$row.dep_amount}}  </td>
                                    <td>    {{$row.dep_status}}    </td>
                                    <td>    {{$row.dep_description}}     </td>
                                    <td>    {{$row.dep_commnet}}      </td>
                                    <td>    {{$row.asset_ass_id}}    </td>
                                    <td> {{$row.book_value}}   </td>
                                    <td> {{$row.accumulative_value}}  </td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Asset Track</div>
                    <div class="panel-body">


                        {if isset($ass_track_data)}

                            <table class="table">
                                <thead>
                                <th>{{$ass_track_fields.ass_track_id}}</th>
                                <th>{{$ass_track_fields.date_trasferred}}</th>
                                <th>{{$ass_track_fields.date_returned}}</th>
                                <th>{{$ass_track_fields.penality_amount}}</th>
                                <th>{{$ass_track_fields.current_value}}</th>
                                <th>{{$ass_track_fields.payment_status}}</th>
                                <th>{{$ass_track_fields.payment_date}}</th>

                                </thead>
                                <tbody>
                                <tr class="{cycle values='odd,even'}">
                                    <td>{{$ass_track_data.ass_track_id}}</td>
                                    <td>{{$ass_track_data.date_trasferred}}</td>
                                    <td>{{$ass_track_data.date_returned}}</td>
                                    <td>{{$ass_track_data.penality_amount}}</td>
                                    <td>{{$ass_track_data.current_value}}</td>
                                    <td>{{$ass_track_data.payment_status}}</td>
                                    <td>{{$ass_track_data.payment_date}}</td>
                                </tr>


                                </tbody>
                            </table>

                        {/if}
                    </div>
                </div>

            </div>
        </div>
    </div><!-- .inner -->
</div><!-- .content -->
<style>
    .table > thead > tr > th {
        padding: 4px;

    }
</style>