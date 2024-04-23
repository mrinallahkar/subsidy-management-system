 @push('plugin-styles')
 <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
 @endpush
 <script>
    $("#searchCmailForm").submit(function() {
        return false;
    });
</script>
 <div id="ajaxLoadPage">
     <div class="result" id="result"></div>
     <div class="row">
         <div class="col-lg-12 grid-margin">
             <div class="card">
                 <div class="card-body">
                     <div class="table-responsive">
                         <table style="width:100%">
                             <tr>
                                 <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-cube text-primary icon-sm"></i>
                                     <span class="menu-title" style="font-weight: bold;">Subsidy Claim</span>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="2">
                                     <hr>
                                 </td>
                             </tr>
                         </table>
                         <table style="width:100%">
                             <tr>
                                 <td colspan="2" class="card-title" style="text-align: right;">
                                     <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#addSubsidy" onclick="addModal('subsidy-ui.add-subsidy-modal','modal')">
                                         <i class="mdi mdi mdi-plus"></i>Add Claim Subsidy</button>
                                 </td>
                             </tr>
                         </table>
                         <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                             <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                 <span class="menu-title" style="font-weight: bold;">Search Claim</span>
                             </legend>
                             <div class="table-responsive">
                                 <form method="POST" id="searchCmailForm">
                                     <table class="table table-hover" style="border: 1px solid #ababab;">
                                         <tbody>
                                             <tr>
                                                 <td>
                                                     <label for="" class="col-sm-2 form-control-label  font-weight-medium">Benificiary Name </label>
                                                     <div class="col-sm-10">
                                                         <input class="form-control" placeholder="Type Benificiary Name to Search" type="text" id="benificiary_name" name="benificiary_name" />
                                                         <div id="benificiaryList" style="background-color: #ccc;">
                                                         </div>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim From </label>
                                                     <div class="col-sm-10">
                                                         <input class="form-control" type="date" id="sr_claim_from" name="sr_claim_from" autofocus />
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim To </label>
                                                     <div class="col-sm-10">
                                                         <input class="form-control" type="date" id="sr_claim_to" name="sr_claim_to" autofocus />
                                                     </div>
                                                 </td>

                                             </tr>
                                             <tr>
                                                 <td>
                                                     <label for="" class="col-sm-2 form-control-label  font-weight-medium">Scheme </label>
                                                     <div class="col-sm-10">
                                                         <select style="width:150px; text-align:left" name="scheme" id="scheme" class="btn btn-secondary dropdown-toggle">
                                                             <option value="">--Select--</option>
                                                             @foreach($subsidyMaster as $subsidyMaster)
                                                             <option value="{{$subsidyMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$subsidyMaster->Scheme_Name}}</option>
                                                             @endforeach
                                                         </select>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <label for="" class="col-sm-2 form-control-label  font-weight-medium">State </label>
                                                     <div class="col-sm-10">
                                                         <select style="width:150px; text-align:left" name="state_id" id="state_id" class="btn btn-secondary dropdown-toggle" onchange="getDistrictPerState(this.value,'#district_id','{{url('fill-district-onChange')}}');">
                                                             <option value="">--Select--</option>
                                                             @foreach($stateMaster as $stateMaster)
                                                             <option value="{{$stateMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$stateMaster->State_Name}}</option>
                                                             @endforeach
                                                         </select>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <label for="" class="col-sm-2 form-control-label  font-weight-medium">District </label>
                                                     <div class="col-sm-10">
                                                         <select style="width:150px; text-align:left" name="district_id" id="district_id" class="btn btn-secondary dropdown-toggle">
                                                             <option value="">--Select--</option>
                                                         </select>
                                                     </div>
                                                 </td>
                                                 <!-- <td>
                                                <label for="" class="col-sm-2 form-control-label  font-weight-medium">Govt. Policy </label>
                                                <div class="col-sm-10">
                                                    <select style="width:150px" name="policy_id" class="btn btn-secondary dropdown-toggle">
                                                        <option value="">--Select--</option>
                                                        @foreach($govPolicy as $govPolicy)
                                                        <option value="{{$govPolicy->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$govPolicy->Policy_Name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td> -->
                                             </tr>
                                             <tr class="header">
                                                 <td colspan="3" align="center">
                                                     <button type="submit" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('subsidy-ui.search-subsidy-result')}}','searchResult','searchCmailForm','claim_id');">
                                                         <i class="mdi mdi-magnify"></i>Search</button>
                                                     <button type="reset" class="btn btn-light btn-fw">
                                                         <i class="mdi mdi-refresh"></i>Reset</button>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </form>
                             </div>
                         </fieldset>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--Search Result-->
     <div id="searchResult">
         <div class="row">
             <div class="col-lg-12 grid-margin">
                 <div class="card">
                     <div class="card-body">
                         <div class="table-responsive">
                             <table style="width:100%">
                                 <tr>
                                     <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Claim List:
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
                                         <th width="4%"> # </th>
                                         <!-- <th width="10%"> Claim ID </th> -->
                                         <th width="29%"> Benificiary Name </th>
                                         <th width="14%"> Scheme </th>
                                         <th width="14%" style="text-align:right;"> Claim Amount </br><span style="font-size: 10px;">(Claim History)</span></th>
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
     </div>
     <!-- Add Subsidy Model -->
     <div class="modal fade" id="addSubsidy">
         <div style="width: 90%; text-align:left" class="modal-dialog modal-lg">
             <div class="modal-content" id="modal">
             </div>
         </div>
     </div>


     <!-- View Disbursement Model -->
     <div class="modal fade" id="viewSubsidy">
         <div style="width: 90%; text-align:left" class="modal-dialog modal-lg">
             <div id="access_deny" class="d-none">
             </div>
             <div class="modal-content d-none" id="modal_content">
                 <!-- Modal Header -->
                 <div class="modal-header">
                     <h6 class="modal-title"><i class="mdi mdi-view-carousel"></i>View Subsidy</h6>
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
     <!-- Modal -->
     <!-- View Disbursement Model -->
     <div class="modal fade" id="claimHistory">
         <div style="width: 90%; text-align:left" class="modal-dialog modal-lg">
             <div id="access_deny" class="d-none">
             </div>
             <div class="modal-content d-none" id="modal_content">
                 <!-- Modal Header -->
                 <div class="modal-header">
                     <h6 class="modal-title"><i class="mdi mdi-view-carousel"></i>View Claim History</h6>
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
                                         <div id="appendClaimHistory">

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
     <!-- end modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div style="width: 90%; text-align:left" class="modal-dialog modal-lg">
             <div id="contain">
                 <div class="row">
                     <div class="col-md-12 grid-margin">
                         <div class="card">
                             <div class="card-body">
                                 <div style="text-align: center">
                                     <h1 style="color: red;">Access Denied !</h1>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
     $.ajaxSetup({
         headers: {
             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
         },
     });
     $(document).ready(function() {

         $('#benificiary_name').keyup(function() {
             var query = $(this).val();
             if (query != '') {
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                     url: "{{ route('autocomplete.fetch') }}",
                     method: "POST",
                     data: {
                         query: query
                     },
                     headers: {
                         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                     },
                     success: function(data) {
                         // alert(data);
                         $('#benificiaryList').fadeIn();
                         $('#benificiaryList').html(data);
                     }
                 });
             } else {
                 $('#benificiaryList').html('');
             }
         });

         $(document).on('click', 'li', function() {
             $('#benificiary_name').val($(this).text());
             $('#benificiaryList').fadeOut();
         });

     });
 </script>