<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">List Of Roles:</span>
    </legend>

    <table class="table table-hover">
        <thead>
            <tr>
                <th> # </th>
                <th> Module Name </th>
                <th> Role Name </th>
                <th> Controller Path </th>
                <th> Status </th>
                <th style="text-align:right;">Action <input onchange="checkAllCheckBox(this);" type="checkbox" /></th>
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
                    <input type="checkbox" class="checkbox" name="check_id" data-id="{{$role->Pkid}}" value="{{$role->Pkid}}">
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