<div class="panel panel-default">
    <div class="panel-body">
        <a href="tbl_users" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-success" href="tbl_users/create/"> <i
                    class="fa fa-plus" aria-hidden="true"></i> New record</a>
        {if $action_mode != 'create'}
            <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
               href="tbl_users/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
            <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
               href="tbl_users/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
        {/if}
        {if $action_mode == 'create'}
            <h3 class="page-title">Add new record</h3>
        {else}
            <h3 class="page-title">Edit record: #{$record_id}</h3>
        {/if}
        {if isset($errors)}
            <div class="flash">
                <div class="alert alert-danger">
                    <p>{$errors}</p>
                </div>
            </div>
        {/if}
        {if isset($direction)}
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        {/if}
        <form class="form" method='post' action='tbl_users/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
              enctype="multipart/form-data">


            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">{$tbl_users_fields.email}<span
                                class="error">*</span></label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.email}" class="form-control" type="text"
                               maxlength="50"
                               value="{if isset($tbl_users_data)}{$tbl_users_data.email}{/if}" name="email" id="email"/>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">{$tbl_users_fields.password}<span
                                class="error">*</span></label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.password}" class="form-control" type="text"
                               maxlength="50" value="{if isset($tbl_users_data)}{$tbl_users_data.password}{/if}"
                               name="password" id="password"/>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">{$tbl_users_fields.name}</label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.name}" class="form-control" type="text"
                               maxlength="50"
                               value="{if isset($tbl_users_data)}{$tbl_users_data.name}{/if}" name="name" id="name"/>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="mobile">{$tbl_users_fields.mobile}</label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.mobile}" class="form-control" type="text"
                               maxlength="50" value="{if isset($tbl_users_data)}{$tbl_users_data.mobile}{/if}"
                               name="mobile"
                               id="mobile"/>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="roleId">{$tbl_users_fields.roleId}<span
                                class="error">*</span></label>
                    <div class="col-md-6">
                        <select class="form-control field select addr" name="roleId" id="roleId" required="required">
                            <option value="">Select One</option>
                            {foreach $related_tbl_roles as $rel}
                                <option value="{$rel.tbl_roles_id}"{if isset($tbl_users_data)}{if $tbl_users_data.roleId == $rel.tbl_roles_id} selected="selected"{/if}{/if}>{$rel.tbl_roles_name}</option>
                            {/foreach}
                        </select>
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="isDeleted">{$tbl_users_fields.isDeleted}<span
                                class="error">*</span></label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.isDeleted}" class="form-control" type="text"
                               maxlength="50" value="{if isset($tbl_users_data)}{$tbl_users_data.isDeleted}{/if}"
                               name="isDeleted" id="isDeleted"/>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="createdBy">{$tbl_users_fields.createdBy}</label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.createdBy}" class="form-control" type="text"
                               maxlength="50" value="{if isset($tbl_users_data)}{$tbl_users_data.createdBy}{/if}"
                               name="createdBy" id="createdBy"/>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="createdDtm">{$tbl_users_fields.createdDtm}<span
                                class="error">*</span></label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.createdDtm}" class="form-control" type="text"
                               maxlength="50" value="{if isset($tbl_users_data)}{$tbl_users_data.createdDtm}{/if}"
                               name="createdDtm" id="createdDtm"/>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="updatedBy">{$tbl_users_fields.updatedBy}</label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.updatedBy}" class="form-control" type="text"
                               maxlength="50" value="{if isset($tbl_users_data)}{$tbl_users_data.updatedBy}{/if}"
                               name="updatedBy" id="updatedBy"/>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="updatedDtm">{$tbl_users_fields.updatedDtm}</label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$tbl_users_fields.updatedDtm}" class="form-control" type="text"
                               maxlength="50" value="{if isset($tbl_users_data)}{$tbl_users_data.updatedDtm}{/if}"
                               name="updatedDtm" id="updatedDtm"/>
                    </div>

                </div>
            </div>

            <br>
            <div class="form-group button-actions box-footer">
                <div class="col-md-offset-4 col-md-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <span class="text_button_padding">or</span>
                    <a class="btn btn-default" href="javascript:window.history.back();">Cancel</a>
                </div>
        </form>
    </div><!-- .content -->
</div><!-- .block -->
