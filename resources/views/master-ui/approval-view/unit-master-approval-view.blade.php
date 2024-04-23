<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">List Of Unit Master</span>
    </legend>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th> # </th>
                <th> Unit Name </th>
                <th> Description </th>
                <th> Status</th>
                <th style="text-align:right;">Action <input onchange="checkAllCheckBox(this);" type="checkbox" /></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($unitMaster as $unitMaster)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{$unitMaster->Unit_Name}} </td>
                <td> {{$unitMaster->Description}} </td>
                <td> {{$unitMaster->Status_Name}} </td>
                <td style="text-align:right;">
                    <input type="checkbox" class="checkbox" name="check_id" data-id="{{$unitMaster->Pkid}}" value="{{$unitMaster->Pkid}}">
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