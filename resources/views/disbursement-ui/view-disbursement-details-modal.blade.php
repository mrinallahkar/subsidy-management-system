 <div class="table-responsive">
     <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
         <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
             <span class="menu-title" style="font-weight: bold;">Claim Details:</span>
         </legend>
         <table class="table table-hover">
             <tbody>
                 @foreach ($smsClaimMaster as $smsClaimMaster)
                 <tr>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">Benificiary Name</label>
                         <div class="text-break" style="max-width: 250px;word-wrap: break-word;" aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{$smsClaimMaster->Benificiary_Name}}</label>
                         </div>
                     </td>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">Claim No</label>
                         <div aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{$smsClaimMaster->Claim_Id}}
                             </label>
                         </div>
                     </td>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">Subsidy Scheme</label>
                         <div aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{$smsClaimMaster->Scheme_Name}}
                             </label>
                         </div>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">Claim From</label>
                         <div aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{ $smsClaimMaster->Claim_From_Date ? date('d-M-Y', strtotime($smsClaimMaster->Claim_From_Date)) : '- - - -' }}
                             </label>
                         </div>
                     </td>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">Claim To</label>
                         <div aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{ $smsClaimMaster->Claim_To_Date ? date('d-M-Y', strtotime($smsClaimMaster->Claim_To_Date)) : '- - - -' }}
                             </label>
                         </div>
                     </td>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">Claim Amount</label>
                         <div aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{number_format($smsClaimMaster->Claim_Amount,2)}}
                             </label>
                         </div>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">Allocated Amount</label>
                         <div aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{number_format($smsClaimMaster->Allocated_Amount,2)}}</label>
                         </div>
                     </td>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">State</label>
                         <div aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{$smsClaimMaster->State_Name}}</label>
                         </div>
                     </td>
                     <td>
                         <label for="" class="col-sm-2 form-control-label font-weight-medium">Already Paid</label>
                         <div aria-colspan="2">
                             <label for="" class="col-sm-2 form-control-label font-weight-small">{{number_format($smsClaimMaster->Paid_Amount,2)}}
                             </label>
                         </div>
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </fieldset>
 </div>

 <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
     <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
         <span class="menu-title" style="font-weight: bold;">List Of Payment:</span>
     </legend>
     <div class="table-responsive">
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th> # </th>
                     <th> Disbursement Amount </th>
                     <th> Payment Mode </th>
                     <th> Instrument No. </th>
                     <th> Instrument Date </th>
                     <th> Narration </th>
                     <th> Status </th>
                     @if($MODE!='VIW')
                     <th style="text-align:right;"> Action </th>
                     @endif
                 </tr>
             </thead>
             <tbody>
                 @forelse ($addedDisbursementList as $addedDisbursementList)
                 <tr>
                     <td> {{$loop->iteration}} </td>
                     <td> {{$addedDisbursementList->Disbursement_Amount}} </td>
                     <td>
                         @if($addedDisbursementList->Payment_Mode==1)
                         Cheque
                         @elseif($addedDisbursementList->Payment_Mode==2)
                         RTGS
                         @elseif($addedDisbursementList->Payment_Mode==3)
                         Demand Draft
                         @elseif($addedDisbursementList->Payment_Mode==4)
                         NEFT
                         @elseif($addedDisbursementList->Payment_Mode==5)
                         PFMS/E-Payment
                         @endif
                     <td> {{$addedDisbursementList->Instrument_No}} </td>
                     <td> {{date('d-M-Y', strtotime($addedDisbursementList->Instrument_Date))}} </td>
                     <td> {{$addedDisbursementList->Narration}} </td>
                     <td> {{$addedDisbursementList->Status_Name}}</td>
                     @if($MODE!='VIW')
                     <td align="right">
                         @if($addedDisbursementList->Status_Id_Fk==1 or $addedDisbursementList->Status_Id_Fk==3)
                         <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$addedDisbursementList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','EDT','Benificiary','benificiarySearchResult');">
                             <i class="mdi mdi-grease-pencil"></i>Edit</button>
                         <a href="javascript:void(0);" onclick="deletePost({{$addedDisbursementList->Pkid}},'{{url('save-benificiary') }}','searchResult')" class="btn btn-danger btn-sm"> Delete </a>
                         @else
                         <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$addedDisbursementList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','EDT','Benificiary','benificiarySearchResult');">
                             <i class="mdi mdi-grease-pencil"></i>Edit</button>
                         <button disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$addedDisbursementList->Pkid}},'{{url('save-benificiary') }}','searchResult')">
                             <!-- <i class="mdi mdi mdi-archive"></i> -->
                             Delete
                         </button>
                         @endif
                     </td>
                     @endif
                 </tr>
                 @empty
                 <tr>
                     <td colspan="7" align="center">No Records Found !!</td>
                 </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
 </fieldset>
 </div>