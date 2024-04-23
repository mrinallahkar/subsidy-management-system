<div style="width: 80%; text-align:left" class="modal-dialog modal-lg">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Add Fund Master</h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="result"></div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" id="fundForm">
                                    <input type="hidden" id="id_hidden" name="id" />
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td><label for="name1">Fund Name <span class="text-danger">*</span></label></td>
                                                <td><label for="name2">Sanction Letter <span class="text-danger">*</span></label></td>
                                                <td><label for="name1">Sanction Date <span class="text-danger">*</span></label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="Fund_Name" id="Fund_Name" class="form-control">
                                                    @if ($errors->has('Fund_Name'))
                                                    <span class="text-danger">{{ $errors->first('Fund_Name') }}</span>
                                                    @endif
                                                </td>
                                                <td><input name="Sanction_Letter" id="Sanction_Letter" class="form-control"></td>
                                                <td><input type="date" class="form-control" name="Sanction_Date" id="Sanction_Date" /></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name2">Sanction Amount <span class="text-danger"><span class="text-danger">*</span></label></td>
                                                <td><label for="name2">Bank Account <span class="text-danger"><span class="text-danger">*</span></label></td>
                                                <td><label for="name2">Description <span class="text-danger"></span></label></td>
                                            </tr>
                                            <tr>
                                                <td><input name="Sanction_Amount" id="Sanction_Amount" onkeypress="return isNumber(event)"   onkeyup="onlyNumber('Sanction_Amount')" class="form-control"></td>
                                                <td><select style="width:150px; text-align:left" name="Bank_Account_Id" id="Bank_Account_Id" class="btn btn-secondary dropdown-toggle">
                                                        <option value="">--Select--</option>
                                                        @foreach($bankMaster as $bankMaster)
                                                        <option value="{{$bankMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$bankMaster->Bank_Name}}/{{$bankMaster->Account_No}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><textarea name="Description" id="Description" class="form-control"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="center">
                                                    <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveFunds('{{ url('add_fund_master') }}', 'fundForm','fundContain');">
                                                        <i class="mdi mdi-content-save"></i>Save</button>
                                                    <button type="button" class="btn btn-success btn-fw" id="bntSubmitApproval">
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
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
        </div>

    </div>
</div>