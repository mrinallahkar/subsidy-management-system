<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">Search Result</span>
    </legend>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> # </th>
                <th> Remarks Master </th>
                <th> Description </th>
                <th> Status </th>
                <th style="text-align:right;"> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reasonMaster as $reasonMaster)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{$reasonMaster->Reason_Details}} </td>
                <td> {{$reasonMaster->Description}} </td>
                <td> {{$reasonMaster->Status_Name}} </td>
                <td style="text-align:right;">
                    @if($reasonMaster->Status_Id==1 or $reasonMaster->Status_Id==3)
                    <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster('{{$reasonMaster->Pkid}}','{{url('view-edit-remarks-master')}}','viewEditModal',this,'EDT','Remarks Master');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                    <a href="javascript:void(0);" onclick="deletePost('{{$reasonMaster->Pkid}}','{{url('add_remarks_master') }}','remarksSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
                    @else
                    <button type="button" disabled data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster('{{$reasonMaster->Pkid}}','{{url('view-edit-remarks-master')}}','viewEditModal',this,'EDT','Remarks Master');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                    <button disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost('{{$reasonMaster->Pkid}}','{{url('add_remarks_master') }}','remarksSearchResult')" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" align="center">No Records Found !!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</fieldset>