<div style="width: 80%; text-align:left" class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Create role</h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

        <div class="modal-body">
            <div class="result"></div>
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" id="roleForm">
                                    <input type="hidden" id="id_hidden" name="id" />
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Module Name <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select style="width:165px; text-align:left" id="module_id" name="module_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            @foreach($moduleMaster as $moduleMaster)
                                                            <option value="{{$moduleMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$moduleMaster->Module_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Role Name <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="role_name" id="role_name" value="" class="form-control" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Controller Path <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="controller" id="controller" value="" class="form-control" />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="center" class="header">
                                                    <button type="submit" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveRole('{{ url('save-role') }}', 'roleForm','roleSearchResult');">
                                                        <i class="mdi mdi-content-save"></i>Save</button>
                                                    <button type="submit" disabled class="btn btn-success btn-fw" id="bntSubmitApproval">
                                                        <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                                                    <!-- <button type="submit" class="btn btn-dark btn-fw" id="btnEdit">
                                                        <i class="mdi mdi-grease-pencil"></i>Edit</button> -->
                                                    <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                                                        <i class="mdi mdi-refresh"></i>Reset</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>