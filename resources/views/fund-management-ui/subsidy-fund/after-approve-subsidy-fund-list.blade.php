<table class="table table-striped">
    <thead>
        <tr>
            <th> <input onchange="checkAllCheckBox(this);" type="checkbox" /> All </th>
            <th> Sanction Letter </th>
            <th> Sanction Date </th>
            <th> Scheme </th>
            <th style="text-align: right;"> Sanction Amount </th>
            <th> Status </th>
            <th style="text-align: right;"> Action </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($subsidyFund as $subsidyFund)
        <tr>
            <td><input type="checkbox" class="checkbox" name="check_id" data-id="{{$subsidyFund->Pkid}}" value="{{$subsidyFund->Pkid}}"> </td>
            <td> {{$subsidyFund->Sanction_Letter}} </td>
            <td> {{$subsidyFund->Sanction_Date->format('d-M-Y')}} </td>
            <td> {{$subsidyFund->Scheme_Name}}</td>
            <td style="text-align: right;"> {{number_format($subsidyFund->Sanction_Amount,2)}} </td>
            <td> {{$subsidyFund->Status_Name}}</td>
            <td align="right"> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewSubsidy" onclick="viewModel({{$subsidyFund->Pkid}},'{{ url('view-edit-benificiary') }}','appendSubsidy','VIW','Subsidy Claim');">
                    <i class="mdi mdi-view-carousel"></i>View</button></td>
        </tr>
        @empty
        <tr>
            <td colspan="7" align="center">No Records Found !!</td>
        </tr>
        @endforelse
    </tbody>
</table>