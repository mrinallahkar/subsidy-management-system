<form method="POST" id="fundAllocationForm">
    <table class="table table-striped">
        <tbody>
            <tr>
                <td> #</td>
                <td> Benificiary</td>
                <td> Scheme</td>
                <td> From Date</td>
                <td> To Date</td>
                <td> Claimed Amt.</td>
                <td> Allocation Amt.</td>
                <td><input type="checkbox" id="checkedAll" name="checkedAll" onclick="CheckAll();" /> All</td>
            </tr>
            @forelse ($claimBenificiaryList as $claimBenificiaryList)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$claimBenificiaryList->Benificiary_Name}} </td>
                <td> {{$claimBenificiaryList->Scheme_Name}} </td>
                <td> {{ date('d-M-y', strtotime($claimBenificiaryList->Claim_From_Date)) }}</td>
                <td> {{ date('d-M-y', strtotime($claimBenificiaryList->Claim_From_Date)) }}</td>
                <td class="amount"> {{ $claimBenificiaryList->Claim_Amount}}</td>
                <td> <input class="clJournal form-control" type="text" id="allocate{{$claimBenificiaryList->Pkid}}" name="allocate{{$claimBenificiaryList->Pkid}}" onkeypress="return isNumber(event)" onkeyup="amountValidation(this.id)" /></td>
                <td> <input type="checkbox" id="select{{$claimBenificiaryList->Pkid}}" name="select{{$claimBenificiaryList->Pkid}}" /> </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" align="center">No Records Found !!</td>
            </tr>
            @endforelse
            <tr>
                <td colspan="8" align="center">
                    <button type="button" class="btn btn-primary btn-fw" onclick="SaveSubsidyFunds('{{ url('save-fund-allocation') }}', 'fundAllocationForm','appendFundAllocation');">
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