<table class="table table-striped">
    <thead>
        <tr>
            <th width="5%"> # </th>
            <th width="25%"> State </th>
            <th width="15%" style="text-align: right;"> Claim Amount </th>
            <th width="15%" style="text-align: right;"> Allocation Amount </th>
            <th width="15%"> Precentage </th>
            <th width="20%"> Progress </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($stateWiseClaim as $stateWiseClaim)
        @php $allocationPC=round($stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100,3); @endphp
        <tr onclick="fnDashboardMenuNavigation('{{$stateWiseClaim->Pkid}}','{{url('report-ui.claim-report')}}');"  style="cursor: pointer;">
            <td class="font-weight-medium"> {{$loop->iteration}} </td>
            <td> {{$stateWiseClaim->State_Name}} </td>
            <td align="right"> {{round($stateWiseClaim->Claim/10000000,4)}} Cr.</td>
            <td align="right">
                {{round($stateWiseClaim->Allocated_Amount/10000000,4)}} Cr.
            </td>
            <td>{{$allocationPC}} %</td>
            <td>
                <div class="progress">
                    @if($allocationPC<'50') <div title="{{round($stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100)}} %" class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: {{$stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                </div>
                @elseif ($allocationPC>'50' && $allocationPC<'70') <div title="{{round($stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100)}} %" class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: {{$stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                    </div>
                    @else
                    <div title="{{round($stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100)}} %" class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: {{$stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                    </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" align="center">No Records Found !!</td>
        </tr>
        @endforelse
    </tbody>
</table>