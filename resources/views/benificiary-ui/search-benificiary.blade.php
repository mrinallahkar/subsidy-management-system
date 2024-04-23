<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Beneficiary List:
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>

                    </table>
                    <table id="example" class="display table table-striped table-bordered no-footer" style="width:100%">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Beneficiary Name </th>
                                <th> Beneficiary Address </th>
                                <th> Subsidy Registration </th>
                                <th> PAN </th>
                                <th> Status </th>
                                <th style="text-align:right;"> Action </th>
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
                                <td align="right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','VIW','Benificiary');">
                                        <i class="mdi mdi-view-carousel"></i></button>
                                    @if($benificiaryList->Status_Id==1 or $benificiaryList->Status_Id==3)
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','EDT','Benificiary');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <a href="javascript:void(0);" onclick="deletePost({{$benificiaryList->Pkid}},'{{url('save-benificiary') }}','searchResult')" class="btn btn-danger btn-sm"> <i class="mdi mdi-delete"></i> </a>
                                    @else
                                    <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','EDT','Benificiary');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <button title="Delete Record" disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$benificiaryList->Pkid}},'{{url('save-benificiary') }}','searchResult')">
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