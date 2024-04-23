@foreach($schemeMasterUpdate as $schemeMasterUpdate)
<input type="hidden" id="id_hidden" name="id" value="{{$schemeMasterUpdate->Pkid}}" />
<table class="table table-striped">
    <tbody>
        <tr>
            <td><label for="name1">Subsidy Scheme Name<span class="text-danger">*</span></label></td>
            <td><label for="name1">Policy Name<span class="text-danger">*</span></label></td>
            <td><label for="name2">No. of Year <span class="text-danger">*</span></label></td>
        </tr>
        <tr>
            <td><input type="text" name="Scheme_Name" id="Scheme_Name" value="{{$schemeMasterUpdate->Scheme_Name}}" class="form-control"></td>
            <td>
                <select style="width:150px; text-align:left" name="Gov_policy" id="Gov_policy" class="btn btn-secondary dropdown-toggle">
                    <option value="">--Select--</option>
                    @foreach($govPolicy as $govPolicy)
                    <option value="{{$govPolicy->Pkid}}" {{$govPolicy->Pkid == $schemeMasterUpdate->Gov_policy  ? 'selected' : ''}}>{{$govPolicy->Policy_Name}}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" name="Year" id="Year" class="form-control" placeholder="10" value="{{$schemeMasterUpdate->Year ?? ''}}" onkeypress="return isNumber(event)" onkeyup="onlyNumber('Year')"></td>
        </tr>
        <tr>
            <td><label for="name2">Short Form <span class="text-danger">*</span></label></td>
            <td colspan="2"><label for="name2">Description <span class="text-danger"></span></label></td>
        </tr>
        <tr>
            <td>
                <select style="width:150px" name="Short_form" id="Short_form" class="btn btn-secondary dropdown-toggle">
                    <option value="">--Select--</option>
                    @foreach($schemShortName as $schemShortName)
                    <option value="{{$schemShortName->Pkid}}" {{$schemeMasterUpdate->Scheme_Short_Name_Id_Fk == $schemShortName->Pkid  ? 'selected' : ''}}>{{$schemShortName->Short_Name}}</option>
                    @endforeach
                </select>
            </td>
            <td colspan="2"><textarea name="Description" id="Description" class="form-control">{{$schemeMasterUpdate->Description}}</textarea></td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveSubsidy('{{ url('add_subsidy_master') }}', this,'subsidySearchResult');">
                    <i class="mdi mdi-content-save"></i>Update</button>
                <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$schemeMasterUpdate->Pkid}}','{{ url('scheme-master-approval') }}', this,'subsidySearchResult');">
                    <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                    <i class="mdi mdi-refresh"></i>Reset</button>
            </td>
        </tr>
    </tbody>
</table>
@endforeach