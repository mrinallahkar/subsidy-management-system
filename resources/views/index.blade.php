@extends('layout.master')
@section('title') Posts Listing @endsection
@section('content')

<style>
    svg.w-5.h-5 {
        width: 25px !important;
    }

    span.relative.z-0.inline-flex.shadow-sm.rounded-md {
        float: right !important;
    }
</style>

<div class="col-xl-6">
    <div id="result"></div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td>
                                <label>Select 2</label>
                                <select style="width: 12em" name="field2" id="field2" multiple multiselect-search="true" onchange="here();" multiselect-select-all="true" multiselect-max-items="3">
                                    <option>Abarth</option>
                                    <option>Alfa Romeo</option>
                                    <option>Aston Martin</option>
                                    <option>Audi</option>
                                    <option>Bentley</option>
                                    <option>BMW</option>
                                    <option>Bugatti</option>
                                    <option>Cadillac</option>
                                    <option>Chevrolet</option>
                                    <option>Chrysler</option>
                                    <option>Citroën</option>
                                </select>
                            </td>
                            <td class="card-title" style="text-align: right;">
                                <a href="javascript:void(0);" data-target="#addPostModal" data-toggle="modal" class="btn btn-success"> Add New </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dialogNewMessage">
                                    <i class="fas fa-plus-circle mr-1"></i>New
                                </button>

                                <div class="row">
                                    <div class="col">
                                        <select id="Country" class="mdb-select md-form colorful-select dropdown-danger" multiple>
                                            <option value="" disabled selected>Choose your country</option>
                                            <option value="1">USA</option>
                                            <option value="2">Germany</option>
                                            <option value="3">France</option>
                                            <option value="3">Poland</option>
                                            <option value="3">Japan</option>
                                        </select>
                                        <label class="mdb-main-label" for="Country">Label for Country</label>
                                        <button class="btn-save btn btn-danger btn-sm">Save</button>
                                    </div>
                                </div>


                                <div class="modal" id="dialogNewMessage" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title w-100 font-weight-bold py-2"><strong><span>New Message</span></strong></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <select style="width: 20em;" id="Users" class="mdb-select md-form colorful-select dropdown-danger" multiple>
                                                            <option value="" disabled selected>Choose your country</option>
                                                            <option value="1">USA</option>
                                                            <option value="2">Germany</option>
                                                            <option value="3">France</option>
                                                            <option value="3">Poland</option>
                                                            <option value="3">Japan</option>
                                                        </select>
                                                        <label class="mdb-main-label" for="Users">Label example</label>
                                                        <button class="btn-save btn btn-danger btn-sm">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                    <div id="contain">
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
                                        <a href="javascript:void(0);" onclick="deletePost({{$post->id}},'post','contain')" class="btn btn-danger btn-sm"> Delete </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('master-ui.panels.view-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Create post modal -->
<div class="modal fade" id="addPostModal" role="dialog" aria-labelledby="addPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPostModalLabel"> Create Post </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> × </span>
                </button>
            </div>
            <div class="result"></div>

            <div class="modal-body">
                <form method="POST" id="postForm">
                    <input type="hidden" id="id_hidden" name="id" />
                    <div class="form-group">
                        <label for="title"> Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title"> Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title"> Select 2 <span class="text-danger">*</span></label><br>
                        <select style="width: 170px; height:40px;" name="select2insidemodal" id="select2insidemodal" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3">
                            <option>Abarth</option>
                            <option>Alfa Romeo</option>
                            <option>Aston Martin</option>
                            <option>Audi</option>
                            <option>Bentley</option>
                            <option>BMW</option>
                            <option>Bugatti</option>
                            <option>Cadillac</option>
                            <option>Chevrolet</option>
                            <option>Chrysler</option>
                            <option>Citroën</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="createBtn" class="btn btn-primary" onclick="updatePost('{{ url('post') }}', 'postForm');"> Update </button>
            </div>

        </div>
    </div>
</div>

<script>
    $('.select2insidemodal').select2({
        dropdownParent: $('#myModal'),
        width: '100%',
        position: fixed
    });

    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
    $('#dialogNewMessage')
        .on('show.bs.modal', function(event) {
            //$('#Users').val("").trigger('change');
        })
</script>
@endsection