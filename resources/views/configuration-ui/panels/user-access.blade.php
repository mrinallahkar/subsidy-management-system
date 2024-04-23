<div class="card-header" id="headingThree">
    <h2 class="mb-0">
        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-plus"></i>Users Access</button>
    </h2>
</div>
<div style="border-left:1px solid #e6e6e6;border-right:  1px solid #e6e6e6; border-bottom: 1px solid #e6e6e6; border-radius:0 0px 5px 5px " id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
    <div class="card-body" style="margin-top: -15px;">
        <div class="container mt-3">
            <!-- Start Tabs -->
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs dragscroll horizontal">
                    <li class="nav-item">
                        <button class="nav-link active" data-toggle="tab" href="#tabE" onclick="search('{{url('show-access') }}','accessSearchResult');"><i class="mdi mdi mdi-plus"></i>Add Access Control</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-toggle="tab" href="#tabF" onclick="search('{{url('approval-access') }}','accessTab');"><i class="mdi mdi-account-check"></i>Approve Access Control</button>
                    </li>
                </ul>
            </div>
            <span class="nav-tabs-wrapper-border" role="presentation"></span>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tabE">
                    <br>
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: right;">
                                <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#modal" onclick="addModal('{{url('modal.create-access')}}','contModal','accessForm');">
                                    <i class="mdi mdi mdi-plus"></i>Add Access Control</button>
                            </td>
                        </tr>
                    </table>
                    <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                        <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                            <span class="menu-title" style="font-weight: bold;">Search Access Control</span>
                        </legend>
                        <div class="table-responsive">
                            <form method="POST" id="searchAccessForm">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td> User Name</td>
                                            <td> Module Name</td>
                                            <td> Role Name</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select style="width:165px; text-align:left" id="user_id" name="user_id" class="btn btn-secondary dropdown-toggle">
                                                    <option value="">--Select--</option>
                                                    @foreach($userMaster as $userMaster)
                                                    <option value="{{$userMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$userMaster->User_Id}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select style="width:165px; text-align:left" id="module" name="module" class="btn btn-secondary dropdown-toggle" onchange="getDistrictPerState(this.value,'#role_id','{{url('fill-role-onChange')}}');">
                                                    <option value="">--Select--</option>
                                                    @foreach($moduleMaster as $moduleMaster)
                                                    <option value="{{$moduleMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$moduleMaster->Module_Name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select style="width:165px; text-align:left" id="role_id" name="role_id" class="btn btn-secondary dropdown-toggle">
                                                    <option value="">--Select--</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">
                                                <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('access-master-search')}}','accessSearchResult','searchAccessForm','search_module_name');">
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

                    <div id="accessSearchResult">
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">List of Access Control</span>
                            </legend>
                            <div id=accessContain>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> Role Name</th>
                                            <th> Module Name</th>
                                            <th> Controller Name</th>
                                            <th> User Name</th>
                                            <th>Status</th>
                                            <th style="text-align:right;"> Action </th>
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
                                                {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-action="view" class="btn btn-info btn-sm"> View </a> --}}
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$accessControl->Pkid}}" data-action="edit" class="btn btn-dark btn-sm"> Edit </a>
                                                <a href="javascript:void(0);" onclick="deletePost({{$accessControl->Pkid}},'{{url('save-access') }}','accessSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" align="center">No Records Found !!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </fieldset>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabF">
                    <br>
                    <form id="accessApprovalForm" method="POST">
                        <div id="accessTab">
                        </div>
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">Approval</span>
                            </legend>
                            <table class="table table-striped">
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
                                        <button type="button" class="btn btn-success btn-fw" onclick="fnCmnApproved('{{ url('approve-access') }}', 'accessApprovalForm','accessTab');">
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