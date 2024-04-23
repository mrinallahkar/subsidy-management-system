
    @foreach ($rawMaterialsUpdate as $rawMaterialsUpdate)

    <input type="hidden" id="id_hidden" name="id" value="{{$rawMaterialsUpdate->Pkid}}" />
    <table class="table table-striped">
        <tbody>
            <tr>
                <td><label for="name1">Material Name <span class="text-danger">*</span></label></td>
                <td><label for="name2">Unit <span class="text-danger">*</span></label></td>
            </tr>
            <tr>
                <td><input type="text" name="Material_Name" id="Material_Name" value="{{$rawMaterialsUpdate->Material_Name}}" class="form-control"></td>
                <td>
                    <select style="width:150px; text-align:left" name="Unit_Id_Fk" id="Unit_Id_Fk" class="btn btn-secondary dropdown-toggle" style="width: 50%;">
                        <option value="">--Select--</option>
                        @foreach($unitMaster as $unitMaster)
                        <option value="{{$unitMaster->Pkid}}" {{$unitMaster->Pkid == $rawMaterialsUpdate->Unit_Id_Fk  ? 'selected' : ''}}>{{$unitMaster->Unit_Name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><label for="name2">Description <span class="text-danger"></span></label></td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="Description" id="Description" class="form-control">{{$rawMaterialsUpdate->Description}}</textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveRawMaterial('{{ url('add_raw_materials') }}', this,'rawSearchResult','id_hidden','Material_Name','Description');">
                        <i class="mdi mdi-content-save"></i>Update</button>
                    <button type="button" class="btn btn-success btn-fw  btn-fw" id="approvalBtn" onclick="CmnApproval('{{$rawMaterialsUpdate->Pkid}}','{{ url('raw-material-approval') }}', this,'rawSearchResult');">
                        <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                    <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                        <i class="mdi mdi-refresh"></i>Reset</button>
                </td>
            </tr>
        </tbody>
    </table>

    @endforeach
