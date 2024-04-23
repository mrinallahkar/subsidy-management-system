<fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
    <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
        <span class="menu-title" style="font-weight: bold;">List Of Users</span>
    </legend>

    <table class="table table-hover">
        <thead>
            <tr>
                <th> # </th>
                <th> User Name </th>
                <th> Phone No. </th>
                <th> Email </th>
                <th> Status </th>
                <th style="text-align:right;"> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user as $user)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{$user->User_Id}} </td>
                <td> {{$user->Primary_Mobile_No}} </td>
                <td> {{$user->User_Email}} </td>
                <td> {{$user->Status_Name}} </td>
                <td style="text-align:right;">
                    {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-action="view" class="btn btn-info btn-sm"> View </a> --}}
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$user->Pkid}}" data-action="edit" class="btn btn-dark btn-sm"> Edit </a>
                    <a href="javascript:void(0);" onclick="deletePost({{$user->Pkid}},'{{url('save-user') }}','userSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
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