<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Search Beneficiary List:
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>

                    </table>
                    <table id="example" class="display table1 table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th width="4%"> # </th>
                                <th width="29%"> Beneficiary Name </th>
                                <th width="20%"> Beneficiary Address </th>
                                <th width="12%"> Subsidy Reg </th>
                                <th width="11%"> PAN </th>
                                <th width="8%"> Status </th>
                                <th width="21%" style="text-align:right;"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($benificiaryList as $benificiaryList)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$benificiaryList->Benificiary_Name}} </td>
                                <td> {{$benificiaryList->Address1}} </td>
                                <td> {{$benificiaryList->Subsidy_Regn_No}} </td>
                                <td style="text-transform: uppercase;"> {{$benificiaryList->Pan_No}} </td>
                                <td> {{$benificiaryList->Status_Name}}</td>
                                <td style="text-align:right;">
                                    <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','VIW','Benificiary');">
                                        <i class="mdi mdi-view-carousel"></i>
                                    </button>
                                    @if($benificiaryList->Status_Id==1 or $benificiaryList->Status_Id==3)
                                    <button title="Edit Record" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','EDT','Benificiary');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <a href="javascript:void(0);" onclick="deletePost({{$benificiaryList->Pkid}},'{{url('save-benificiary') }}','searchResult')" confirm="Are your sure?" class="btn btn-danger btn-sm"> <i class="mdi mdi-delete"></i> </a>
                                    @else
                                    <button title="Edit Record" type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','EDT','Benificiary');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <button title="Delete Record" disabled type="button" class="btn btn-danger btn-sm" confirm="Are your sure?" onclick="deletePost({{$benificiaryList->Pkid}},'{{url('save-benificiary') }}','searchResult')">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                    @endif
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
@section('page-js-files')
<link href="{{ asset('assete/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
@stop