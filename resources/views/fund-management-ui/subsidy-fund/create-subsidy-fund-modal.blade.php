<script>
    $(function() {
    $(".dropdown-toggle").hover(function() {
        this.title = $(this).find(":selected").text();
    }).change()
    })
    $(function() {
    $(".chosen-container").hover(function() {
        this.title = $(this).find("a").find('span').text();
    }).change()
    })
</script>

<!-- Modal Header -->
<div class="modal-header">
    <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Add Subsidy Fund</h6>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
    <div class="inner_result" id="inner_result"></div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="returnModel">
                            <form method="POST" id="subsidyForm">
                                <input type="hidden" id="id_hidden" name="id" />
                                <table class="table table-hover text-left" style="border: 1px solid #ababab;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Sanction Letter No. <span class="text-danger">*</span></label>
                                                <div class="col-sm-11">
                                                    <input type="text" class="form-control" id="Sanction_Letter" name="Sanction_Letter" />
                                                </div>
                                            </td>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Sanction Date <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="Sanction_Date" name="Sanction_Date" />
                                                </div>
                                            </td>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Scheme <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <select style="width:170px; text-align:left;" name="Scheme_Id" id="Scheme_Id" class="btn btn-secondary dropdown-toggle">
                                                        <option value="">--Select--</option>
                                                        @foreach($subsidyMaster as $subsidyMaster)
                                                        <option value="{{$subsidyMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$subsidyMaster->Scheme_Name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Sanction Amount <span class="text-danger">*</span></label>
                                                <div class="col-sm-11">
                                                    <input type="text" class="form-control" id="Sanction_Amount" name="Sanction_Amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('fund_amount')" />
                                                </div>
                                            </td>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">NEDFi Bank <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <select style="width:170px; text-align:left;" name="Bank_Account_Id" id="Bank_Account_Id" class="btn btn-secondary dropdown-toggle" onchange="getTotalAmountForbank(this.value,'#total_amount','{{url('fill-amount-onChange')}}');">
                                                        <option value="">--Select--</option>
                                                        @foreach($bankMaster as $bankMaster)
                                                        <option value="{{$bankMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$bankMaster->Bank_Name}}/{{$bankMaster->Account_No}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Balance Amount </label>
                                                <br>
                                                <label style="font-weight:bold; color:darkgreen" for="" class="col-sm-2 form-control-label" id="total_amount">0.00</label>
                                            </td>
                                        </tr>
                                        <tr class="header">
                                            <td colspan="3" align="center">
                                                <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveSubsidyFunds('0','{{ url('save-subsidy-fund') }}', this,'searchResult');">
                                                    <i class="mdi mdi-content-save"></i>Save</button>
                                                <button type="button" class="btn btn-success btn-fw" disabled id="approvalBtn">
                                                    <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                                                <button type="reset" class="btn btn-light btn-fw">
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
</div>

<!-- Modal footer -->
<div class="modal-footer">
    <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
</div>