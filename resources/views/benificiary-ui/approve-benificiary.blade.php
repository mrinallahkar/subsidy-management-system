
@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

<div id="ajaxLoadPage">
    <div class="result" id="result"></div>
    <form id="benificiaryApproveForm" method="POST">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table style="width:100%">
                                <tr>
                                    <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-account-box-multiple text-info icon-sm"></i>
                                        <span class="menu-title" style="font-weight: bold;">Approve Beneficiary:</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                            <div id="approvalList">
                                <table id="example"  class="display table table-striped table-bordered no-footer" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%"> <input onchange="checkAllCheckBox(this);" type="checkbox" /> All </th>
                                            <th width="33%"> Beneficiary Name </th>
                                            <th width="20%"> Benificiary Address </th>
                                            <th width="11%"> Subsidy Regn. No </th>
                                            <th width="11%"> PAN </th>
                                            <th width="10%"> Status </th>
                                            <th width="10%" style="text-align:right;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($benificiaryList as $benificiaryList)
                                        <tr>
                                            <!-- <td> {{$loop->iteration}} </td> -->
                                            <td> <input type="checkbox" class="checkbox" name="check_id" data-id="{{$benificiaryList->Pkid}}" value="{{$benificiaryList->Pkid}}"></td>
                                            <td> {{$benificiaryList->Benificiary_Name}} </td>
                                            <td> {{$benificiaryList->Address1}} </td>
                                            <td> {{$benificiaryList->Subsidy_Regn_No}} </td>
                                            <td style="text-transform: uppercase;"> {{$benificiaryList->Pan_No}} </td>
                                            <td> {{$benificiaryList->Status_Name}} </td>
                                            <td align="right">
                                                <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','VIW','Benificiary','benificiarySearchResult');">
                                                    <i class="mdi mdi-view-carousel"></i></button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" align="center">No Records Found !!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                    <span class="menu-title" style="font-weight: bold;">Approval</span>
                                </legend>
                                <table class="table table-hover">
                                    <tr>
                                        <td colspan="2">
                                            <label for="" class="col-sm-2 form-control-label font-weight-medium">Status</label>
                                            <div class="col-sm-10" aria-colspan="2">
                                                <select style="width:150px; text-align:left" name="decision" id="decision" class="btn btn-secondary dropdown-toggle">
                                                    <option value="">--Select--</option>
                                                    @foreach($approvalStatusMaster as $approvalStatusMaster)
                                                    <option value="{{$approvalStatusMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$approvalStatusMaster->Status_Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <label for="" class="col-sm-2 form-control-label font-weight-medium">Approval Date</label>
                                            <div class="col-sm-10" aria-colspan="2">
                                                <input type="date" class="form-control" id="approval_date" name="approval_date" />
                                            </div>
                                        </td>
                                        <td colspan="5">
                                            <label for="" class="col-sm-2 form-control-label font-weight-medium">Remarks</label>
                                            <div class="col-sm-10" aria-colspan="2">
                                                <textarea class="form-control" id="remarks" name="remarks"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="header">
                                        <td colspan="6" align="center">
                                            <button type="button" class="btn btn-success btn-fw" onclick="fnCmnApproved('{{ url('approve-benificiary') }}', 'benificiaryApproveForm','approvalList');">
                                                <i class="mdi mdi-account-check"></i>Approve</button>
                                            <button type="button" class="btn btn-light btn-fw">
                                                <i class="mdi mdi-refresh"></i>Reset</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- View Benificiary Model -->
    <div class="modal fade" id="viewBenificiary">
        <div style="width: 85%; text-align:center" class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title"><i class="mdi mdi-view-carousel"></i>View Benificiary</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="result" id="result"></div>
                                        <div id="appendBenificiary">

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
        </div>
    </div>
</div>
@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}

@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
@endpush