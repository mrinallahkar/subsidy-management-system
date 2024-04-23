<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">List Of Bank Master</span>
    </legend>

    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th> # </th>
                <th> Bank Name </th>
                <th> Account No. </th>
                <th> Branch </th>
                <th> Scheme </th>
                <th> Status </th>
                <th style="text-align:right;">Action <input onchange="checkAllCheckBox(this);" type="checkbox" /></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bankMaster as $bankMaster)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{$bankMaster->Bank_Name}} </td>
                <td> {{$bankMaster->Account_No}} </td>
                <td> {{$bankMaster->Branch_Name}} </td>
                <td> {{$bankMaster->Scheme_Name}} </td>
                <td> {{$bankMaster->Status_Name}} </td>
                <td style="text-align:right;">
                    <input type="checkbox" class="checkbox" name="check_id" data-id="{{$bankMaster->Pkid}}" value="{{$bankMaster->Pkid}}">
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" align="center">No Records Found !!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</fieldset>