<div class="card-header" id="headingTwo">
    <h2 class="mb-0">
        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i>Roles</button>
    </h2>
</div>
<div style="border-left:1px solid #e6e6e6;border-right:  1px solid #e6e6e6; border-bottom: 1px solid #e6e6e6; border-radius:0 0px 5px 5px " id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
    <div class="card-body" style="margin-top: -15px;">
        <div class="container mt-3">
            <!-- Start Tabs -->
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs dragscroll horizontal">
                    <li class="nav-item">
                        <button class="nav-link active" data-toggle="tab" href="#tabC" onclick="search('{{url('show-role') }}','roleSearchResult');"><i class="mdi mdi mdi-plus"></i>Add Role</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-toggle="tab" href="#tabD" onclick="search('{{url('approval-role') }}','roleTab');"><i class="mdi mdi-account-check"></i>Approve Role</button>
                    </li>
                </ul>
            </div>
            <span class="nav-tabs-wrapper-border" role="presentation"></span>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tabC">
                    <br>
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: right;">
                                <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#modal" onclick="addModal('{{url('modal.create-role')}}','contModal','roleForm');">
                                    <i class="mdi mdi mdi-plus"></i>Add Role</button>
                            </td>
                        </tr>
                    </table>
                    <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                        <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                            <span class="menu-title" style="font-weight: bold;">Search Role</span>
                        </legend>
                        <div class="table-responsive">
                            <form method="POST" id="searchRoleForm">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td> Module Name :</td>
                                            <td> Role Name :</td>
                                            <td>
                                                Status
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select style="width:165px; text-align:left" id="module" name="module" class="btn btn-secondary dropdown-toggle">
                                                    <option value="">--Select--</option>
                                                    @foreach($moduleMaster as $moduleMaster)
                                                    <option value="{{$moduleMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$moduleMaster->Module_Name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td> <input class="form-control" type="text" id="search_role_name" name="search_role_name" /></td>
                                            <td>
                                                <select style="width:50%; text-align:left" name="status_id" id="status_id" class="btn btn-secondary dropdown-toggle">
                                                    <option value="">--Select--</option>
                                                    @foreach($statusMaster as $statusMaster)
                                                    <option value="{{$statusMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$statusMaster->Status_Name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">
                                                <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('role-master-search')}}','roleSearchResult','searchRoleForm','search_role_name');">
                                                    <i class="mdi mdi-magnify"></i>Search</button>
                                                <button type="reset" class="btn btn-light btn-fw">
                                                    <i class="mdi mdi-refresh"></i>Reset</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </fieldset>

                    <!-- Search Result-->

                    <div id="roleSearchResult">
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">List Of Roles</span>
                            </legend>
                            <div id=roleContain>
                                <table id="" class="table table-striped">
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
                                                <a href="javascript:void(0);" onclick="deletePost({{$role->Pkid}},'{{url('save-role') }}','roleSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" align="center">No Records Found !!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </fieldset>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabD">
                    <br>
                    <form id="roleApprovalForm" method="POST">
                        <div id="roleTab">
                        </div>
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">Approval</span>
                            </legend>
                            <table id="" class="table table-striped">
                                <tr>
                                    <td colspan="2" class="font-weight-medium">Status</td>
                                    <td class="font-weight-medium">Approval Date</td>
                                    <td colspan="5" class="font-weight-medium">Remarks</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="font-weight-medium">
                                        <select style="width:150px; text-align:left" name="decision" id="decision" class="btn btn-secondary dropdown-toggle">
                                            <option value="">--Select--</option>
                                            @foreach($approvalStatusMaster as $approvalStatusMaster)
                                            <option value="{{$approvalStatusMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$approvalStatusMaster->Status_Name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="font-weight-medium"><input type="date" class="form-control" id="approval_date" name="approval_date" /> </td>
                                    <td colspan="5" class="font-weight-medium"><textarea class="form-control" id="remarks" name="remarks"></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="center">
                                        <button type="button" class="btn btn-success btn-fw" onclick="fnCmnApproved('{{ url('approve-role') }}', 'roleApprovalForm','roleTab');">
                                            <i class="mdi mdi-account-check"></i>Approve</button>
                                        <button type="button" class="btn btn-light btn-fw">
                                            <i class="mdi mdi-refresh"></i>Reset</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>
            <!-- End Tabs -->
        </div>
    </div>
</div>

<link href="{{ asset('assete/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>