<table class="table table-striped">
    <thead>
        <tr>
            <th> <input onchange="checkAllCheckBox(this);" type="checkbox" /> All </th>
            <th> Disbursement ID </th>
            <th> Benificiary Name </th>
            <th> Instrument Date </th>
            <th> Disbursement Date </th>
            <th> Instrument No </th>
            <th style="text-align: right;"> Paid Amount </th>
            <!-- <th> Status </th> -->
            <th style="text-align:right;"> Action </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($disbursementDetailList as $disbursementDetailList)
        <tr>
            <td> <input type="checkbox" class="checkbox" name="check_id" data-id="{{$disbursementDetailList->Pkid}}" value="{{$disbursementDetailList->Pkid}}"></td>
            <td> {{$disbursementDetailList->Pkid}} </td>
            <td> {{$disbursementDetailList->Benificiary_Name}} </td>
            <td> {{date('d-M-Y', strtotime($disbursementDetailList->Instrument_Date))}} </td>
            <td>{{date('d-M-Y', strtotime($disbursementDetailList->Disbursement_Date))}} </td>
            <td> {{$disbursementDetailList->Instrument_No}} </td>
            <td align="right"> {{number_format($disbursementDetailList->Disbursement_Amount,2)}} </td>
            <td align="right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDisbursement" onclick="viewDisbursementModel('{{$disbursementDetailList->Pkid}}','{{$disbursementDetailList->Claim_Id_Pk}}','{{ url('view-disbursement-details-modal') }}','appendDisbursement','VIW','Disbursement Details','disbursementSearchResult');">
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