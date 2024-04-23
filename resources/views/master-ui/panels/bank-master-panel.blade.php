<div class="card-header" id="headingFour">
    <h2 class="mb-0">
        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseFour"><i class="fa fa-plus"></i>Bank Master</button>
    </h2>
</div>
<div style="border-left:1px solid #e6e6e6;border-right:  1px solid #e6e6e6; border-bottom: 1px solid #e6e6e6; border-radius:0 0px 5px 5px " id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
    <div class="card-body" style="margin-top: -15px;">
        <div class="container mt-3">
            <!-- Start Tabs -->
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs dragscroll horizontal">
                    <li class="nav-item">
                        <button class="nav-link active" data-toggle="tab" href="#tabG" onclick="search('{{url('show_bank_master') }}','bankSearchResult');"><i class="mdi mdi mdi-plus"></i>Add Bank Master</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-toggle="tab" href="#tabH" onclick="search('{{url('approval_bank_master') }}','bankTab');"><i class="mdi mdi-account-check"></i>Approve Bank Master</button>
                    </li>
                </ul>
            </div>
            <span class="nav-tabs-wrapper-border" role="presentation"></span>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tabG">
                    <br>
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: right;">
                                <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#modal" onclick="addModal('{{url('modal.bank-master')}}','contModal','bankForm');">
                                    <i class="mdi mdi mdi-plus"></i>Add Bank Master</button>
                            </td>
                        </tr>
                    </table>
                    <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                        <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                            <span class="menu-title" style="font-weight: bold;">Search Bank Master</span>
                        </legend>
                        <div class="table-responsive">
                            <form method="POST" id="searchBankForm">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td> Bank Name :</td>
                                            <td>
                                                Status
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <input class="form-control" type="text" id="bank_name" name="bank_name" /></td>
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
                                                <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('bank-master-search')}}','bankSearchResult','searchBankForm','bank_name');">
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

                    <div id="bankSearchResult">
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">List Of Bank Master</span>
                            </legend>
                            <div id=bankContain>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Bank Name </th>
                                            <th> Account No. </th>
                                            <th> Branch </th>
                                            <th> Scheme </th>
                                            <th> Status </th>
                                            <th style="text-align:right;"> Action </th>
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
                                                @if ($bankMaster->Status_Id==1 or $bankMaster->Status_Id==3)
                                                <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster('{{$bankMaster->Pkid}}','{{url('view-edit-bank-master')}}','viewEditModal','rawForm','EDT','Bank Master');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                                                <a href="javascript:void(0);" onclick="deletePost('{{$bankMaster->Pkid}}','{{url('add_bank_master') }}','bankSearchResult')" class="btn btn-danger btn-sm"> Delete </a>
                                                @else
                                                <button type="button" disabled data-toggle="modal" data-target="#editModal" class="btn btn-dark btn-sm" onclick="addModalMaster('{{$bankMaster->Pkid}}','{{url('view-edit-bank-master')}}','viewEditModal','rawForm','EDT','Bank Master');"> <i class="mdi mdi-grease-pencil"></i>Edit </button>
                                                <button disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost('{{$bankMaster->Pkid}}','{{url('add_bank_master') }}','bankSearchResult')" class="btn btn-danger btn-sm">
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
                <div class="tab-pane fade" id="tabH">
                    <br>
                    <form id="bankMasterApprovalForm" method="POST">
                        <div id="bankTab">
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
                                        <button type="button" class="btn btn-success btn-fw" onclick="fnCmnApproved('{{ url('approve-bank') }}', 'bankMasterApprovalForm','bankTab');">
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