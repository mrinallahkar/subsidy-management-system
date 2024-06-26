@foreach ($bankMasterUpdate as $bankMasterUpdate)
<input type="hidden" id="id_hidden" name="id" value="{{$bankMasterUpdate->Pkid}}" />
<table class="table table-striped">
    <tbody>
        <tr>
            <td><label for="name1">Bank Name <span class="text-danger">*</span></label></td>
            <td><label for="name1">Account No. <span class="text-danger">*</span></label></td>
            <td><label for="name1">Branch <span class="text-danger">*</span></label></td>
        </tr>
        <tr>
            <td><input type="text" name="Bank_Name" id="Bank_Name" value="{{$bankMasterUpdate->Bank_Name}}" class="form-control"></td>
            <td><input type="text" name="Account_No" id="Account_No" value="{{$bankMasterUpdate->Account_No}}" class="form-control"></td>
            <td><input type="text" name="Branch_Name" id="Branch_Name" value="{{$bankMasterUpdate->Branch_Name}}" class="form-control"></td>
        </tr>
        <tr>
            <td><label for="name2">Subsidy Scheme <span class="text-danger">*</span></label></td>
            <td colspan="2"><label for="name1">Description <span class="text-danger"></span></label></td>
        </tr>
        <tr>
            <td>
                <select style="width:150px; text-align:left" name="Scheme_Id_Fk" id="Scheme_Id_Fk" class="btn btn-secondary dropdown-toggle">
                    <option value="">--Select--</option>
                    @foreach($subsidyMaster as $subsidyMaster)
                    <option value="{{$subsidyMaster->Pkid}}" {{$subsidyMaster->Pkid == $bankMasterUpdate->Scheme_Id_Fk  ? 'selected' : ''}}>{{$subsidyMaster->Scheme_Name}}</option>
                    @endforeach
                </select>
            </td>
            <td colspan="2"><textarea type="text" name="Description" id="Description" class="form-control">{{$bankMasterUpdate->Description}}</textarea></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveBank('{{ url('add_bank_master') }}', this,'bankSearchResult');">
                    <i class="mdi mdi-content-save"></i>Update</button>
                <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$bankMasterUpdate->Pkid}}','{{ url('bank-master-approval') }}', this,'bankSearchResult');">
                    <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                    <i class="mdi mdi-refresh"></i>Reset</button>
            </td>
        </tr>
    </tbody>
</table>
@endforeach