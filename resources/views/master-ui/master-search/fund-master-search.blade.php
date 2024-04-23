<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">Search Result</span>
    </legend>
    <table class="table table-hover">
        <thead>
            <tr>
                <th> # </th>
                <th> Fund Name </th>
                <th> Sanction Letter </th>
                <th> Sanction Date </th>
                <th> Sanction Amount </th>
                <th> Status </th>
                <th style="text-align:right;"> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fundMaster as $fundMaster)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <!-- <td> {{$fundMaster->Fund_Name}} </td> -->
                <td> {{$fundMaster->Sanction_Letter}} </td>
                <td> {{date('d-M-Y'), strtotime($fundMaster->Sanction_Date)}} </td>
                <td> {{$fundMaster->Sanction_Amount}} </td>
                <td> {{$fundMaster->Status_Name}} </td>
                <td style="text-align:right;">
                    @if($fundMaster->Status_Id==1 or $fundMaster->Status_Id==3)
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$fundMaster->Pkid}}" data-title="{{$fundMaster->Fund_Name}}" data-description="{{$fundMaster->Description}}" data-action="edit" class="btn btn-dark btn-sm"> Edit </a>
                    <a href="javascript:void(0);" onclick="deletePost({{$fundMaster->Pkid}},'{{url('add_fund_master') }}','funsSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
                    @else
                    <button disabled type="button" data-toggle="modal" data-target="#addPostModal" data-id="{{$fundMaster->Pkid}}" data-title="{{$fundMaster->Fund_Name}}" data-description="{{$fundMaster->Description}}" data-action="edit" class="btn btn-dark btn-sm">
                        Edit
                    </button>
                    <button disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$fundMaster->Pkid}},'{{url('add_fund_master') }}','funsSearchResult')" class="btn btn-danger btn-sm">
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