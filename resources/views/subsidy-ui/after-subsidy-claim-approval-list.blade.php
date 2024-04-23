<table  class="table table-striped">
    <thead>
        <tr>
            <th> <input onchange="checkAllCheckBox(this);" type="checkbox" /> All </th>
            <th> Benificiary Name </th>
            <th> Claim ID </th>
            <th> Subsidy Scheme </th>
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
            <!-- <td> {{$loop->iteration}} </td> -->
            <td> <input type="checkbox" class="checkbox" name="check_id" data-id="{{$smsClaimMaster->Pkid}}" value="{{$smsClaimMaster->Pkid}}"></td>
            <td> {{$smsClaimMaster->Benificiary_Name}} </td>
            <td> {{$smsClaimMaster->Claim_Id}} </td>
            <td> {{$smsClaimMaster->Scheme_Name}} </td>
            <td style="text-align: right;"> {{number_format($smsClaimMaster->Claim_Amount,2)}} </td>
            <td style="text-transform: uppercase;"> {{$smsClaimMaster->Pan_No}} </td>
            <td> {{$smsClaimMaster->State_Name}}</td>
            <td> {{$smsClaimMaster->Status_Name}}</td>
            <td style="text-align: right;">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$smsClaimMaster->Pkid}},'{{ url('view-edit-subsidy-claim') }}','appendSubsidy','VIW','Subsidy Claim','');">
                    <i class="mdi mdi-view-carousel"></i></button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" align="center">No Records Found !!</td>
        </tr>
        @endforelse
    </tbody>
</table>