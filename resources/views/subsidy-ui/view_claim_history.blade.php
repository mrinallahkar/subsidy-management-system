<form method="POST" id="viewClaimHistory">
  
    <!-- View Part -->
    <table class="table table-hover text-left" style="border: 1px solid #ababab;">
        <tbody>
            @foreach ($claimHistoryList as $claimHistoryList)
            <tr style="font-size:10px;">
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim ID </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{$claimHistoryList->Claim_Id}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim Amount </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{number_format($claimHistoryList->Claim_Amount,2)}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Benificiary </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{$claimHistoryList->Benificiary_Name}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Allocation Amount </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{number_format($claimHistoryList->Allocated_Amount,2)}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Disbursed Amount </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{number_format($claimHistoryList->Disbursement_Amount,2)}}</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Disbursed Date </label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">@if(!empty($claimHistoryList->Disbursement_Date)){{date('d M Y', strtotime($claimHistoryList->Disbursement_Date))}} @else - - - - -@endif</label>
                    </div>
                </td>
                <td>
                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Pending Amount</label>
                    <div class="col-sm-10">
                        <label for="" class="form-control-label font-weight-small">{{number_format($claimHistoryList->Claim_Amount-$claimHistoryList->Disbursement_Amount,2)}}</label>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>