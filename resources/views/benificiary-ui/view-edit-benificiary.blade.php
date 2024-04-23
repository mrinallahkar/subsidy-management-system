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

@foreach($editBenificiaryList as $editBenificiaryList)
<input type="hidden" id="id_hidden" name="id" value="{{$editBenificiaryList->Pkid}}" />
@if($MODE=='VIW')
<table class="table table-hover text-left" style="border: 1px solid #ababab;">
    <tbody>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Benificiary Name </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->Benificiary_Name?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">State </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->State_Name?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">District </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->District_Name?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Beneficiary Address </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->Address1?? '- - - -'}}</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Manufacture Address </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->Address2?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">PAN number </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{Str::upper($editBenificiaryList->Pan_No?? '- - - -')}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">GST Number </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->GST_No?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Industry registration </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->Industry_Regn_No?? '- - - -'}}</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Industry registration Date</label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Industry_Regn_Date ? date('d-M-Y', strtotime($editBenificiaryList->Industry_Regn_Date)) : '- - - -' }}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Subsidy Registration </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->Subsidy_Regn_No?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Subsidy Registration Date</label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Subsidy_Regn_Date ? date('d-M-Y', strtotime($editBenificiaryList->Subsidy_Regn_Date)) : '- - - -' }}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Raw Materials </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Material_Name?? '- - - -'}}</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Finish Goods </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Goods_Name?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Date of Commercial Production</label>
                <div class="col-sm-10" style="text-align: left;">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Production_Date ? date('d-M-Y', strtotime($editBenificiaryList->Production_Date)) : '- - - -' }}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Production Capacity</label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{$editBenificiaryList->Production_Capacity ?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Total Employment Generation </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Emp_Generation_No ?? '- - - -'}}</label>
                </div>

            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Distance (in Kms) </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Distance ?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Financing Bank/Institutions</label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Bank_Name ?? '- - - -'}}</label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Type of the Unit </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">
                        @if ($editBenificiaryList->Unit_Id_Fk=='0')
                        Manufacturing
                        @elseif ($editBenificiaryList->Unit_Id_Fk=='1')
                        Service Sector
                        @else
                        - - - -
                        @endif
                    </label>
                </div>
            </td>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Sector Name </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">{{ $editBenificiaryList->Sector_Name ?? '- - - -'}}</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Unit Status </label>
                <div class="col-sm-10">
                    <label for="" class="form-control-label font-weight-small">
                        @if ($editBenificiaryList->Unit_Status=='0')
                        New
                        @elseif ($editBenificiaryList->Unit_Status=='1')
                        Expansion
                        @else
                        - - - -
                        @endif
                    </label>
                </div>
            </td>
            <td colspan="3">
            </td>
        </tr>
    </tbody>
