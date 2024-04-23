 @push('plugin-styles')
 <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
 @endpush

 <div id="ajaxLoadPage">
     <div class="result" id="result"></div>
     <form id="subsidyClaimApproveForm" method="POST">
         <div class="row">
             <div class="col-lg-12 grid-margin">
                 <div class="card">
                     <div class="card-body">
                         <div class="table-responsive">
                             <table style="width:100%">
                                 <tr>
                                     <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-cube text-primary icon-sm"></i>
                                         <span class="menu-title" style="font-weight: bold;">Approve Subsidy Claim</span>
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
                                             <th width="10%"> Claim ID </th>
                                             <th width="20%"> Benificiary Name </th>
                                             <th width="10%"> Scheme </th>
                                             <th width="12%" style="text-align: right;"> Claim Amount </th>
                                             <th width="11%"> PAN </th>
                                             <th width="11%"> State </th>
                                             <th width="11%"> Status </th>
                                             <th width="10%" style="text-align:right;"> Action </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @forelse ($smsClaimMaster as $smsClaimMaster)
                                         <tr>
                                             <!-- <td> {{$loop->iteration}} </td> -->
                                             <td> <input type="checkbox" class="checkbox" name="check_id" data-id="{{$smsClaimMaster->Pkid}}" value="{{$smsClaimMaster->Pkid}}"></td>
                                             <td> {{$smsClaimMaster->Claim_Id}} </td>
                                             <td> {{$smsClaimMaster->Benificiary_Name}} </td>
                                             <td> {{$smsClaimMaster->Scheme_Name}} </td>
                                             <td style="text-align: right;"> {{number_format($smsClaimMaster->Claim_Amount,2)}} </td>
                                             <td style="text-transform: uppercase;"> {{$smsClaimMaster->Pan_No}} </td>
                                             <td> {{$smsClaimMaster->State_Name}}</td>
                                             <td> {{$smsClaimMaster->Status_Name}}</td>
                                             <td style="text-align: right;">
                                                 <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-edit-subsidy-claim') }}','appendSubsidy','VIW','Subsidy Claim','');">
                                                     <i class="mdi mdi-view-carousel"></i></button>
                                             </td>
                                         </tr>
                                         @empty
                                         <tr>
                                             <td colspan="9" align="center">No Records Found !!</td>
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
                                 <table class="table table-striped">
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
                                     <tr>
                                         <td colspan="6" align="center">
                                             <button type="button" class="btn btn-success btn-fw" onclick="fnCmnApproved('{{ url('approve-subsidy-claim') }}', 'subsidyClaimApproveForm','approvalList');">
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
     <!-- View Disbursement Model -->
     <div class="modal fade" id="viewSubsidy">
         <div style="width: 90%; text-align:left" class="modal-dialog modal-lg">
             <div class="modal-content">
                 <!-- Modal Header -->
                 <div class="modal-header">
                     <h6 class="modal-title"><i class="mdi mdi-view-carousel"></i>View Subsidy</h6>
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
                                         <div id="appendSubsidy">

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