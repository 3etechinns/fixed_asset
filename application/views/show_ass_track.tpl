<div class="panel panel-default">
    <div class="panel-body">
        <a href="ass_track/edit/{$id}">
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
        </a>
        <a href="ass_track">
            <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button>
        </a>
        <a href="ass_track/create/">
            <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
        </a>

        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
           href="ass_track/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
           href="ass_track/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

        <h3 class="page-title">Details of {$table_name}, record #{$id}</h3>
        {if isset($direction)}
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        {/if}
      <div class="col-sm-7 col-md-offset-1">
          <table class="table table-bordered" >
              <thead>
              <th width="50%">Field</th>
              <th>Value</th>
              </thead>
              <tr class="{cycle values='odd,even'}">
                  <td>{$ass_track_fields.ass_track_id}:</td>
                  <td>{$ass_track_data.ass_track_id}</td>
              </tr>
              <tr class="{cycle values='odd,even'}">
                  <td>{$ass_track_fields.date_trasferred}:</td>
                  <td>{$ass_track_data.date_trasferred}</td>
              </tr>
              <tr class="{cycle values='odd,even'}">
                  <td>{$ass_track_fields.date_returned}:</td>
                  <td>{$ass_track_data.date_returned}</td>
              </tr>
              <tr class="{cycle values='odd,even'}">
                  <td>{$ass_track_fields.penality_amount}:</td>
                  <td>{$ass_track_data.penality_amount}</td>
              </tr>
              <tr class="{cycle values='odd,even'}">
                  <td>{$ass_track_fields.status}:</td>
                  <td>{$ass_track_data.status}</td>
              </tr>
              <tr class="{cycle values='odd,even'}">
                  <td>{$ass_track_fields.payment_status}:</td>
                  <td>{$ass_track_data.payment_status}</td>
              </tr>
              <tr class="{cycle values='odd,even'}">
                  <td>{$ass_track_fields.payment_date}:</td>
                  <td>{$ass_track_data.payment_date}</td>
              </tr>
              <tr class="{cycle values='odd,even'}">
                  <td>{$ass_track_fields.Asset_ass_id}:</td>
                  <td>{$ass_track_data.Asset_ass_id}</td>
              </tr>
          </table>
      </div>
    </div><!-- .inner -->
</div><!-- .content -->