</table>
@else
<form method="post" id="editBenificiaryForm">
    <div id="afterEdit">
        <table class="table table-hover text-left" style="border: 1px solid #ababab;">
            <tbody>
                <tr>
                    <td colspan="2">
                        <label for="" class="col-sm-2 form-control-label">Benificiary Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10" aria-colspan="2">
                            <input type="text" autofocus name="Benificiary_Name" id="Benificiary_Name" value="{{$editBenificiaryList->Benificiary_Name}}" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">State <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select style="width:165px" name="state_id" id="state_id" class="btn btn-secondary dropdown-toggle chosen" onchange="getDistrictPerState(this.value,'#district','{{url('fill-district-onChange')}}');">
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
                        <label for="" class="col-sm-2 form-control-label">Subsidy Registration {{-- <span class="text-danger">*</span>--}} </label>
                        <div class="col-sm-10">
                            <input type="text" name="sub_registration" value="{{$editBenificiaryList->Subsidy_Regn_No}}" id="sub_registration" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Subsidy Registration Date{{--<span class="text-danger">*</span>--}}</label>
                        <div class="col-sm-10">
                            <input type="date" name="sub_registration_date" value="{{ $editBenificiaryList->Subsidy_Regn_Date ? date('Y-m-d', strtotime($editBenificiaryList->Subsidy_Regn_Date)) : '' }}" id="sub_registration_date" class="form-control" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Industry Registration {{--<span class="text-danger">*</span>--}} </label>
                        <div class="col-sm-10">
                            <input type="text" name="ind_registration" value="{{$editBenificiaryList->Industry_Regn_No}}" id="ind_registration" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Industry Registration Date {{--<span class="text-danger">*</span>--}}</label>
                        <div class="col-sm-10">
                            <input type="date" name="ind_registration_date" value="{{ $editBenificiaryList->Industry_Regn_Date ? date('Y-m-d', strtotime($editBenificiaryList->Industry_Regn_Date)) : '' }}" id="ind_registration_date" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Raw Materials</label>
                        <div class="col-sm-10">
                            <select style="width:165px" id="material_id" name="material_id" class="btn btn-secondary dropdown-toggle chosen">
                                <option value="">--Select--</option>
                                @foreach($rawMaterial as $rawMaterial)
                                <option value="{{$rawMaterial->Pkid}}" {{$rawMaterial->Pkid == $editBenificiaryList->Raw_Materials_Id_Fk  ? 'selected' : ''}}>{{$rawMaterial->Material_Name}}</option>
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
                                <option value="{{$finishGoods->Pkid}}" {{$finishGoods->Pkid == $editBenificiaryList->Finish_Goods_Id_Fk  ? 'selected' : ''}}>{{$finishGoods->Goods_Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Production Date <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="date" name="production_date" id="production_date" value="{{ $editBenificiaryList->Production_Date ? date('Y-m-d', strtotime($editBenificiaryList->Production_Date)) : '' }}" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Production Capacity</label>
                        <div class="col-sm-10">
                            <input type="text" name="prod_capacity" id="prod_capacity" class="form-control" value="{{$editBenificiaryList->Production_Capacity}}" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Type of the Unit </label>
                        <div class="col-sm-10">
                            <select style="width:165px" name="unit_id" id="unit_id" class="btn btn-secondary dropdown-toggle chosen">
                                <option value="">--Select--</option>
                                <option value="0" {{0 == $editBenificiaryList->Unit_Id_Fk  ? 'selected' : ''}}>Manufacturing</option>
                                <option value="1" {{1 == $editBenificiaryList->Unit_Id_Fk  ? 'selected' : ''}}>Service Sector</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Total Employment Generation </label>
                        <div class="col-sm-10">
                            <input type="text" name="emp_generation" id="emp_generation" value="{{$editBenificiaryList->Emp_Generation_No}}" class="form-control" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Distance (in Kms) </label>
                        <div class="col-sm-10">
                            <input type="text" name="distance" id="distance" value="{{$editBenificiaryList->Distance}}" class="form-control" />
                        </div>
                    </td>
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Financing Bank/Institutions {{-- <span class="text-danger">*</span>--}} </label>
                        <div class="col-sm-10">
                            <!-- <input type="text" name="bank" id="bank" value="{{$editBenificiaryList->Bank_Acc_no}}" class="form-control" /> -->
                            <select style="width:170px" name="Bank_Id" id="Bank_Id" class="btn btn-secondary dropdown-toggle chosen">
                                <option value="">--Select--</option>
                                @foreach($bankMaster as $bankMaster)
                                <option value="{{$bankMaster->Pkid}}" {{$bankMaster->Pkid == $editBenificiaryList->Bank_Id_Fk  ? 'selected' : ''}}>{{$bankMaster->Bank_Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <!-- <td>
                         <label for="" class="col-sm-2 form-control-label">Status </label>
                         <div class="col-sm-10">
                             <select style="width:165px" name="status_id" id="status_id" class="btn btn-secondary dropdown-toggle">
                                 <option value="">--Select--</option>
                                 <option value="0" {{0 == $editBenificiaryList->Activity  ? 'selected' : ''}}>Active</option>
                                 <option value="1" {{1 == $editBenificiaryList->Activity  ? 'selected' : ''}}>InActive</option>
                             </select>
                         </div>
                     </td> -->
                    <td>
                        <label for="" class="col-sm-2 form-control-label">Sector Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select style="width:165px" id="sector_id" name="sector_id" class="btn btn-secondary dropdown-toggle chosen">
                                <option value="">--Select--</option>
                                @foreach($sectorMaster as $sectorMaster)
                                <option value="{{$sectorMaster->Pkid}}" {{$sectorMaster->Pkid == $editBenificiaryList->Sector_Id_Fk  ? 'selected' : ''}}>{{$sectorMaster->Sector_Name}}</option>
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
                                <option value="{{$govPolicy->Pkid}}" {{$govPolicy->Pkid == $editBenificiaryList->Gov_Policy_Id  ? 'selected' : ''}}>{{$govPolicy->Policy_Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> <label for="" class="col-sm-2 form-control-label">Unit Status </label>
                        <div class="col-sm-10">
                            <select style="width:165px" name="unit_status_id" id="unit_status_id" class="btn btn-secondary dropdown-toggle chosen">
                                <option value="">--Select--</option>
                                <option value="0" {{0 == $editBenificiaryList->Unit_Status  ? 'selected' : ''}}>New</option>
                                <option value="1" {{1 == $editBenificiaryList->Unit_Status  ? 'selected' : ''}}>Expansion</option>
                            </select>
                        </div>
                    </td>
                    <td colspan="3">

                    </td>
                </tr>
                <tr class="header">
                    <td colspan="4" align="center">
                        <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveBenificiary('{{$editBenificiaryList->Pkid}}','{{ url('save-benificiary') }}', this,'searchResult');">
                            <i class="mdi mdi-content-save"></i>Update</button>
                        <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$editBenificiaryList->Pkid}}','{{ url('benificiary-approval') }}', this,'searchResult');">
                            <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                        <button type="reset" class="btn btn-light btn-fw">
                            <i class="mdi mdi-refresh"></i>Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
@endif
@endforeach