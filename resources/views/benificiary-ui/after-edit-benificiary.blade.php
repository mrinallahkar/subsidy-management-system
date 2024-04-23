@foreach($editBenificiaryList as $editBenificiaryList)
<table class="table table-hover text-left" style="border: 1px solid #ababab;">
    <tbody>
        <tr>
            <td colspan="2">
                <label for="" class="col-sm-2 form-control-label">Beneficiary Name <span class="text-danger">*</span></label>
                <div class="col-sm-10" aria-colspan="2">
                    <input type="text" autofocus name="Benificiary_Name" id="Benificiary_Name" value="{{$editBenificiaryList->Benificiary_Name}}" class="form-control" />
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">State <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <select style="width:165px" name="state_id" id="state_id" class="btn btn-secondary dropdown-toggle" onchange="getDistrictPerState(this.value,'#district','{{url('fill-district-onChange')}}');">
                        <option value="">--Select--</option>
                        @foreach($stateMaster as $stateMaster)
                        <option value="{{$stateMaster->Pkid}}" {{$stateMaster->Pkid == $editBenificiaryList->State_Code  ? 'selected' : ''}}>{{$stateMaster->State_Name}}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">District <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <select style="width:165px" name="district" id="district" class="btn btn-secondary dropdown-toggle">
                        <option value="">--Select--</option>
                        @foreach($districtMaster as $districtMaster)
                        <option value="{{$districtMaster->Pkid}}" {{$districtMaster->Pkid == $editBenificiaryList->District_Id  ? 'selected' : ''}}>{{$districtMaster->District_Name}}</option>
                        @endforeach
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="" class="col-sm-2 form-control-label">Beneficiary Address <span class="text-danger">*</span></label>
                <div class="col-sm-10" aria-colspan="2">
                    <textarea style="border: 1px solid #ccc;font-size: 0.75rem;color:#495057; padding-top: 10px;  padding-left: 20px;" rows="3" cols="63" name="beneficiary_address" id="beneficiary_address">{{$editBenificiaryList->Address1}}</textarea>
                </div>
            </td>
            <td colspan="2">
                <label for="" class="col-sm-2 form-control-label">Manufacture Address <span class="text-danger">*</span></label>
                <div class="col-sm-10" aria-colspan="2">
                    <textarea style="border: 1px solid #ccc;font-size: 0.75rem; color:#495057; padding-top: 10px;  padding-left: 20px;" rows="3" cols="63" type="text" name="manufacture_address" id="manufacture_address">{{$editBenificiaryList->Address2}}</textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label">PAN number {{--<span class="text-danger">*</span>--}} </label>
                <div class="col-sm-10">
                    <input type="text" style="text-transform: uppercase;" value="{{$editBenificiaryList->Pan_No}}" name="Pan_No" id="Pan_No" class="form-control" onkeyup="PanValidation('#Pan_No');" />
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">GST Number </label>
                <div class="col-sm-10">
                    <input type="text" name="GST" id="GST" style="text-transform: uppercase;" value="{{$editBenificiaryList->GST_No}}" class="form-control" onkeyup="GSTValidation('#GST');" />
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">Subsidy Registration <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="sub_registration" value="{{$editBenificiaryList->Subsidy_regn_no}}" id="sub_registration" class="form-control" />
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">Industry registration {{--<span class="text-danger">*</span>--}} </label>
                <div class="col-sm-10">
                    <input type="text" name="ind_registration" value="{{$editBenificiaryList->Industry_Regn_No}}" id="ind_registration" class="form-control" />
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label">Raw Materials <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <select style="width:165px" id="material_id" name="material_id" class="btn btn-secondary dropdown-toggle">
                        <option value="">--Select--</option>
                        @foreach($rawMaterial as $rawMaterial)
                        <option value="{{$rawMaterial->Pkid}}" {{$rawMaterial->Pkid == $editBenificiaryList->Raw_Materials_Id_Fk  ? 'selected' : ''}}>{{$rawMaterial->Material_Name}}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">Finish Goods <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <select style="width:165px" id="goods_id" name="goods_id" class="btn btn-secondary dropdown-toggle">
                        <option value="">--Select--</option>
                        @foreach($finishGoods as $finishGoods)
                        <option value="{{$finishGoods->Pkid}}" {{$finishGoods->Pkid == $editBenificiaryList->Finish_Goods_Id_Fk  ? 'selected' : ''}}>{{$finishGoods->Goods_Name}}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">Production Date <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="date" name="production_date" id="production_date" value="{{date('Y-m-d', strtotime($editBenificiaryList->Production_Date))}}" class="form-control" />
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">Production Capacity</label>
                <div class="col-sm-10">
                    <input type="text" name="prod_capacity" id="prod_capacity" class="form-control" value="{{$editBenificiaryList->Production_Capacity}}" />
                </div>
            </td>

        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label">Total Employment Generation </label>
                <div class="col-sm-10">
                    <input type="text" name="emp_generation" id="emp_generation" value="{{$editBenificiaryList->Emp_Generation_No}}" class="form-control" />
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">Distance (in Kms) </label>
                <div class="col-sm-10">
                    <input type="text" name="distance" id="distance" value="{{$editBenificiaryList->Distance}}" class="form-control" />
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">Financing Bank/Institutions {{--<span class="text-danger">*</span>--}}</label>
                <div class="col-sm-10">
                    <input type="text" name="bank" id="bank" value="{{$editBenificiaryList->Bank_Acc_no}}" class="form-control" />
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label">Type of the Unit </label>
                <div class="col-sm-10">
                    <select style="width:165px" name="unit_id" id="unit_id" class="btn btn-secondary dropdown-toggle">
                        <option value="">--Select--</option>
                        @foreach($unitMaster as $unitMaster)
                        <option value="{{$unitMaster->Pkid}}" {{$unitMaster->Pkid == $editBenificiaryList->Unit_Id_Fk  ? 'selected' : ''}}>{{$unitMaster->Unit_Name}}</option>
                        @endforeach
                    </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label">Status </label>
                <div class="col-sm-10">
                    <select style="width:165px" name="status_id" id="status_id" class="btn btn-secondary dropdown-toggle">
                        <option value="">--Select--</option>
                        <option value="0" {{0 == $editBenificiaryList->Activity  ? 'selected' : ''}}>Active</option>
                        <option value="1" {{1 == $editBenificiaryList->Activity  ? 'selected' : ''}}>InActive</option>
                    </select>
                </div>
            </td>
            <td colspan="3">
                <label for="" class="col-sm-2 form-control-label">Link with Govt Policies <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <select style="width:170px" name="gov_policy" id="gov_policy" class="btn btn-secondary dropdown-toggle">
                        <option value="">--Select--</option>
                        @foreach($govPolicy as $govPolicy)
                        <option value="{{$govPolicy->Pkid}}" {{$govPolicy->Pkid == $editBenificiaryList->Gov_Policy_Id  ? 'selected' : ''}}>{{$govPolicy->Policy_Name}}</option>
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
                        <option value="0" {{0 == $editBenificiaryList->Unit_Status  ? 'selected' : ''}}>New</option>
                        <option value="1" {{1 == $editBenificiaryList->Unit_Status  ? 'selected' : ''}}>Expansion</option>
                    </select>
                </div>
                </div>
            </td>
            <td colspan="3">

            </td>
        </tr>
        <tr class="header">
            <td colspan="4" align="center">
                <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveBenificiary('{{$editBenificiaryList->Pkid}}','{{ url('save-benificiary') }}', this,'searchResult');">
                    <i class="mdi mdi-content-save"></i>Update</button>
                <button type="button" class="btn btn-secondary btn-fw" id="approvalBtn" onclick="CmnApproval('{{$editBenificiaryList->Pkid}}','{{ url('benificiary-approval') }}', this,'searchResult');">
                    <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                <button type="reset" class="btn btn-light btn-fw">
                    <i class="mdi mdi-refresh"></i>Reset</button>
            </td>
        </tr>
    </tbody>
</table>
@endforeach