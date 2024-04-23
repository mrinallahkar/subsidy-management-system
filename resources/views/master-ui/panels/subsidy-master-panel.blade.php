<div class="card-header" id="headingSix">
    <h2 class="mb-0">
        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseSix"><i class="fa fa-plus"></i>Subsidy Scheme</button>
    </h2>
</div>
<div style="border-left:1px solid #e6e6e6;border-right:  1px solid #e6e6e6; border-bottom: 1px solid #e6e6e6; border-radius:0 0px 5px 5px " id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
    <div class="card-body" style="margin-top: -15px;">
        <div class="container mt-3">
            <!-- Start Tabs -->
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs dragscroll horizontal">
                    <li class="nav-item">
                        <button class="nav-link active" data-toggle="tab" href="#tabK" onclick="search('{{url('show_subsidy_master') }}','subsidySearchResult');"><i class="mdi mdi mdi-plus"></i>Add Subsidy Master</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-toggle="tab" href="#tabL" onclick="search('{{url('approval_subsidy_master') }}','subsidyTab');"><i class="mdi mdi-account-check"></i>Approve Subsidy Master</button>
                    </li>
                </ul>
            </div>
            <span class="nav-tabs-wrapper-border" role="presentation"></span>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tabK">
                    <br>
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: right;">
                                <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#modal" onclick="addModal('modal.subsidy-master','contModal','subsidyForm');">
                                    <i class="mdi mdi mdi-plus"></i>Add Subsidy Master</button>
                            </td>
                        </tr>
                    </table>
                    <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                        <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                            <span class="menu-title" style="font-weight: bold;">Search Subsidy Master</span>
                        </legend>
                        <div class="table-responsive">
                            <form method="POST" id="searchSubsidyForm">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td> Subsidy Master :</td>
                                            <td>
                                                Status
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <input class="form-control" type="text" name="scheme_name" id="scheme_name" /></td>
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
                                                <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('sunsidy-master-search')}}','subsidySearchResult','searchSubsidyForm','scheme_name');">
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
                    <div id="subsidySearchResult">
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">List Of Subsidy Master</span>
                            </legend>
                            <div id="subsidyContain">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Subsidy Name </th>
                                            <th> Gov. Policy </th>
                                            <th> Year </th>
                                            <th> Description </th>
                                            <th> Status</th>
                                            <th style="text-align:right;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($schemeMaster as $schemeMaster)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{$schemeMaster->Scheme_Name}} </td>
                                            <td> {{$schemeMaster->Policy_Name}} </td>
                                            <td> {{$schemeMaster->Year}} </td>
                                            <td> {{$schemeMaster->Description}} </td>
                                            <td> {{$schemeMaster->Status_Name}} </td>
                                            <td style="text-align:right;">
                                                @if($schemeMaster->Status_Id==1 or $schemeMaster->Status_Id==3)
                                                <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster('{{$schemeMaster->Pkid}}','{{url('view-edit-scheme-master')}}','viewEditModal','rawForm','EDT','Scheme Master');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                                                <a href="javascript:void(0);" onclick="deletePost('{{$schemeMaster->Pkid}}','{{url('add_subsidy_master') }}','subsidySearchResult')" class="btn btn-danger btn-sm"> Delete </a>
                                                @else
                                                <button type="button" disabled data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster('{{$schemeMaster->Pkid}}','{{url('view-edit-scheme-master')}}','viewEditModal','rawForm','EDT','Scheme Master');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                                                <button disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost('{{$schemeMaster->Pkid}}','{{url('add_subsidy_master') }}','subsidySearchResult')" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" align="center">No Records Found !!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabL">
                    <br>
                    <form id="subsidyApprovalForm" method="POST">
                        <div id="subsidyTab">

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
                                        <button type="button" class="btn btn-success btn-fw" onclick="fnCmnApproved('{{ url('approve-scheme') }}', 'subsidyApprovalForm','subsidyTab');">
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