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
<div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header">
        <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Add Claim Subsidy</h6>
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
                                <form method="POST" id="subsidyClaimForm">
                                    <input type="hidden" id="id_hidden" name="id" />
                                    <input type="hidden" id="id_hidden_short_name" name="id_hidden_short_name" />
                                    <table class="table table-hover text-left" style="border: 1px solid #ababab;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Scheme <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select class="btn btn-secondary dropdown-toggle chosen" id="scheme_id" name="scheme_id" style="width: 190px;" onchange="getShortName(this.value,'{{url('get-short-scheme-name')}}');">
                                                            <option value="">--Select--</option>
                                                            @foreach($scheme as $scheme)
                                                            <option value="{{$scheme->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$scheme->Scheme_Name}}</option>
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
                                                        <select name="Benificiary_Id" id="Benificiary_Id" class="btn btn-secondary dropdown-toggle chosen" style="width: 190px;">
                                                            <option value="">--Select--</option>
                                                            @foreach($benificiary as $benificiary)
                                                            <option value="{{$benificiary->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$benificiary->Benificiary_Name}}</option>
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
                                                        <select name="audit_status" id="audit_status" class="btn btn-secondary dropdown-toggle chosen" style="width: 105%">
                                                            <option value="">--Select--</option>
                                                            <option value="0">To Be Audited</option>
                                                            <option value="1">Under Audit Observation</option>
                                                            <option value="2">Audited</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Remarks {{--<span class="text-danger">*</span>--}}</label>
                                                    <div class="col-sm-10">
                                                        <select name="remarks_id" id="remarks_id" class="btn btn-secondary dropdown-toggle chosen" style="width: 190px;">
                                                            <option value="">--Select--</option>
                                                            @foreach ($remarks as $remarks)
                                                            <option value="{{$remarks->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$remarks->Reason_Details}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="SLC">
                                                <td>
                                                    <table style="width:100%; margin-left:-15px; border-top:none;" id="dynamicAddRemove">
                                                        <tr style="border:none;">
                                                            <td style="border:none;">
                                                                <label for="" class="col-sm-2 form-control-label">SLC Date <span class="text-danger">*</span></label>
                                                                <div class="col-sm-11">
                                                                    <input type="date" class="slc_input form-control" id="slc_date" name="slc_date" />
                                                                </div>
                                                            </td>
                                                            <td style="border:none; text-align:left;">
                                                                <label for="" class="col-sm-2 form-control-label"><br /></label>
                                                                <div class="col-sm-2">
                                                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="mdi mdi mdi-plus"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Claim Receive Date <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="claim_receive_date" name="claim_receive_date" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Claim From Date <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10" id="td_claim_from">
                                                        <input type="date" class="form-control" id="claim_from" name="claim_from" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Claim To Date <span class="text-danger">*</span></label>
                                                    <div class="col-sm-10" id="td_claim_to">
                                                        <input type="date" class="form-control" id="claim_to" name="claim_to" />
                                                    </div>
                                                </td>
                                            </tr>
                                            <div id="CCIS_CCIIAC">
                                                <tr id="CCIS_CCIIAC_FIL" class="d-none">
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">File volume No <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="c_file_volume" name="c_file_volume" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Investment on Plant &amp; Machinery {{--<span class="text-danger">*</span>--}} </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="c_investment_on_plant" name="c_investment_on_plant" onkeypress="return isNumber(event)" onkeyup="onlyNumber('c_investment_on_plant'); calculateSum('c_investment_on_plant','c_investment_on_building','c_approve_cs_on_plant','c_subsidy_claim_amount');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Investment on Building {{--<span class="text-danger">*</span>--}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="c_investment_on_building" name="c_investment_on_building" onkeypress="return isNumber(event)" onkeyup="onlyNumber('c_investment_on_building'); calculateSum('c_investment_on_plant','c_investment_on_building','c_approve_cs_on_plant','c_subsidy_claim_amount');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Approved CS on Plant &amp; Machinery <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="c_approve_cs_on_plant" name="c_approve_cs_on_plant" onkeypress="return isNumber(event)" onkeyup="onlyNumber('c_approve_cs_on_plant');autoField('c_approve_cs_on_plant','c_subsidy_claim_amount');calculateInvestment('c_approve_cs_on_plant','c_subsidy_claim_amount'); " />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="CCIS_CCIIAC_ENDORSE" class="d-none">
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Subsidy Claim Amount <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control" id="c_subsidy_claim_amount" name="c_subsidy_claim_amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('c_subsidy_claim_amount')" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Under (EC/CC) </label>
                                                        <div class="col-sm-10">
                                                            <select style="width:100%" name="c_under_eccc" id="c_under_eccc" class="btn btn-secondary dropdown-toggle">
                                                                <option value="">--Select--</option>
                                                                <option value="0">Yes</option>
                                                                <option value="1">No</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">EC/CC Date </label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="c_ec_cc_date" name="c_ec_cc_date" />
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
                                                            <input type="text" class="form-control" id="a_file_volume" name="a_file_volume" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Raw Materials Quantity {{--<span class="text-danger">*</span>--}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="a_raw_material" name="a_raw_material" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_raw_material')" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Finish Goods Quantity {{--<span class="text-danger">*</span>--}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="a_finish_goods" name="a_finish_goods" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_finish_goods')" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Approved TS on Raw Materials <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="a_raw_approve_ts" name="a_raw_approve_ts" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_raw_approve_ts'); calculateSum('a_raw_approve_ts','a_goods_approve_ts','a_subsidy_claim_amount','a_subsidy_claim_amount');" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="TSS_FSS_TI_GOODS" class="d-none">
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Approved TS on Finish Goods <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="a_goods_approve_ts" name="a_goods_approve_ts" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_goods_approve_ts'); calculateSum('a_raw_approve_ts','a_goods_approve_ts','a_subsidy_claim_amount','a_subsidy_claim_amount');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Subsidy Claim Amount <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control" id="a_subsidy_claim_amount" name="a_subsidy_claim_amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('a_subsidy_claim_amt')" />
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
                                                            <input type="text" class="form-control" id="e_sum_insured" name="e_sum_insured" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_sum_insured');calculateInsurance('e_sum_insured','e_insured_stock','e_value_covered','e_subsidy_claim_amount');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Insured Stock {{--<span class="text-danger">*</span>--}} </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="e_insured_stock" name="e_insured_stock" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_insured_stock');calculateInsurance('e_sum_insured','e_insured_stock','e_value_covered','e_subsidy_claim_amount');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label"> Value Covered Insurance <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control" id="e_value_covered" name="e_value_covered" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_value_covered')" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Premium Actually Paid <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="e_premium_actualy_paid" name="e_premium_actualy_paid" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_premium_actualy_paid')" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="INS_CCII_SUM_REFUND" class="d-none">
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Refund (if any) </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="e_refund" name="e_refund" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_refund')" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Premium Eligible for Reimbursement </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="e_premium_eligible" name="e_premium_eligible" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_premium_eligible');autoField('e_premium_eligible','e_subsidy_claim_amount');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Commencement Date </label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="e_commencement_date" name="e_commencement_date" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Insurance Policy No </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="e_insurance_policy" name="e_insurance_policy" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="INS_CCII_SUM_ENDORSE" class="d-none">
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">File volume No <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="e_file_volume" name="e_file_volume" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Endorsement Policy No </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="e_endorsement_policy" name="e_endorsement_policy" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Subsidy Claim Amount <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control" id="e_subsidy_claim_amount" name="e_subsidy_claim_amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('e_subsidy_claim_amount')" />
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
                                                            <input type="text" class="form-control" id="d_file_volume" name="d_file_volume" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Approved Interest Subsidy <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="d_approved_interest_subsidy" name="d_approved_interest_subsidy" onkeypress="return isNumber(event)" onkeyup="onlyNumber('d_approved_interest_subsidy');autoField('d_approved_interest_subsidy','d_subsidy_claim_amount');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Subsidy Claim Amount <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control" id="d_subsidy_claim_amount" name="d_subsidy_claim_amount" onkeypress="return isNumber(event)" onkeyup="onlyNumber('d_subsidy_claim_amount')" />
                                                        </div>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </div>
                                            <tr class="header">
                                                <td colspan="4" align="center">
                                                    <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveSubsidyClaim('0','{{ url('save-subsidy') }}', this,'searchResult');">
                                                        <i class="mdi mdi-content-save"></i>Save</button>
                                                    <button type="button" class="btn btn-success btn-fw" disabled ID="approvalBtn">
                                                        <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                                                    <!-- <button type="button" class="btn btn-dark btn-fw">
                                                    <i class="mdi mdi-grease-pencil"></i>Edit</button> -->
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
</div>

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


