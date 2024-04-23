<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">List Of Access Controls:</span>
    </legend>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th> Role Name</th>
                <th> Module Name</th>
                <th> Controller Name</th>
                <th> User Name</th>
                <th>Status</th>
                <th style="text-align:right;">Action <input onchange="checkAllCheckBox(this);" type="checkbox" /></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($accessControl as $accessControl)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{$accessControl->Role_Name}} </td>
                <td> {{$accessControl->Module_Name}} </td>
                <td> {{$accessControl->Controller_Path}} </td>
                <td> {{$accessControl->User_Id}} </td>
                <td> {{$accessControl->Status_Name}} </td>
                <td style="text-align:right;">
                    <input type="checkbox" class="checkbox" name="check_id" data-id="{{$accessControl->Pkid}}" value="{{$accessControl->Pkid}}">
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