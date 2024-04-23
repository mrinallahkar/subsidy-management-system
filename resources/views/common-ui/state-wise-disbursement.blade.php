<table class="table table-striped">
    <thead>
        <tr>
            <th width="5%"> # </th>
            <th width="25%"> State </th>
            <th width="15%" style="text-align: right;"> Claim Amount </th>
            <th width="15%" style="text-align: right;"> Disbursed </th>
            <th width="15%"> Percentage </th>
            <th width="20%"> Progress </th>
        </tr>
    </thead>
    <tbody>

        @forelse ($stateWiseDisbursement as $stateWiseDisbursement)
        @php $disbursementPC=round($stateWiseDisbursement->Disbursement_Amount/$stateWiseDisbursement->Allocated_Amount*100,3); @endphp
        <tr onclick="fnDashboardMenuNavigation('{{$stateWiseDisbursement->Pkid}}','{{url('report-ui.disbursement-report')}}');"  style="cursor: pointer;">
            <td class="font-weight-medium"> {{$loop->iteration}} </td>
            <td> {{$stateWiseDisbursement->State_Name}} </td>
            <td align="right"> {{round($stateWiseDisbursement->Allocated_Amount/10000000,4)}} Cr.</td>
            <td align="right">
                {{round($stateWiseDisbursement->Disbursement_Amount/10000000,4)}} Cr.
            </td>
            <td>
                {{$disbursementPC}} %
            </td>
            <td>
                <div class="progress">
                    @if($disbursementPC<'50') <div title="{{$disbursementPC}} %" class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: {{$disbursementPC}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                </div>
                @elseif ($disbursementPC>'50' && $disbursementPC<'70') <div title="{{$disbursementPC}} %" class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: {{$disbursementPC}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                    </div>
                    @else
                    <div title="{{$disbursementPC}} %" class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: {{$disbursementPC}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                    </div>
            </td>
            @empty
        <tr>
            <td colspan="6" align="center">No Records Found !!</td>
        </tr>
        @endforelse
    </tbody>
</table>