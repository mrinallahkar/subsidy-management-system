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
@foreach ($smsClaimMasterUpdate as $smsClaimMasterUpdate)
<form method="POST" id="editSubsidyClaimForm">
    <input type="hidden" id="id_hidden" name="id" value="{{$smsClaimMasterUpdate->Pkid}}" />
    <input type="hidden" id="id_hidden_short_name" name="id_hidden_short_name" value="{{$smsClaimMasterUpdate->Short_Name}}" />
    @if($MODE=='VIW')
    <!-- View Part -->
    <table class="table table-hover text-left" style="border: 1px solid #ababab;">
        <tbody>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim ID </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Claim_Id}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Scheme </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Scheme_Name}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Benificiary </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Benificiary_Name}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Audit Status </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">
                            @if($smsClaimMasterUpdate->Audit_Status==0)
                            To Be Audited
                            @elseif($smsClaimMasterUpdate->Audit_Status==1)
                            Under Audit Observation
                            @else
                            Audited
                            @endif
                        </label>
                    </div>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Remarks </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Reason_Details ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">SLC Date </label>
                    @foreach ($slcDateTxn as $slcDateTxn)
                    @if($loop->iteration==1)
                    <div class="col-sm-9">
                        <label for="" class="form-control-label font-weight-small">{{ $slcDateTxn->Slc_Date ? date('d-M-Y', strtotime($slcDateTxn->Slc_Date)) : '- - - -' }}</label>
                    </div>
                    @else
                    <div class="col-sm-9">
                        <label for="" class="form-control-label font-weight-small">{{ $slcDateTxn->Slc_Date ? date('d-M-Y', strtotime($slcDateTxn->Slc_Date)) : '- - - -' }}</label>
                    </div>
                    @endif
                    @endforeach
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim Receive Date </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Received_Date ? date('d-M-Y', strtotime($smsClaimMasterUpdate->Received_Date)) : '- - - -' }}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim From Date </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Claim_From_Date ? date('d-M-Y', strtotime($smsClaimMasterUpdate->Claim_From_Date)) : '- - - -' }}</label>
                    </div>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim To Date </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Claim_To_Date ? date('d-M-Y', strtotime($smsClaimMasterUpdate->Claim_To_Date)) : '- - - -' }}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">File volume No </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->File_Volume_No ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Raw Materials Quantity </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Raw_Materials_Quantity ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Finish Goods Quantity </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Finish_Goods_Quantity ?? '- - - -'}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">TS/F on Raw Materials </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Approved_Raw_Materials ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">TS/F on Finish Goods </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Approved_Finish_Goods ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Investment on Plant &amp; Machinery </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Investment_On_Plant_Machinery ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Approved CS on Plant &amp; Machinery </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Approved_On_Plant_Machinery ?? '- - - -'}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Approved Interest Subsidy </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Approved_Interest_Subsidy ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Sum Insured (Value) </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Sum_Insured ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Insured Stock </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Insured_Stock ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Value Covered Insurance </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Value_Covered_Insurance ?? '- - - -'}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Premium Actually Paid </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Premium_Actually_Paid ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Refund (if any) </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Refund ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Premium Eligible for Reimbursement </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Premium_Eligible_For_Reimbursement ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Commencement Date </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Premium_Commencement_Date ? date('d-M-Y', strtotime($smsClaimMasterUpdate->Premium_Commencement_Date)) : '- - - -' }}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Insurance Policy No </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Insurance_Policy_No ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Endorsement Policy No </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Endorsement_Policy_No ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Subsidy Claim Amount </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Claim_Amount ?? '- - - -'}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Under (EC/CC) </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Under_EC_CC ?? '- - - -'}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">EC/CC Date </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->EC_CC_Date ? date('d-M-Y', strtotime($smsClaimMasterUpdate->EC_CC_Date)) : '- - - -' }}</label>
                    </div>
                </td>
                <td colspan="3">
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Status</label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{ $smsClaimMasterUpdate->Status_Name ?? '- - - -'}}</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    @else
    <!-- Edit Part -->

    <div id="afterEdit">
        <table class="table table-hover text-left" style="border: 1px solid #ababab;">
            <tbody>
                <tr>
                    <td>
                        <input type="hidden" id="hidden_claim_id" name="hidden_claim_id" value="{{$smsClaimMasterUpdate->Pkid}}">
                        <label for="" class="col-sm-2 form-control-label">Scheme <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="btn btn-secondary dropdown-toggle chosen" id="scheme_id" name="scheme_id" data-placeholder="Choose an option please" onchange="getShortName(this.value,'{{url('get-short-scheme-name')}}');">
                                <option value="">--Select--</option>
                                @foreach($scheme as $scheme)
                                <option value="{{$scheme->Pkid}}" {{$scheme->Pkid == $smsClaimMasterUpdate->Scheme_Id  ? 'selected' : ''}}>{{$scheme->Scheme_Name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <div id="scheme_span">
                            </div>
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Benificiary <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select style="width: 170px;" name="Benificiary_Id" id="Benificiary_Id" class="btn btn-secondary dropdown-toggle chosen">
                                <option value="">--Select--</option>
                                @foreach($benificiary as $benificiary)
                                <option value="{{$benificiary->Pkid}}" {{$benificiary->Pkid == $smsClaimMasterUpdate->Benificiary_Id_Fk  ? 'selected' : ''}}>{{$benificiary->Benificiary_Name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <div id="benificiary_span">
                            </div>
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Audit Status <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select style="width:170px" name="audit_status" id="audit_status" class="btn btn-secondary dropdown-toggle">
                                <option value="">--Select--</option>
                                <option value="0" {{0 == $smsClaimMasterUpdate->Audit_Status  ? 'selected' : ''}}>To Be Audited</option>
                                <option value="1" {{1 == $smsClaimMasterUpdate->Audit_Status  ? 'selected' : ''}}>Under Audit Observation</option>
                                <option value="2" {{2 == $smsClaimMasterUpdate->Audit_Status  ? 'selected' : ''}}>Audited</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Remarks {{--<span class="text-danger">*</span>--}}</label>
                        <div class="col-sm-10">
                            <select style="width:170px" name="remarks_id" id="remarks_id" class="btn btn-secondary dropdown-toggle">
                                <option value="">--Select--</option>
                                @foreach ($remarks as $remarks)
                                <option value="{{$remarks->Pkid}}" {{$remarks->Pkid == $smsClaimMasterUpdate->Remarks  ? 'selected' : ''}}>{{$remarks->Reason_Details}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%; margin-left:-15px; border-top:none;" id="dynamicAddRemove">
                            @foreach ($slcDateTxn as $slcDateTxn)
                            @if($loop->iteration==1)
                            <tr style="border:none;">
                                <td style="border:none;">
                                    <label for="" class="col-sm-2 form-control-label">SLC Date <span class="text-danger">*</span></label>
                                    <div class="col-sm-11">
                                        <input type="date" class="slc_input form-control" id="slc_date" name="slc_date" value="{{ $slcDateTxn->Slc_Date ? date('Y-m-d', strtotime($slcDateTxn->Slc_Date)) : '' }}" />
                                    </div>
                                </td>
                                <td style="border:none; text-align:left;">
                                    <label for="" class="col-sm-2 form-control-label"><br /></label>
                                    <div class="col-sm-2">
                                        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="mdi mdi mdi-plus"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @else
                            <tr id="row{{$loop->iteration}}">
                                <td>
                                    <div class="col-sm-11"> <input type="date" class="slc_input form-control" id="slc_date{{$loop->iteration}}" name="slc_date" value="{{ $slcDateTxn->Slc_Date ? date('Y-m-d', strtotime($slcDateTxn->Slc_Date)) : '' }}" /> </div>
                                </td>
                                <td>
                                    <div class="col-sm-2"> <button type="button" id="{{$loop->iteration}}" class="btn btn-outline-danger remove-input-field"><i class="mdi mdi mdi-minus"></i></button></div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Claim Receive Date <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="claim_receive_date" name="claim_receive_date" value="{{ $smsClaimMasterUpdate->Received_Date ? date('Y-m-d', strtotime($smsClaimMasterUpdate->Received_Date)) : '' }}" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Claim From Date <span class="text-danger">*</span></label>
                        <div class="col-sm-10" id="td_claim_from">
                            <input type="date" class="form-control" id="claim_from" name="claim_from" value="{{ $smsClaimMasterUpdate->Claim_From_Date ? date('Y-m-d', strtotime($smsClaimMasterUpdate->Claim_From_Date)) : '' }}" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Claim To Date <span class="text-danger">*</span></label>
                        <div class="col-sm-10" id="td_claim_to">
                            <input type="date" class="form-control" id="claim_to" name="claim_to" value="{{ $smsClaimMasterUpdate->Claim_To_Date ? date('Y-m-d', strtotime($smsClaimMasterUpdate->Claim_To_Date)) : '' }}" />
                        </div>
                    </td>
                </tr>
                <div id="CCIS_CCIIAC">
                    <tr id="CCIS_CCIIAC_FIL" class="d-none">
                        <td>
                            <label for="" class="col-sm-2 form-control-label">File volume No <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="c_file_volume" name="c_file_volume" value="{{$smsClaimMasterUpdate->File_Volume_No}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Investment on Plant &amp; Machinery {{--<span class="text-danger">*</span>--}} </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="c_investment_on_plant" name="c_investment_on_plant" onkeypress="return isNumber(event)" onkeyup="onlyNumber('c_investment_on_plant'); calculateSum('c_investment_on_plant','c_investment_on_building','c_approve_cs_on_plant','c_subsidy_claim_amount');" value="{{$smsClaimMasterUpdate->Investment_On_Plant_Machinery}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Investment on Building {{--<span class="text-danger">*</span>--}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="c_investment_on_building" name="c_investment_on_building" onkeypress="return isNumber(event)" onkeyup="onlyNumber('c_investment_on_building'); calculateSum('c_investment_on_plant','c_investment_on_building','c_approve_cs_on_plant','c_subsidy_claim_amount');" value="{{$smsClaimMasterUpdate->Investment_On_Building}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Approved CS on Plant &amp; Machinery <span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="c_approve_cs_on_plant" name="c_approve_cs_on_plant" onkeypress="return isNumber(event)" onkeyup="onlyNumber('c_approve_cs_on_plant'); calculateInvestment('c_approve_cs_on_plant','c_subsidy_claim_amount');" value="{{$smsClaimMasterUpdate->Approved_On_Plant_Machinery}}" />
                            </div>
                        </td>
                    </tr>
                    <tr id="CCIS_CCIIAC_ENDORSE" class="d-none">
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Subsidy Claim Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="c_subsidy_claim_amount" name="c_subsidy_claim_amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('c_subsidy_claim_amount')" value="{{$smsClaimMasterUpdate->Subsidy_Claim_Amount}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Under (EC/CC) </label>
                            <div class="col-sm-10">
                                <select style="width:170px" name="under_eccc" id="under_eccc" class="btn btn-secondary dropdown-toggle">
                                    <option value="">--Select--</option>
                                    <option value="0" {{0 == $smsClaimMasterUpdate->Under_EC_CC  ? 'selected' : ''}}>Yes</option>
                                    <option value="1" {{1 == $smsClaimMasterUpdate->Under_EC_CC  ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">EC/CC Date </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="c_ec_cc_date" name="c_ec_cc_date" value="{{ $smsClaimMasterUpdate->EC_CC_Date ? date('Y-m-d', strtotime($smsClaimMasterUpdate->EC_CC_Date)) : '' }}" />
                            </div>
                        </td>
                        <td>
                        </td>
                    </tr>
                </div>
                <div id="TSS_FSS_TI">
                    <tr id="TSS_FSS_TI_FIL" class="d-none">
                        <td>
                            <label for="" class="col-sm-2 form-control-label">File volume No <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="a_file_volume" name="a_file_volume" value="{{$smsClaimMasterUpdate->File_Volume_No}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Raw Materials Quantity </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="a_raw_material" name="a_raw_material" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_raw_material')" value="{{$smsClaimMasterUpdate->Raw_Materials_Quantity}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Finish Goods Quantity </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="a_finish_goods" name="a_finish_goods" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_finish_goods')" value="{{$smsClaimMasterUpdate->Finish_Goods_Quantity}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Approved TS on Raw Materials <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="a_raw_approve_ts" name="a_raw_approve_ts" value="{{$smsClaimMasterUpdate->Approved_Raw_Materials}}" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_raw_approve_ts'); calculateSum('a_raw_approve_ts','a_goods_approve_ts','a_subsidy_claim_amount','a_subsidy_claim_amount');" />
                            </div>
                        </td>
                    </tr>
                    <tr id="TSS_FSS_TI_GOODS" class="d-none">
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Approved TS on Finish Goods <span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="a_goods_approve_ts" name="a_goods_approve_ts" value="{{$smsClaimMasterUpdate->Approved_Finish_Goods}}" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_goods_approve_ts'); calculateSum('a_raw_approve_ts','a_goods_approve_ts','a_subsidy_claim_amount','a_subsidy_claim_amount');" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Subsidy Claim Amount <span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="a_subsidy_claim_amount" name="a_subsidy_claim_amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_subsidy_claim_amount')" value="{{$smsClaimMasterUpdate->Subsidy_Claim_Amount}}" />
                            </div>
                        </td>
                        <td colspan="2">
                        </td>
                    </tr>
                </div>

                <div id="INS_CCII">
                    <tr id="INS_CCII_SUM" class="d-none">
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Sum Insured (Value) <span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_sum_insured" name="e_sum_insured" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_sum_insured');calculateInsurance('e_sum_insured','e_insured_stock','e_value_covered','e_subsidy_claim_amount');" value="{{$smsClaimMasterUpdate->Sum_Insured}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Insured Stock {{--<span class="text-danger">*</span>--}} </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_insured_stock" name="e_insured_stock" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_insured_stock');calculateInsurance('e_sum_insured','e_insured_stock','e_value_covered','e_subsidy_claim_amount');" value="{{$smsClaimMasterUpdate->Insured_Stock}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label"> Value Covered Insurance <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="e_value_covered" name="e_value_covered" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_value_covered')" value="{{$smsClaimMasterUpdate->Value_Covered_Insurance}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Premium Actually Paid <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_premium_actualy_paid" name="e_premium_actualy_paid" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_premium_actualy_paid')" value="{{$smsClaimMasterUpdate->Premium_Actually_Paid}}" />
                            </div>
                        </td>
                    </tr>
                    <tr id="INS_CCII_SUM_REFUND" class="d-none">
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Refund (if any) </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_refund" name="e_refund" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_refund')" value="{{$smsClaimMasterUpdate->Refund}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Premium Eligible for Reimbursement </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_premium_eligible" name="e_premium_eligible" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_premium_eligible');autoField('e_premium_eligible','e_subsidy_claim_amount');" value="{{$smsClaimMasterUpdate->Premium_Eligible_For_Reimbursement}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Commencement Date {{--<span class="text-danger">*</span>--}}</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="e_commencement_date" name="e_commencement_date" value="{{ $smsClaimMasterUpdate->Premium_Commencement_Date ? date('Y-m-d', strtotime($smsClaimMasterUpdate->Premium_Commencement_Date)) : '' }}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Insurance Policy No {{--<span class="text-danger">*</span>--}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_insurance_policy" name="e_insurance_policy" value="{{$smsClaimMasterUpdate->Insurance_Policy_No}}" />
                            </div>
                        </td>
                    </tr>
                    <tr id="INS_CCII_SUM_ENDORSE" class="d-none">
                        <td>
                            <label for="" class="col-sm-2 form-control-label">File volume No <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_file_volume" name="e_file_volume" value="{{$smsClaimMasterUpdate->File_Volume_No}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Endorsement Policy No </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_endorsement_policy" name="e_endorsement_policy" value="{{$smsClaimMasterUpdate->Endorsement_Policy_No}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Subsidy Claim Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="e_subsidy_claim_amount" name="e_subsidy_claim_amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_subsidy_claim_amount')" value="{{$smsClaimMasterUpdate->Subsidy_Claim_Amount}}" />
                            </div>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </div>
                <div id="CIS">
                    <tr id="CIS_FILE" class="d-none">
                        <td>
                            <label for="" class="col-sm-2 form-control-label">File volume No <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="d_file_volume" name="d_file_volume" value="{{$smsClaimMasterUpdate->File_Volume_No}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Approved Interest Subsidy <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="d_approved_interest_subsidy" name="d_approved_interest_subsidy" onkeypress="return isNumber(event)" onkeyup="onlyNumber('d_approved_interest_subsidy');autoField('d_approved_interest_subsidy','d_subsidy_claim_amount');" value="{{$smsClaimMasterUpdate->Approved_Interest_Subsidy}}" />
                            </div>
                        </td>
                        <td>
                            <label for="" class="col-sm-2 form-control-label">Subsidy Claim Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="d_subsidy_claim_amount" name="d_subsidy_claim_amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('d_subsidy_claim_amount')" value="{{$smsClaimMasterUpdate->Subsidy_Claim_Amount}}" />
                            </div>
                        </td>
                        <td>

                        </td>
                    </tr>
                </div>
                <tr class="header">
                    <td colspan="4" align="center">
                        <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveSubsidyClaim('{{$smsClaimMasterUpdate->Pkid}}','{{ url('save-subsidy') }}', this,'searchResult');">
                            <i class="mdi mdi-content-save"></i>Update</button>
                        <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$smsClaimMasterUpdate->Pkid}}','{{ url('claim-approval') }}', this,'searchResult');">
                            <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                        <button type="reset" class="btn btn-light btn-fw">
                            <i class="mdi mdi-refresh"></i>Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</form>
@endforeach

<script type="text/css">
    table,
    tr,
    td {
        border: none;
    }
</script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function() {
        ++i;
        $("#dynamicAddRemove").append('<tr id="row' + i + '"><td><div class="col-sm-11"> <input type = "date" class = "slc_input form-control" id = "slc_date' + i + '" name = "slc_date" /> </div> </td> <td> <div class="col-sm-2"> <button type="button" id="' + i + '"  class="btn btn-outline-danger remove-input-field"><i class="mdi mdi mdi-minus"></i></button></div> </td> </tr>');
    });
    $(document).on('click', '.remove-input-field', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
</script>