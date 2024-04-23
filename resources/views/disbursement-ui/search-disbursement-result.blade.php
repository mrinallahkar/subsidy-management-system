<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <form id="disbursementSearchResult" method="GET">
                        <table style="width:100%">
                            <tr>
                                <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Search Disbursement List:
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>

                        </table>
                        <table id="example1" class="display table table-striped table-bordered no-footer" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="4%"> # </th>
                                    <!-- <th width="5%"> ID </th> -->
                                    <th width="28%"> Benificiary Name </th>
                                    <th width="15%"> Disbursement Date </th>
                                    <th width="11%" style="text-align: right;"> Claim Amount </th>
                                    <th width="11%" style="text-align: right;"> Paid Amount </th>
                                    <th width="12%" style="text-align: right;"> Pending Amount </th>
                                    <!-- <th> Status </th> -->
                                    <th width="21%" style="text-align:right;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($disbursementDetailList as $disbursementDetailList)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <!-- <td> {{$disbursementDetailList->Pkid}} </td> -->
                                    <td> {{$disbursementDetailList->Benificiary_Name}}
                                        <br><span style="font-size: x-small; font-weight:bold;">Claim From: </span><span style="font-size: x-small;">@if(!empty($disbursementDetailList->Claim_From_Date)){{date('d M Y', strtotime($disbursementDetailList->Claim_From_Date))}} @else - - - - -@endif</span> <span style="font-size: x-small; font-weight:bold;">Claim To: </span><span style="font-size: x-small;">@if(!empty($disbursementDetailList->Claim_To_Date)){{date('d M Y', strtotime($disbursementDetailList->Claim_To_Date))}} @else - - - - -@endif</span>
                                    </td>
                                    <td> {{date('d-M-Y', strtotime($disbursementDetailList->Disbursement_Date))}} </td>
                                    <td align="right"> {{number_format($disbursementDetailList->Claim_Amount,2)}} </td>
                                    <td align="right"> {{number_format($disbursementDetailList->Disbursement_Amount,2)}} </td>
                                    <td align="right"> @if(($disbursementDetailList->Claim_Amount-$disbursementDetailList->TotalPaid)>0)
                                        {{number_format($disbursementDetailList->Claim_Amount-$disbursementDetailList->TotalPaid,2)}}
                                        @else
                                        0.00
                                        @endif
                                    </td>
                                    <!-- <td> {{$disbursementDetailList->Status_Name}}</td> -->
                                    <td align="right">
                                        <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDisbursement" onclick="viewDisbursementModel({{$disbursementDetailList->Pkid}},{{$disbursementDetailList->Allocation_Pk}},'{{ url('view-disbursement-details-modal') }}','viewClaim','VIW','Disbursement Details','disbursementSearchResult');">
                                            <i class="mdi mdi-view-carousel"></i></button>
                                        @if($disbursementDetailList->Status_Id_Fk==1 or $disbursementDetailList->Status_Id_Fk==3)
                                        <button title="Edit Record" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addDisbursement" onclick="disbursementModal('{{ url('disbursement-ui.edit-view-disbursement-modal') }}','modal','disbursementClaimSearchForm',{{$disbursementDetailList->Pkid}},{{$disbursementDetailList->Allocation_Pk}})">
                                            <i class="mdi mdi-grease-pencil"></i></button>
                                        <a href="javascript:void(0);" disabled onclick="deletePost({{$disbursementDetailList->Pkid}},'{{url('save-disbursement') }}','searchResult')" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                        @else
                                        <button title="Edit Record" type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addDisbursement" onclick="disbursementModal('{{ url('disbursement-ui.edit-view-disbursement-modal') }}','modal','disbursementClaimSearchForm',{{$disbursementDetailList->Pkid}},{{$disbursementDetailList->Allocation_Pk}})">
                                            <i class="mdi mdi-grease-pencil"></i></button>
                                        <button title="Delete Record" disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$disbursementDetailList->Pkid}},'{{url('save-disbursement') }}','searchResult')">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>