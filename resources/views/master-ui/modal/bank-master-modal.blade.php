{!! Html::script('js/common_script.js') !!}
<div style="width: 80%; text-align:left" class="modal-dialog modal-lg">

    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Add Bank Master</h6>
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
                                <form method="POST" id="bankForm">
                                    <div id="returnModel">
                                        <input type="hidden" id="id_hidden" name="id" />
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><label for="name1">Bank Name <span class="text-danger">*</span></label></td>
                                                    <td><label for="name1">Account No. <span class="text-danger">*</span></label></td>
                                                    <td><label for="name1">Branch <span class="text-danger">*</span></label></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="Bank_Name" id="Bank_Name" class="form-control"></td>
                                                    <td><input type="text" name="Account_No" id="Account_No" class="form-control"></td>
                                                    <td><input type="text" name="Branch_Name" id="Branch_Name" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="name2">Subsidy Scheme <span class="text-danger">*</span></label></td>
                                                    <td colspan="2"><label for="name1">Description <span class="text-danger"></span></label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select style="width:150px; text-align:left" name="Scheme_Id_Fk" id="Scheme_Id_Fk" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            @foreach($subsidyMaster as $subsidyMaster)
                                                            <option value="{{$subsidyMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$subsidyMaster->Scheme_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td colspan="2"><textarea type="text" name="Description" id="Description" class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="center">
                                                        <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveBank('{{ url('add_bank_master') }}', this,'bankSearchResult');">
                                                            <i class="mdi mdi-content-save"></i>Save</button>
                                                        <button type="button" disabled class="btn btn-success btn-fw" id="bntSubmitApproval">
                                                            <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                                                        <!-- <button type="submit" class="btn btn-dark btn-fw" id="btnEdit">
                                                        <i class="mdi mdi-grease-pencil"></i>Edit</button> -->
                                                        <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                                                            <i class="mdi mdi-refresh"></i>Reset</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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