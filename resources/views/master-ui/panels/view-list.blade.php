<table class="table table-striped mt-4">
    <thead>
        <th> List Id </th>
        <th> Title </th>
        <th> Description </th>
        <th> Action </th>
    </thead>

    <tbody>
       @foreach ($posts as $post)
        <tr>
            <td> {{$post->id}} </td>
            <td> {{$post->title}} </td>
            <td> {{$post->description}} </td>
            <td>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$post->id}}" data-title="{{$post->title}}" data-description="{{$post->description}}" data-action="view" class="btn btn-info btn-sm"> View </a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$post->id}}" data-title="{{$post->title}}" data-description="{{$post->description}}" data-action="edit" class="btn btn-success btn-sm"> Edit </a>
                <a href="javascript:void(0);" onclick="deletePost({{$post->id}})" class="btn btn-danger btn-sm"> Delete </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>