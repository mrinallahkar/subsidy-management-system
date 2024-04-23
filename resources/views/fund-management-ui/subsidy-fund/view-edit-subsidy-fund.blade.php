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

@foreach($subsidyFundUpdate as $subsidyFundUpdate)
<input type="hidden" id="id_hidden" name="id_hidden" value="{{$subsidyFundUpdate->Pkid}}" />
@if($MODE=='VIW')
<table class="table table-hover" style="text-align:left;">
    <tbody>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Sanction Letter </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$subsidyFundUpdate->Sanction_Letter}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Sanction Date </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{date('d-M-Y', strtotime($subsidyFundUpdate->Sanction_Date))}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Scheme </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$subsidyFundUpdate->Scheme_Name}}</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Sanction Amount </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{number_format($subsidyFundUpdate->Sanction_Amount,2)}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">NEDFi Bank </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$subsidyFundUpdate->Bank_Name}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Description</label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$subsidyFundUpdate->Description ?? '- - - -'}}</label>
                </div>
            </td>
    </tbody>
</table>
@else
<form method="POST" id="editSubsidyForm">
    <table class="table table-hover" style="text-align:left;">
        <tbody>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label">Sanction Letter No. <span class="text-danger">*</span></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="Sanction_Letter" name="Sanction_Letter" value="{{$subsidyFundUpdate->Sanction_Letter}}" />
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label">Sanction Date <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="Sanction_Date" name="Sanction_Date" value="{{ date('Y-m-d', strtotime($subsidyFundUpdate->Sanction_Date))}}" />
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label">Scheme <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select style="width:170px" name="Scheme_Id" id="Scheme_Id" class="btn btn-secondary dropdown-toggle">
                            <option value="">--Select--</option>
                            @foreach($subsidyMaster as $subsidyMaster)
                            <option value="{{$subsidyMaster->Pkid}}" {{$subsidyMaster->Pkid == $subsidyFundUpdate->Scheme_Id ? 'selected' : ''}}>{{$subsidyMaster->Scheme_Name}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label">Sanction Amount <span class="text-danger">*</span></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="Sanction_Amount" name="Sanction_Amount" value="{{$subsidyFundUpdate->Sanction_Amount}}" onkeypress="return isNumber(event)" onkeyup="onlyNumber('fund_amount')" />
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label">NEDFi Bank <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select style="width:170px" name="Bank_Account_Id" id="Bank_Account_Id" class="btn btn-secondary dropdown-toggle" onchange="getTotalAmountForbank(this.value,'#total_amount','{{url('fill-amount-onChange')}}');">
                            <option value="">--Select--</option>
                            @foreach($bankMaster as $bankMaster)
                            <option value="{{$bankMaster->Pkid}}" {{$bankMaster->Pkid == $subsidyFundUpdate->Bank_Account_Id  ? 'selected' : ''}}>{{$bankMaster->Bank_Name}}/{{$bankMaster->Account_No}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label">Balance Amount </label>
                    <br>
                    <label style="font-weight:bold; color:darkgreen" for="" class="col-sm-2 form-control-label" id="total_amount">{{$subsidyFundUpdate->Fund_Balance}}</label>
                </td>
            </tr>
            <tr class="header">
                <td colspan="3" align="center">
                    <button type="button" id="createBtn" class="btn btn-primary btn-fw" onclick="SaveSubsidyFunds('{{$subsidyFundUpdate->Pkid}}','{{ url('save-subsidy-fund') }}', this,'searchResult');">
                        <i class="mdi mdi-content-save"></i>Update</button>
                    <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$subsidyFundUpdate->Pkid}}','{{ url('fund-master-approval') }}', this,'searchResult');">
                        <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                    <button type="reset" class="btn btn-light btn-fw">
                        <i class="mdi mdi-refresh"></i>Reset</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endif
@endforeach