@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

<div id="ajaxLoadPage">
    <div class="result" id="result"></div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                                <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-poll-box text-success icon-sm"></i>
                                    <span class="menu-title" style="font-weight: bold;">Subsidy Funds</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                        </table>
                        <table style="width:100%">
                            <tr>
                                <td colspan="2" class="card-title" style="text-align: right;">
                                    <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#addSubsidyFund" onclick="addModal('fund-management-ui.subsidy-fund.add-subsidy-fund-modal','modal')">
                                        <i class="mdi mdi mdi-plus"></i>Add Subsidy Fund</button>
                                </td>
                            </tr>
                        </table>
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">Search Fund</span>
                            </legend>
                            <div class="table-responsive">

                                <form method="POST" id="searchSubsidyFundForm">
                                    <table class="table table-hover" style="border: 1px solid #ababab;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Sanction Letter </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" id="sanction_letter" name="sanction_letter" autofocus />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Registered From Date </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="date" id="allocation_From_Date" name="allocation_From_Date" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Registered To Date </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="date" id="allocation_To_Date" name="allocation_To_Date" />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Scheme </label>
                                                    <div class="col-sm-10">
                                                        <select style="width:170px; text-align:left" name="scheme" id="scheme" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            @foreach($subsidyMaster as $subsidyMaster)
                                                            <option value="{{$subsidyMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$subsidyMaster->Scheme_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td colspan="2"> <label for="" class="col-sm-2 form-control-label  font-weight-medium">Status </label>
                                                    <div class="col-sm-10">
                                                        <select style="width:170px; text-align:left" name="status_id" id="status_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            @foreach($statusMaster as $statusMaster)
                                                            <option value="{{$statusMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$statusMaster->Status_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="header">
                                                <td colspan="4" align="center">
                                                    <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('search-subsidy-fund-result')}}','searchResult','searchSubsidyFundForm','sanction_letter');">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Result-->
    <div id="searchResult">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table style="width:100%">
                                <tr>
                                    <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">List of Funds:
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                            <table id="example"  class="display table table-striped table-bordered no-footer" style="width:100%">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Sanction Letter </th>
                                        <th> Sanction Date </th>
                                        <th> Scheme </th>
                                        <th style="text-align:right;"> Sanction Amount </th>
                                        <th> Status </th>
                                        <th width="20%" style="text-align:right;"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subsidyFund as $subsidyFund)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td> {{$subsidyFund->Sanction_Letter}} </td>
                                        <td> {{ date('d-M-Y', strtotime($subsidyFund->Sanction_Date))}}</td>
                                        <td> {{$subsidyFund->Scheme_Name}}</td>
                                        <td align="right"> {{number_format($subsidyFund->Sanction_Amount,2)}} </td>
                                        <td> {{$subsidyFund->Status_Name}}</td>
                                        <td align="right">
                                            <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$subsidyFund->Pkid}},'{{ url('view-edit-subsidy-fund') }}','appendSubsidyFund','VIW','Subsidy Fund');" data-placement="bottom" title="View Details">
                                                <i class="mdi mdi-view-carousel"></i></button>
                                            @if($subsidyFund->Status_Id==1 or $subsidyFund->Status_Id==3)
                                            <button title="Edit Record" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$subsidyFund->Pkid}},'{{ url('view-edit-subsidy-fund') }}','appendSubsidyFund','EDT','Subsidy Fund');">
                                                <i class="mdi mdi-grease-pencil"></i></button>
                                            <a href="javascript:void(0);" onclick="deletePost({{$subsidyFund->Pkid}},'{{url('save-subsidy-fund') }}','searchResult')" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                            @else
                                            <button title="Edit Record" type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$subsidyFund->Pkid}},'{{ url('view-edit-subsidy-fund') }}','appendSubsidyFund','EDT','Subsidy Fund');">
                                                <i class="mdi mdi-grease-pencil"></i></button>
                                            <button title="Delete Record" disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$subsidyFund->Pkid}},'{{url('save-subsidy-fund') }}','searchResult')">
                                                <i class="mdi mdi-delete"></i>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Subsidy Model -->
    <div class="modal fade" id="addSubsidyFund">
        <div style="width: 75%; text-align:left" class="modal-dialog modal-lg">
            <div class="modal-content" id="modal">
            </div>
        </div>
    </div>

    <!-- View Subsidy Model -->
    <div class="modal fade" id="viewSubsidyFund">
        <div style="width: 75%; text-align:left" class="modal-dialog modal-lg">
            <div id="access_deny" class="d-none">
            </div>
            <div class="modal-content d-none" id="modal_content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title"><i class="mdi mdi-view-carousel"></i>View Subsidy</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="inner_result" id="inner_result"></div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="appendSubsidyFund">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div style="width: 75%; text-align:left" class="modal-dialog modal-lg">
            <div id="contain">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div style="text-align: center">
                                    <h1 style="color: red;">Access Denied !</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-js-files')
<link href="{{ asset('assete/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
@stop