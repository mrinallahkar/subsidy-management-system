<table id="example1" class="table table-striped">
    <thead>
        <tr>
            <th> <input onchange="checkAllCheckBox(this);" type="checkbox" /> All</th>
            <th> Scheme </th>
            <th> Sanction Letter </th>
            <th style="text-align:right;"> Sanction Amount </th>
            <th style="text-align:right;"> Allocated Amount </th>
            <th> Status </th>
            <th style="text-align:right;"> Action </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($fundAllocation as $fundAllocation)
        <tr>
            <td> <input type="checkbox" class="checkbox" name="check_id" data-id="{{$fundAllocation->Pkid}}" value="{{$fundAllocation->Pkid}}"></td>
            <td> {{$fundAllocation->Scheme_Name}} </td>
            <td> {{$fundAllocation->Sanction_Letter}} </td>
            <td align="right"> {{number_format($fundAllocation->Sanction_Amount,2)}}</td>
            <td align="right"> {{number_format($fundAllocation->Total_Allocated_Amount,2)}} </td>
            <td> {{$fundAllocation->Status_Name}}</td>
            <td align="right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$fundAllocation->Pkid}},'{{ url('view-edit-benificiary') }}','appendSubsidyFund','VIW','Subsidy Fund');">
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