<form id="paymentPageForm" name="paymentPageForm" method="POST">
    @if(!empty($disbursementDetailListUpdate))
    @foreach ($disbursementDetailListUpdate as $disbursementDetailListUpdate)
    <div class="table-responsive">
        <input type="hidden" id="id_hidden" name="id_hidden" value="{{$disbursementDetailListUpdate->Pkid}}" />
        <!-- <table style="width:100%">
            <tr>
                <td colspan="2" class="card-title" style="text-align: right;">
                    <input type="hidden" id="hid_total_amount" value="">
                    <input type="hidden" id="id_hidden" name="id_hidden" value="{{$disbursementDetailListUpdate->Pkid}}" />
                    Balance Amount: <label style="font-weight:bold; color:darkgreen" id="total_amount">0.00</label>
                </td>
            </tr>
        </table> -->
        <table class="table table-hover text-left" style="border: 1px solid #ababab;">
            <tbody>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Payment Mode <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <select style="width:165px;text-align:left" name="payment_mode" id="payment_mode" class="btn btn-secondary dropdown-toggle">
                                <option value="">--Select--</option>
                                <option value="1" {{1 == $disbursementDetailListUpdate->Payment_Mode  ? 'selected' : ''}}>Cheque</option>
                                <option value="2" {{2 == $disbursementDetailListUpdate->Payment_Mode  ? 'selected' : ''}}>RTGS</option>
                                <option value="3" {{3 == $disbursementDetailListUpdate->Payment_Mode  ? 'selected' : ''}}>Demand Draft</option>
                                <option value="4" {{4 == $disbursementDetailListUpdate->Payment_Mode  ? 'selected' : ''}}>NEFT</option>
                                <option value="5" {{5 == $disbursementDetailListUpdate->Payment_Mode  ? 'selected' : ''}}>PFMS/E-Payment</option>
                            </select>
                        </div>
                    </td>                    
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Bank Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="bank_name" id="bank_name" class="form-control" value="{{$disbursementDetailListUpdate->Bank_Name}}" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Insutrument Date <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="date" autofocus name="instrument_date" id="instrument_date" value="{{date('Y-m-d',strtotime($disbursementDetailListUpdate->Instrument_Date))}}" class="form-control" />
                        </div>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Account No {{-- <span class="text-danger">*</span> --}}</label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="account_no" id="account_no" class="form-control" value="{{$disbursementDetailListUpdate->Account_No}}" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">IFSC Code {{-- <span class="text-danger">*</span> --}}</label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="ifsc_code" id="ifsc_code" class="form-control" value="{{$disbursementDetailListUpdate->IFSC_Code}}" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Insutrument No {{-- <span class="text-danger">*</span> --}}</label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="insurance_no" id="insurance_no" class="form-control" value="{{$disbursementDetailListUpdate->Instrument_No}}" />
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Amount <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" id="paid_amount" readonly name="paid_amount" class="form-control" value="{{$disbursementDetailListUpdate->Disbursement_Amount}}" onkeypress="return isNumber(event)" onkeyup="onlyNumber('paid_amount')">
                        </div>
                    </td>
                    <td colspan="2">
                        <label for="" class="col-sm-2 form-control-label">Narration <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <textarea style="border: 1px solid #ccc;font-size: 0.75rem;color:#495057; padding-top: 10px;  padding-left: 20px;" rows="3" cols="50" name="narration" id="narration">{{$disbursementDetailListUpdate->Narration}}</textarea>
                        </div>
                    </td>
                </tr>
                <tr class="header">
                    <td colspan="3" align="center">
                        <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveDisbursement('{{ url('save-disbursement') }}', this,'searchResult','disbursementPaymentList');">
                            <i class="mdi mdi-content-save"></i>Update</button>
                        <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$disbursementDetailListUpdate->Pkid}}','{{ url('disbursement-approval') }}', this,'searchResult');">
                            <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                        <button type="reset" class="btn btn-light btn-fw">
                            <i class="mdi mdi-refresh"></i>Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
    @else
    <div class="table-responsive">
        <input type="hidden" id="id_hidden" name="id_hidden" value="" />
        <!-- <table style="width:100%">
            <tr>
                <td colspan="2" class="card-title" style="text-align: right;">
                    <input type="hidden" id="hid_total_amount">
                    <input type="hidden" id="id_hidden" name="id_hidden" value="" />
                    Balance Amount: <label style="font-weight:bold; color:darkgreen" id="total_amount">0.00</label>
                </td>
            </tr>
        </table> -->
        <table class="table table-hover text-left" style="border: 1px solid #ababab;">
            <tbody>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Payment Mode <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <select style="width:165px ; text-align:left" name="payment_mode" id="payment_mode" class="btn btn-secondary dropdown-toggle">
                                <option value="">--Select--</option>
                                <option value="1">Cheque</option>
                                <option value="2">RTGS</option>
                                <option value="3">Demand Draft</option>
                                <option value="4">NEFT</option>
                                <option value="5">PFMS/E-Payment</option>
                            </select>
                        </div>
                    </td>                    
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Bank Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="bank_name" id="bank_name" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Insutrument Date <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="date" autofocus name="instrument_date" id="instrument_date" class="form-control" />
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Account No {{-- <span class="text-danger">*</span> --}}</label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="account_no" id="account_no" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">IFSC Code {{-- <span class="text-danger">*</span> --}}</label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="ifsc_code" id="ifsc_code" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Insutrument No {{-- <span class="text-danger">*</span> --}}</label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="insurance_no" id="insurance_no" class="form-control" />
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Amount <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            @foreach ($smsClaimMaster as $smsClaimMaster)
                            <input type="text" id="paid_amount" readonly name="paid_amount" class="form-control" value="{{$smsClaimMaster->Allocated_Amount}}" onkeypress="return isNumber(event)" onkeyup="onlyNumber('paid_amount')">
                            @endforeach
                        </div>
                    </td>
                    <td colspan="2">
                        <label for="" class="col-sm-2 form-control-label">Narration <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <textarea style="border: 1px solid #ccc;font-size: 0.75rem;color:#495057; padding-top: 10px;  padding-left: 20px;" rows="3" cols="50" name="narration" id="narration"></textarea>
                        </div>
                    </td>
                </tr>
                <tr class="header">
                    <td colspan="3" align="center">
                        <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveDisbursement('{{ url('save-disbursement') }}', this,'searchResult');">
                            <i class="mdi mdi-content-save"></i>Save</button>
                        <button type="reset" class="btn btn-light btn-fw">
                            <i class="mdi mdi-refresh"></i>Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</form>