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
 <!-- Modal Header -->
 <div class="modal-header">
     <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Add Disbursement</h6>
     <button type="button" class="close" data-dismiss="modal">&times;</button>
 </div>

 <!-- Modal body -->
 <div class="modal-body">
     <div class="inner_result" id="inner_result"></div>
     <div class="row">
         <div class="col-lg-12 grid-margin">
             <div class="card">
                 <div class="card-body">
                     <div class="table-responsive">
                         <form id="paymentDetailsForm" name="paymentDetailsForm" method="POST">
                             <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                                 <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                     <span class="menu-title" style="font-weight: bold;">Claim Details</span>
                                 </legend>
                                 <table class="table table-hover text-left" style="border: 1px solid #ababab;">
                                     <tbody>
                                         @foreach ($smsClaimMaster as $smsClaimMaster)
                                         <tr>
                                             <td>
                                                 <input type="hidden" id="Allocation_Id" value="{{$smsClaimMaster->Allocation_Id}}">
                                                 <input type="hidden" id="Claim_Id" value="{{$smsClaimMaster->Pkid}}">
                                                 <label for="" class="col-sm-2 form-control-label font-weight-medium">Benificiary Name</label>
                                                 <div aria-colspan="2">
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
                                                     <label for="" class="col-sm-2 form-control-label font-weight-small">{{ $smsClaimMaster->Claim_From_Date ? date('Y-m-d', strtotime($smsClaimMaster->Claim_From_Date)) : '- - - -' }}
                                                     </label>
                                                 </div>
                                             </td>
                                             <td>
                                                 <label for="" class="col-sm-2 form-control-label font-weight-medium">Claim To</label>
                                                 <div aria-colspan="2">
                                                     <label for="" class="col-sm-2 form-control-label font-weight-small">{{ $smsClaimMaster->Claim_To_Date ? date('Y-m-d', strtotime($smsClaimMaster->Claim_To_Date)) : '- - - -' }}
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

                             <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                                 <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                     <span class="menu-title" style="font-weight: bold;">Payment Information</span>
                                 </legend>
                                 <div id="paymentDiv">

                                 </div>
                             </fieldset>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div id="disbursementPaymentList">
         @if(!empty($addedDisbursementList))
         <div class="row">
             <div class="col-lg-12 grid-margin">
                 <div class="card">
                     <div class="card-body">
                         <div class="table-responsive">
                             <form id="disbursementSearchResult" method="GET">
                                 <table style="width:100%">
                                     <tr>
                                         <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">List of Disbursement:
                                         </td>
                                     </tr>
                                     <tr>
                                         <td colspan="2">
                                             <hr>
                                         </td>
                                     </tr>
                                 </table>
                                 <table class="table table-striped text-left" style="border: 1px solid #ababab;">
                                     <thead>
                                         <tr>
                                             <th width="2%"> # </th>
                                             <th width="3%"> ID </th>
                                             <th width="37%"> Benificiary Name </th>
                                             <th width="12%"> Instrument Date </th>
                                             <!-- <th width="12%"> Disbursement Date </th> -->
                                             <th width="12%"> Instrument No </th>
                                             <th width="12%" style="text-align: right;"> Paid Amount </th>
                                             <th width="10%" style="text-align: right;"> Status </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @forelse ($addedDisbursementList as $addedDisbursementList)
                                         <tr>
                                             <td> {{$loop->iteration}} </td>
                                             <td> {{$addedDisbursementList->Pkid}} </td>
                                             <td> {{$addedDisbursementList->Benificiary_Name}} </td>
                                             <td> {{date('d-M-Y', strtotime($addedDisbursementList->Instrument_Date))}} </td>
                                             <!-- <td> {{date('d-M-Y', strtotime($addedDisbursementList->Disbursement_Date))}} </td> -->
                                             <td> {{$addedDisbursementList->Instrument_No}} </td>
                                             <td align="right"> {{number_format($addedDisbursementList->Disbursement_Amount,2)}} </td>
                                             <td style="text-align: right;"> {{$addedDisbursementList->Status_Name}}</td>
                                         </tr>
                                         @empty
                                         <tr>
                                             <td colspan="7" align="center">No Records Found !!</td>
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
         @endif
     </div>
 </div>



 <!-- Modal footer -->
 <div class="modal-footer">
     <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
 </div>