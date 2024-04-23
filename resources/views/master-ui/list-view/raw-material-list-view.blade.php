<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">List Of Raw Materials</span>
    </legend>
    <div id="rawContain">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Raw Material </th>
                    <th> Unit </th>
                    <th> Description </th>
                    <th> Status </th>
                    <th style="text-align:right;"> Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rawMaterials as $rawMaterials)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{$rawMaterials->Material_Name}} </td>
                    <td> {{$rawMaterials->Unit_Name}} </td>
                    <td> {{$rawMaterials->Description}} </td>
                    <td> {{$rawMaterials->Status_Name}} </td>
                    <td style="text-align:right;">
                        @if($rawMaterials->Status_Id==1 or $rawMaterials->Status_Id==3)
                        <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster({{$rawMaterials->Pkid}},'{{url('view-edit-material')}}','viewEditModal',this,'EDT','Raw Material');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                        <a href="javascript:void(0);" onclick="deletePost({{$rawMaterials->Pkid}},'{{url('add_raw_materials') }}','rawSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
                        @else
                        <button type="button" disabled data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster({{$rawMaterials->Pkid}},'{{url('view-edit-material')}}','viewEditModal',this,'EDT','Raw Material');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                        <button disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$rawMaterials->Pkid}},'{{url('add_raw_materials') }}','rawSearchResult')" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" align="center">No Records Found !!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</fieldset>