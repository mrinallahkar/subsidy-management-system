<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Search Claim List:
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
                                <th width="4%"> # </th>
                                <!-- <th width="10%"> Claim ID </th> -->
                                <th width="29%"> Benificiary Name </th>
                                <th width="14%"> Scheme </th>
                                <th width="14%" style="text-align:right;"> Claim Amount </br><span style="font-size: 10px;">(Claim History)</span> </th>
                                <th width="9%"> State </th>
                                <th width="9%"> Status </th>
                                <th width="20%" style="text-align:right;"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($smsClaimMaster as $smsClaimMaster)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <!-- <td> {{$smsClaimMaster->Claim_Id}} </td> -->
                                <td> {{$smsClaimMaster->Benificiary_Name}} 
                                <br><span style="font-size: x-small; font-weight:bold;">Claim From: </span><span style="font-size: x-small;">@if(!empty($smsClaimMaster->Claim_From_Date)){{date('d M Y', strtotime($smsClaimMaster->Claim_From_Date))}} @else - - - - -@endif</span> <span style="font-size: x-small; font-weight:bold;">Claim To: </span><span style="font-size: x-small;">@if(!empty($smsClaimMaster->Claim_To_Date)){{date('d M Y', strtotime($smsClaimMaster->Claim_To_Date))}} @else - - - - -@endif</span>    
                                </td>
                                <td> {{$smsClaimMaster->Scheme_Name}} </td>
                                <td align="right"> 
                                <a title="View Claim History" href="#" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-claim-history') }}','appendSubsidy','VIW','Claim History','');">
                                     {{number_format($smsClaimMaster->Claim_Amount,2)}}</a>   
                                </td>
                                <td> {{$smsClaimMaster->State_Name}}</td>
                                <td> {{$smsClaimMaster->Status_Name}}</td>
                                <td style="text-align:right;">
                                    <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-edit-subsidy-claim') }}','appendSubsidy','VIW','Subsidy Claim','');">
                                        <i class="mdi mdi-view-carousel"></i></button>
                                    @if($smsClaimMaster->Status_Id==1 or $smsClaimMaster->Status_Id==3)
                                    <button title="Edit Record" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-edit-subsidy-claim') }}','appendSubsidy','EDT','Subsidy Claim','');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <a href="javascript:void(0);" onclick="deletePost({{$smsClaimMaster->Pkid}},'{{url('save-subsidy') }}','searchResult')" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                    @else
                                    <button title="Edit Record" type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-edit-benificiary') }}','appendSubsidy','EDT','Subsidy Claim');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <button title="Delete Record" disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$smsClaimMaster->Pkid}},'{{url('save-subsidy') }}','searchResult')">
                                        <i class="mdi mdi-delete"></i>
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