@extends('layout.master')

@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi mdi-rotate-left-variant"></i>
                                <span class="menu-title" style="font-weight: bold;">Fund Allocation</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                    </table>
                    <table  class="table table-striped">
                        <thead>
                            <tr>
                                <th> <input type="checkbox">All</th>
                                <th> Claim No </th>
                                <th> Audit Status </th>
                                <th> Bank Account No </th>
                                <th> Claim Amount </th>
                                <th> Received Date </th>
                                <th> Audit Status </th>
                                <th style="text-align:right;">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subsidyMaster as $subsidyMaster)
                            <tr>
                                <!-- <td> {{$loop->iteration}} </td> -->
                                <td> <input type="checkbox" id="bank_master{{$subsidyMaster->Pkid}}" name="bank_master{{$subsidyMaster->Pkid}}" value="{{$subsidyMaster->Pkid}}"></td>
                                <td> {{$subsidyMaster->Claim_No}} </td>
                                <td> {{$subsidyMaster->Audit_Status}} </td>
                                <td> {{$subsidyMaster->Bank_Acc_no}} </td>
                                <td style="text-transform: uppercase;"> {{$subsidyMaster->Pan_No}} </td>
                                <td> Created </td>
                                <td align="right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$subsidyMaster->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','VIW','Benificiary');">
                                        <i class="mdi mdi-view-carousel"></i>View</button>

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
                                <td colspan="2" class="font-weight-medium">Status</td>
                                <td class="font-weight-medium">Approval Date</td>
                                <td colspan="5" class="font-weight-medium">Remarks</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="font-weight-medium">
                                    <select style="width:150px" name="category_id" class="btn btn-secondary dropdown-toggle">
                                        <option value="">--Select--</option>
                                        <option value="0">Reject</option>
                                        <option value="1">Approve</option>
                                        <option value="2">Return</option>
                                    </select>
                                </td>
                                <td class="font-weight-medium"><input type="date" class="form-control" id="approval_date" name="approval_date" /> </td>
                                <td colspan="5" class="font-weight-medium"><textarea class="form-control" id="remarks" name="remarks"></textarea></td>
                            </tr>
                            <tr class="header">
                                <td colspan="6" align="center">
                                    <button type="button" class="btn btn-success btn-fw">
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
@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
@endpush