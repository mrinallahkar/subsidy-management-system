<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Subsidy Claim List:
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>

                    </table>
                    <table id="example"  class="display table table-striped table-bordered no-footer" width="100%">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Benificiary Name </th>
                                <th> Scheme </th>
                                <th style="text-align: right;"> Claim Amount </th>
                                <th> PAN </th>
                                <th> State </th>
                                <th> Status </th>
                                <th style="text-align:right;"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($smsClaimMaster as $smsClaimMaster)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$smsClaimMaster->Benificiary_Name}} 
                                <br><span style="font-size: x-small; font-weight:bold;">Claim From: </span><span style="font-size: x-small;">@if(!empty($smsClaimMaster->Claim_From_Date)){{date('d M Y', strtotime($smsClaimMaster->Claim_From_Date))}} @else - - - - -@endif</span> <span style="font-size: x-small; font-weight:bold;">Claim To: </span><span style="font-size: x-small;">@if(!empty($smsClaimMaster->Claim_To_Date)){{date('d M Y', strtotime($smsClaimMaster->Claim_To_Date))}} @else - - - - -@endif</span>    
                                </td>
                                <td> {{$smsClaimMaster->Scheme_Name}} </td>
                                <td style="text-align: right;"> {{number_format($smsClaimMaster->Claim_Amount,2)}} </td>
                                <td style="text-transform: uppercase;"> {{$smsClaimMaster->Pan_No}} </td>
                                <td> {{$smsClaimMaster->State_Name}}</td>
                                <td> {{$smsClaimMaster->Status_Name}}</td>
                                <td style="text-align: right;">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-edit-subsidy-claim') }}','appendSubsidy','VIW','Subsidy Claim','');">
                                        <i class="mdi mdi-view-carousel"></i></button>
                                    @if($smsClaimMaster->Status_Id==1 or $smsClaimMaster->Status_Id==3)
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-edit-subsidy-claim') }}','appendSubsidy','EDT','Subsidy Claim','');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <a href="javascript:void(0);" onclick="deletePost({{$smsClaimMaster->Pkid}},'{{url('save-subsidy') }}','searchResult')" class="btn btn-danger btn-sm"><i class="mdi mdi mdi-archive"></i></a>
                                    @else
                                    <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-edit-benificiary') }}','appendSubsidy','EDT','Subsidy Claim');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <button disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$smsClaimMaster->Pkid}},'{{url('save-subsidy') }}','searchResult')">
                                         <i class="mdi mdi mdi-archive"></i>                                        
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" align="center">No Records Found !!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>