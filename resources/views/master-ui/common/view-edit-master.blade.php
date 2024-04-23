<table class="table table-hover">
    <thead>
        <tr>
            <th> # </th>
            <th> Raw Material </th>
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
            <td> {{$rawMaterials->Description}} </td>
            <td> Created </td>
            <td style="text-align:right;">
                {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$rawMaterials->Pkid}}" data-title="{{$rawMaterials->Material_Name}}" data-description="{{$rawMaterials->Description}}" data-action="view" class="btn btn-info btn-sm"> View </a> --}}
                <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$rawMaterials->Pkid}}" data-title="{{$rawMaterials->Material_Name}}" data-description="{{$rawMaterials->Description}}" data-action="edit" class="btn btn-dark btn-sm"><i class="mdi mdi-grease-pencil"></i> Edit </a>
                <a href="javascript:void(0);" onclick="deletePost({{$rawMaterials->Pkid}},'{{url('add_raw_materials') }}','rawSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" align="center">No Records Found !!</td>
        </tr>
        @endforelse
    </tbody>
</table>