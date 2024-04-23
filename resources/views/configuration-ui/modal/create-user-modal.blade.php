<div style="width: 80%; text-align:left" class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Create user</h6>
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
                                <form method="POST" id="userForm">
                                    <input type="hidden" id="id_hidden" name="id" />
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">User Name <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="user_name" id="user_name" value="" class="form-control" required/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Password <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password" id="password" value="" placeholder="pass@12A" class="form-control" required  />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Confirm Password <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="confirm_password" id="confirm_password" value="" class="form-control" required/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Phone No. <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="phone_no" id="phone_no" value="" class="form-control" required/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Email <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="email" id="email" value="" class="form-control" required/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">User Type <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select style="width:165px; text-align:left" name="type" id="type" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            <option value="1">Superuser</option>
                                                            <option value="2">Guest</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="center" class="header">
                                                    <button type="submit" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveUser('{{ url('save-user') }}', 'userForm','userSearchResult');">
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