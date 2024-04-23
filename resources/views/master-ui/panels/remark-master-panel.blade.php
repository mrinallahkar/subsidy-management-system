<div class="card-header" id="headingFive">
    <h2 class="mb-0">
        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseFive"><i class="fa fa-plus"></i>Remarks Master</button>
    </h2>
</div>
<div style="border-left:1px solid #e6e6e6;border-right:  1px solid #e6e6e6; border-bottom: 1px solid #e6e6e6; border-radius:0 0px 5px 5px " id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
    <div class="card-body" style="margin-top: -15px;">
        <div class="container mt-3">
            <!-- Start Tabs -->
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs dragscroll horizontal">
                    <li class="nav-item">
                        <button class="nav-link active" data-toggle="tab" href="#tabI" onclick="search('{{url('show_remarks_master') }}','remarksSearchResult');"><i class="mdi mdi mdi-plus"></i>Add Remarks Master</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-toggle="tab" href="#tabJ" onclick="search('{{url('approval_remarks_master') }}','remarksTab');"><i class="mdi mdi-account-check"></i>Approve Remarks Master</button>
                    </li>
                </ul>
            </div>
            <span class="nav-tabs-wrapper-border" role="presentation"></span>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tabI">
                    <br>
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: right;">
                                <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#modal" onclick="addModal('modal.remarks-master','contModal');">
                                    <i class="mdi mdi mdi-plus"></i>Add Remarks Master</button>
                            </td>
                        </tr>
                    </table>
                    <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                        <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                            <span class="menu-title" style="font-weight: bold;">Search Remarks Master</span>
                        </legend>
                        <div class="table-responsive">
                            <form method="POST" id="searchRemarkForm">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td> Remarks :</td>
                                            <td>
                                                Status
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <input class="form-control" type="text" name="remarks_name" id="remarks_name" /></td>
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
                                                <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('remarks-master-search')}}','remarksSearchResult','searchRemarkForm','remarks_name');">
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

                    <div id="remarksSearchResult">
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">List Of Remarks Master</span>
                            </legend>
                            <div id="remarksContain">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Remarks Master </th>
                                            <th> Description </th>
                                            <th> Status </th>
                                            <th style="text-align:right;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reasonMaster as $reasonMaster)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{$reasonMaster->Reason_Details}} </td>
                                            <td> {{$reasonMaster->Description}} </td>
                                            <td> {{$reasonMaster->Status_Name}} </td>
                                            <td style="text-align:right;">
                                                @if($reasonMaster->Status_Id==1 or $reasonMaster->Status_Id==3)
                                                <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster('{{$reasonMaster->Pkid}}','{{url('view-edit-remarks-master')}}','viewEditModal','rawForm','EDT','Remarks Master');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                                                <a href="javascript:void(0);" onclick="deletePost('{{$reasonMaster->Pkid}}','{{url('add_remarks_master') }}','remarksSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
                                                @else
                                                <button type="button" disabled data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster('{{$reasonMaster->Pkid}}','{{url('view-edit-remarks-master')}}','viewEditModal','rawForm','EDT','Remarks Master');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                                                <button disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost('{{$reasonMaster->Pkid}}','{{url('add_remarks_master') }}','remarksSearchResult')" class="btn btn-danger btn-sm">
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
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabJ">
                    <br>
                    <form id="remarksApprovalForm" method="POST">
                        <div id="remarksTab">

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
                                        <button type="button" class="btn btn-success btn-fw" onclick="fnCmnApproved('{{ url('approve-remarks') }}', 'remarksApprovalForm','remarksTab');">
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