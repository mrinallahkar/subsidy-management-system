<script type="text/css">
    textarea {
        resize: none;
    }
</script>
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
        <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Add Beneficiary</h6>
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
                            <div id="afterSave">
                                <div id="returnModel">
                                    <form method="POST" id="benificiaryForm">
                                        <input type="hidden" id="id_hidden" name="id" />
                                        <table class="table table-hover text-left" style="border: 1px solid #ababab;">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <label for="" class="col-sm-2 form-control-label">Beneficiary Name <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10" aria-colspan="2">
                                                            <input type="text" autofocus name="Benificiary_Name" id="Benificiary_Name" class="form-control" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">State <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <select style="width:165px" name="state_id" id="state_id" class="btn btn-secondary dropdown-toggle chosen" onchange="getDistrictPerState(this.value,'#district','{{url('fill-district-onChange')}}');">
                                                                <option value="">--Select--</option>
                                                                @foreach($stateMaster as $stateMaster)
                                                                <option value="{{$stateMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$stateMaster->State_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">District <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <select style="width:165px; text-align:left" name="district" id="district" class="btn btn-secondary dropdown-toggle">
                                                                <option value="">--Select--</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <label for="" class="col-sm-2 form-control-label">Beneficiary Address <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10" aria-colspan="2">
                                                            <textarea style="border: 1px solid #ccc;font-size: 0.75rem;color:#495057; padding-top: 10px;  padding-left: 20px;" rows="3" cols="63" name="beneficiary_address" id="beneficiary_address"></textarea>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <label for="" class="col-sm-2 form-control-label">Manufacture Address <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10" aria-colspan="2">
                                                            <textarea style="border: 1px solid #ccc;font-size: 0.75rem; color:#495057; padding-top: 10px;  padding-left: 20px;" rows="3" cols="63" type="text" name="manufacture_address" id="manufacture_address"></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">PAN number {{-- <span class="text-danger">*</span>  --}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" style="text-transform: uppercase;" name="Pan_No" id="Pan_No" class="form-control" onkeyup="PanValidation('#Pan_No');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">GST Number </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="GST" id="GST" style="text-transform: uppercase;" class="form-control" onkeyup="GSTValidation('#GST');" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Subsidy Registration {{-- <span class="text-danger">*</span> --}} </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="sub_registration" id="sub_registration" class="form-control" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Subsidy Registration Date {{-- <span class="text-danger">*</span>  --}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" name="sub_registration_date" id="sub_registration_date" class="form-control" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Industry Registration {{-- <span class="text-danger">*</span>  --}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="ind_registration" id="ind_registration" class="form-control" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Industry Registration Date {{-- <span class="text-danger">*</span>  --}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" name="ind_registration_date" id="ind_registration_date" class="form-control" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Raw Materials</label>
                                                        <div class="col-sm-10">
                                                            <select style="width:165px; text-align:left;" id="material_id" name="material_id" class="btn btn-secondary dropdown-toggle chosen">
                                                                <option value="">--Select--</option>
                                                                @foreach($rawMaterial as $rawMaterial)
                                                                <option value="{{$rawMaterial->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$rawMaterial->Material_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Finish Goods</label>
                                                        <div class="col-sm-10">
                                                            <select style="width:165px" id="goods_id" name="goods_id" class="btn btn-secondary dropdown-toggle chosen">
                                                                <option value="">--Select--</option>
                                                                @foreach($finishGoods as $finishGoods)
                                                                <option value="{{$finishGoods->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$finishGoods->Goods_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Date of Commercial Production <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="date" name="production_date" id="production_date" class="form-control" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Production Capacity</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="prod_capacity" id="prod_capacity" class="form-control" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Type of the Unit <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <select style="width:170px" name="unit_id" id="unit_id" class="btn btn-secondary dropdown-toggle chosen">
                                                                <option value="">--Select--</option>
                                                                <option value="0">Manufacturing Sector</option>
                                                                <option value="1">Service Sector</option>
                                                            </select>
                                                        </div>
                                                        <!-- <label for="" class="col-sm-2 form-control-label">Proposal for <span class="text-danger">*</span></label>
                                                 <div class="col-sm-10">
                                                     <select style="width:170px" name="purposal_id" id="purposal_id" class="btn btn-secondary dropdown-toggle">
                                                         <option value="">--Select--</option>
                                                         <option value="0">NEIP-1997</option>
                                                         <option value="1">NEIIPP-2017</option>
                                                     </select>
                                                 </div> -->
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Total Employment Generation </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="emp_generation" id="emp_generation" class="form-control" onkeypress="return isNumber(event)" onkeyup="onlyNumber('emp_generation')" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Distance (in Kms) </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="distance" id="distance" class="form-control" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Financing Bank/Institutions {{-- <span class="text-danger">*</span>--}} </label>
                                                        <div class="col-sm-10">
                                                            <!-- <input type="text" name="bank" id="bank" class="form-control" /> -->
                                                            <select style="width:170px" name="Bank_Id" id="Bank_Id" class="btn btn-secondary dropdown-toggle chosen">
                                                                <option value="">--Select--</option>
                                                                @foreach($bankMaster as $bankMaster)
                                                                <option value="{{$bankMaster->Pkid}}">{{$bankMaster->Bank_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Sector Name <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <select style="width:165px" id="sector_id" name="sector_id" class="btn btn-secondary dropdown-toggle chosen">
                                                                <option value="">--Select--</option>
                                                                @foreach($sectorMaster as $sectorMaster)
                                                                <option value="{{$sectorMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$sectorMaster->Sector_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Link with Govt Policies <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <select style="width:170px" name="gov_policy" id="gov_policy" class="btn btn-secondary dropdown-toggle">
                                                                <option value="">--Select--</option>
                                                                @foreach($govPolicy as $govPolicy)
                                                                <option value="{{$govPolicy->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$govPolicy->Policy_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="" class="col-sm-2 form-control-label">Unit Status </label>
                                                        <div class="col-sm-10">
                                                            <select style="width:165px" name="unit_status_id" id="unit_status_id" class="btn btn-secondary dropdown-toggle">
                                                                <option value="">--Select--</option>
                                                                <option value="0">New</option>
                                                                <option value="1">Expansion</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td colspan="3">
                                                    </td>
                                                </tr>
                                                <tr class="header">
                                                    <td colspan="4" align="center">
                                                        <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveBenificiary('NA','{{ url('save-benificiary') }}', this,'searchResult');">
                                                            <i class="mdi mdi-content-save"></i>Save</button>
                                                        <button type="button" class="btn btn-success btn-fw" disabled>
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
    </div>
    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
    </div>

</div>

<script>
    $('.scheme_id').select2({
        dropdownParent: $('#addBenificiary'),
        width: '100%',
        position: fixed
    });
    $(document).ready(function() {
        $("#addBenificiary").find('input, textarea').first().focus()
    });
</script>