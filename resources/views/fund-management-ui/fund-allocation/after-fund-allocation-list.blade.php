 <div class="row">
     <div class="col-lg-12 grid-margin">
         <div class="card">
             <div class="card-body">
                 <!-- $Balance_Fund = '0.0'; -->
                 @foreach ($fundMaster as $fundMaster )
                 @php $Balance_Fund=$fundMaster->Fund_Balance; @endphp
                 @php $Fund_Id=$fundMaster->Pkid; @endphp
                 @php $Scheme_Name=$fundMaster->Scheme_Name; @endphp
                 @php $Scheme_Id=$fundMaster->Scheme_Id; @endphp
                 @endforeach
                 <span style="float: right; margin:-10px 0px -20px 0px; font-weight: bold; color:green;">
                     Scheme Name: {{$Scheme_Name}} <!-- Fund Balance: {{number_format($Balance_Fund,2)}} -->
                 </span>
                 <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                     <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                         <span class="menu-title" style="font-weight: bold;">Claim List for Fund Allocation:</span>
                     </legend>
                     <div class="table-responsive">
                         <form method="POST" id="addFundAllocationForm">
                             <input type="hidden" value="{{$Balance_Fund}}" id="Balance_Fund" />
                             <table class="table1 table-striped" width="100%">
                                 <tbody>
                                     <tr>
                                         <th width="5%"> #</th>
                                         <th width="10%"> Claim ID</th>
                                         <th style="width:21%"> Benificiary</th>
                                         <!-- <th> Scheme</th> -->
                                         <th width="10%"> From Date</th>
                                         <th width="10%"> To Date</th>
                                         <th width="12%" style="text-align: right;"> Claimed Amt.</th>
                                         <th width="12%" style="text-align: right;"> Balance Amt.</th>
                                         <th width="14%" style="text-align: right;"> Allocation Amt.</th>
                                         <th width="6%" style="text-align: right;">All <input onchange="checkAllCheckBox(this);" type="checkbox" /></th>
                                     </tr>
                                     @forelse ($claimBenificiaryList as $claimBenificiaryList)
                                     <tr>
                                         <td width="5%"> {{$loop->iteration}}
                                             <input type="hidden" id="fund_id" name="fund_id" value="{{$claimBenificiaryList->Fund_Id}}">
                                             <input type="hidden" id="scheme_id" name="scheme_id" value="{{$claimBenificiaryList->Scheme_Id}}">
                                         </td>
                                         <td width="10%"> {{$claimBenificiaryList->Claim_Id}} </td>
                                         <td style="width:21%;"> {{$claimBenificiaryList->Benificiary_Name}} </td>
                                         <!-- <td> {{$claimBenificiaryList->Scheme_Name}} </td> -->
                                         <td width="10%"> {{ date('d-M-Y', strtotime($claimBenificiaryList->Claim_From_Date)) }}</td>
                                         <td width="10%"> {{ date('d-M-Y', strtotime($claimBenificiaryList->Claim_To_Date)) }}</td>
                                         <td width="12%" class="amount" style="text-align: right;"> {{$claimBenificiaryList->Claim_Amount}} </td>
                                         <td width="12%" class="amount" style="text-align: right;"> {{$claimBenificiaryList->Claim_Balance_Amount}} </td>
                                         <td width="14%" style="text-align: right;"> <input class="form-control" type="text" id="allocated_amount{{$claimBenificiaryList->Pkid}}" name="allocated_amount{{$claimBenificiaryList->Pkid}}" onkeypress="return isNumber(event)" onkeyup="amountValidation(this.id)" /></td>
                                         <td width="6%" style="text-align: right;"> <input class="checkbox" data-id="{{$claimBenificiaryList->Pkid}}" type="checkbox" name="check_id" value="{{$claimBenificiaryList->Pkid}}" /> </td>
                                     </tr>
                                     @empty
                                     <tr>
                                         <td colspan="9" align="center">No Records Found !!</td>
                                     </tr>
                                     @endforelse
                                     <tr>
                                         <td colspan="9" align="center">
                                             <button type="button" class="btn btn-primary btn-fw" onclick="fnSaveFundAllocation('{{ url('save-fund-allocation') }}', 'addFundAllocationForm','afterSaveAllocation','{{$Fund_Id}}','{{$Scheme_Id}}');">
                                                 <i class="mdi mdi-content-save"></i>Save</button>
                                             <!-- <button type="button" class="btn btn-secondary btn-fw">
                        <i class="mdi mdi-account-check"></i>Submit for Approval</button> -->
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
 <!-- show the allocated fund of a selected scheme and fund -->
 <div class="row">
     <div class="col-lg-12 grid-margin">
         <div class="card">
             <div class="card-body">
                 <div class="table-responsive">
                     <div class="table-responsive">
                         <table style="width:100%">
                             <tr>
                                 <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Benificiary List:
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="2">
                                     <hr>
                                 </td>
                             </tr>
                         </table>
                         <form method="POST" id="listOfClaimAllocationForm">
                             <div id="listOfClaimAllocation">
                                 @php $counter=0; @endphp
                                 @php $Pkid=''; @endphp
                                 <table class="table1 table-striped" width="100%">
                                     <tbody>
                                         <tr>
                                             <th width="5%"> #</th>
                                             <th width="10%"> Claim ID </th>
                                             <th style="width:25%;"> Benificiary</th>
                                             <th width="12%"> Senction Letter </th>
                                             <th width="12%"> Allocation Date</th>
                                             <th width="12%" style="text-align: right;"> Claim Amt.</th>
                                             <th width="14%" style="text-align: right;"> Allocation Amt.</th>
                                             <th width="8%" style="text-align: right;"> Action </th>
                                         </tr>
                                         @forelse ($allocatedBenificiaryList as $allocatedBenificiaryList)
                                         <tr>
                                             @php $Pkid=$allocatedBenificiaryList->Pkid; @endphp
                                             <td width="5%"> {{$loop->iteration}}</td>
                                             <td width="10%"> {{$allocatedBenificiaryList->Claim_Id}} </td>
                                             <td style="width:25%;"> {{$allocatedBenificiaryList->Benificiary_Name}} </td>
                                             <td width="12%"> {{$allocatedBenificiaryList->Sanction_Letter}} </td>
                                             <td width="12%"> {{ date('d-M-Y', strtotime($allocatedBenificiaryList->Record_Insert_Date)) }} </td>
                                             <td width="12%" class="amount" style="text-align: right;"> {{ number_format($allocatedBenificiaryList->Claim_Amount,2)}} </td>
                                             <td width="14%" class="amount" style="text-align: right;"> {{ number_format($allocatedBenificiaryList->Allocated_Amount,2)}} </td>
                                             <td width="8%" style="text-align: right;">
                                                 @if($allocatedBenificiaryList->Status_Id_Fk==1 or $allocatedBenificiaryList->Status_Id_Fk==3)
                                                 @php $counter=$loop->iteration; @endphp
                                                 <!-- <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$allocatedBenificiaryList->Allocation_Pk}},'{{ url('view-edit-benificiary') }}','appendSubsidyFund','EDT','Subsidy Fund');">
                                                            <i class="mdi mdi-grease-pencil"></i>Edit</button> -->
                                                 <a href="javascript:void(0);" onclick="deleteAllocation({{$allocatedBenificiaryList->Allocation_Pk}},'{{url('save-fund-allocation') }}','afterSaveAllocation')" class="btn btn-danger btn-sm deleteBtn"> Delete </a>
                                                 @else
                                                 <!-- <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$allocatedBenificiaryList->Allocation_Pk}},'{{ url('view-edit-benificiary') }}','appendSubsidyFund','EDT','Subsidy Fund');">
                                                            <i class="mdi mdi-grease-pencil"></i>Edit</button> -->
                                                 <button disabled type="button" class="btn btn-danger btn-sm" onclick="deleteAllocation({{$allocatedBenificiaryList->Allocation_Pk}},'{{url('save-fund-allocation') }}','afterSaveAllocation')">
                                                     <!-- <i class="mdi mdi mdi-archive"></i> -->
                                                     Delete
                                                 </button>
                                                 @endif
                                             </td>
                                         </tr>
                                         @empty
                                         <tr>
                                             <td colspan="8" align="center">No Records Found !!</td>
                                         </tr>
                                         @endforelse
                                         @if( $counter>0)
                                         <tr>
                                             <td colspan="8" class="text-center">
                                                 <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval({{$Pkid}},'{{ url('fund-allocation-approval') }}', 'listOfClaimAllocationForm','searchResult');">
                                                     <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                                             </td>
                                         </tr>
                                         @endif
                                     </tbody>
                                 </table>
                                 </tbody>
                                 </table>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>