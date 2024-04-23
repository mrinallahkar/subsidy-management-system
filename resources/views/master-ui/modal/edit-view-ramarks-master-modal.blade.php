@foreach ($reasonMasterUpdate as $reasonMasterUpdate)
<input type="hidden" id="id_hidden" name="id" value="{{$reasonMasterUpdate->Pkid}}" />
<table class="table table-striped">
    <tbody>
        <tr>
            <td><label for="name1">Remarks<span class="text-danger">*</span></label></td>
            <td><label for="name2">Description <span class="text-danger"></span></label></td>
        </tr>
        <tr>
            <td><input type="text" name="Reason_Details" id="Reason_Details" value="{{$reasonMasterUpdate->Reason_Details}}" class="form-control"></td>
            <td><textarea name="Description" id="Description" class="form-control">{{$reasonMasterUpdate->Description}}</textarea></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveRemarks('{{ url('add_remarks_master') }}', this,'remarksSearchResult');">
                    <i class="mdi mdi-content-save"></i>Update</button>
                <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$reasonMasterUpdate->Pkid}}','{{ url('remarks-master-approval') }}', this,'remarksSearchResult');">
                    <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                    <i class="mdi mdi-refresh"></i>Reset</button>
            </td>
        </tr>
    </tbody>
</table>
@endforeach