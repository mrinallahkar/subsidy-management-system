<form method="POST" id="listOfClaimAllocationForm">
    <div id="listOfClaimAllocation">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th> #</th>
                    <th> Claim ID </th>
                    <th> Benificiary</th>
                    <th> Scheme</th>
                    <th> Senction Letter </th>
                    <th> Claim Amt.</th>
                    <th> Allocation Amt.</th>
                    @if($mode!='VIW')
                    <th align="right"> Action </th>
                    @endif
                </tr>
                @forelse ($allocatedBenificiaryList as $allocatedBenificiaryList)
                <tr>
                    <td> {{$loop->iteration}}</td>
                    <td> {{$allocatedBenificiaryList->Claim_Id}} </td>
                    <td> {{$allocatedBenificiaryList->Benificiary_Name}} </td>
                    <td> {{$allocatedBenificiaryList->Scheme_Name}} </td>
                    <td> {{$allocatedBenificiaryList->Sanction_Letter}} </td>
                    <td class="amount"> {{ number_format($allocatedBenificiaryList->Claim_Amount,2)}} </td>
                    <td> {{ number_format($allocatedBenificiaryList->Allocated_Amount,2)}} </td>
                    @if($mode=='VIW')
                    @else
                    <td align="right">
                        @if($allocatedBenificiaryList->Status_Id_Fk==1 or $allocatedBenificiaryList->Status_Id_Fk==3)
                        <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$allocatedBenificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendSubsidyFund','EDT','Subsidy Fund');">
                            <i class="mdi mdi-grease-pencil"></i>Edit</button>
                        <a href="javascript:void(0);" onclick="deleteAllocation({{$allocatedBenificiaryList->Pkid}},'{{url('save-subsidy-fund') }}','searchResult')" class="btn btn-danger btn-sm"> Delete </a>
                        @else
                        <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$allocatedBenificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendSubsidyFund','EDT','Subsidy Fund');">
                            <i class="mdi mdi-grease-pencil"></i>Edit</button>
                        <button disabled type="button" class="btn btn-danger btn-sm" onclick="deleteAllocation({{$allocatedBenificiaryList->Pkid}},'{{url('save-subsidy-fund') }}','searchResult')">
                            <!-- <i class="mdi mdi mdi-archive"></i> -->
                            Delete
                        </button>
                        @endif
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="8" align="center">No Records Found !!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</form>