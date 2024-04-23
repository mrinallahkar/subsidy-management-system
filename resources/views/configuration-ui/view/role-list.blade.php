<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">List Of Roles:</span>
    </legend>

    <table class="table table-striped">
        <thead>
            <tr>
                <th> # </th>
                <th> Module Name </th>
                <th> Role Name </th>
                <th> Controller Path </th>
                <th> Status </th>
                <th style="text-align:right;"> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($role as $role)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{$role->Module_Name}} </td>
                <td> {{$role->Role_Name}} </td>
                <td> {{$role->Controller_Path}} </td>
                <td> {{$role->Status_Name}} </td>
                <td style="text-align:right;">
                    {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-action="view" class="btn btn-info btn-sm"> View </a> --}}
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$role->Pkid}}" data-action="edit" class="btn btn-dark btn-sm"> Edit </a>
                    <a href="javascript:void(0);" onclick="deletePost({{$role->Pkid}},'{{url('save-user') }}','roleSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
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