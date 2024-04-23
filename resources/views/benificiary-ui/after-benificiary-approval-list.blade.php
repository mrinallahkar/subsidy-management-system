 
<table  class="table table-striped">
    <thead>
        <tr>
            <th> <input onchange="checkAllCheckBox(this);" type="checkbox" /> All </th>
            <th> Beneficiary Name </th>
            <th> Subsidy Registration </th>
            <th> Financing Bank </th>
            <th> PAN </th>
            <th> Status </th>
            <th style="text-align:right;"> Action </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($benificiaryList as $benificiaryList)
        <tr>
            <!-- <td> {{$loop->iteration}} </td> -->
            <td> <input type="checkbox" class="checkbox" name="check_id" data-id="{{$benificiaryList->Pkid}}" value="{{$benificiaryList->Pkid}}"></td>
            <td> {{$benificiaryList->Benificiary_Name}} </td>
            <td> {{$benificiaryList->Subsidy_regn_no}} </td>
            <td> {{$benificiaryList->Bank_Acc_no}} </td>
            <td style="text-transform: uppercase;"> {{$benificiaryList->Pan_No}} </td>
            <td> {{$benificiaryList->Status_Name}} </td>
            <td align="right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','VIW','Benificiary','benificiarySearchResult');">
                    <i class="mdi mdi-view-carousel"></i>View</button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" align="center">No Records Found !!</td>
        </tr>
        @endforelse
    </tbody>
</table>