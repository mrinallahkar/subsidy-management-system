@foreach ($unitMasterUpdate as $unitMasterUpdate)
<input type="hidden" id="id_hidden" name="id" value="{{$unitMasterUpdate->Pkid}}" />
<table class="table table-striped">
    <tbody>
        <tr>
            <td><label for="name1">Unit Name <span class="text-danger">*</span></label></td>
            <td><label for="name2">Description <span class="text-danger"></span></label></td>
        </tr>
        <tr>
            <td><input type="text" name="Unit_Name" id="Unit_Name" value="{{$unitMasterUpdate->Unit_Name}}" class="form-control"></td>
            <td><textarea type="text" name="Description" id="Description" class="form-control">{{$unitMasterUpdate->Description}}</textarea></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveUnit('{{ url('add_unit_master') }}',this,'unitSearchResult');">
                    <i class="mdi mdi-content-save"></i>Update</button>
                <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$unitMasterUpdate->Pkid}}','{{ url('unit-master-approval') }}', this,'unitSearchResult');">
                    <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                    <i class="mdi mdi-refresh"></i>Reset</button>
            </td>
        </tr>
    </tbody>
</table>
@endforeach