<style>
    svg.w-5.h-5 {
        width: 25px !important;
    }

    span.relative.z-0.inline-flex.shadow-sm.rounded-md {
        float: right !important;
    }
</style>
<script>
    $("#searchAllocationForm").submit(function() {
        return false;
    });
</script>
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
                                    <span class="menu-title" style="font-weight: bold;">Fund Allocation</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                        </table>
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">List of Funds:</span>
                            </legend>
                            <div class="table-responsive">
                                <table id="example" class="display table table-striped table-bordered no-footer" style="width:100%">
                                    <!-- <table class="table table-striped"> -->
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Sanction Letter </th>
                                            <th> Sanction Date </th>
                                            <th> Scheme </th>
                                            <th style="text-align: right;"> Sanction Amount </th>
                                            <th style="text-align: right;"> Balance Amount </th>
                                            <th style="text-align:right;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subsidyFund as $subsidyFund)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$subsidyFund->Sanction_Letter}} </td>
                                            <td> {{$subsidyFund->Sanction_Date->format('d-M-Y') }} </td>
                                            <td> {{$subsidyFund->Scheme_Name}}</td>
                                            <td style="text-align: right;"> {{ number_format($subsidyFund->Sanction_Amount,2) }} </td>
                                            <td style="text-align: right;"> {{ number_format($subsidyFund->Fund_Balance, 2) }} </td>
                                            <td align="right">
                                                <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#addFundAllocation" onclick="addAllocationModal('{{ url('fund-allocation.add-fund-allocation-modal')}}','modal','addedFundForm',{{$subsidyFund->Pkid}},{{$subsidyFund->Scheme_Pk}} )">
                                                    <i class="mdi mdi mdi-plus"></i>Allocate</button>
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
            </div>
        </div>
    </div>

    <!-- search added fund allocation -->
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">Search Fund Allocation:</span>
                            </legend>
                            <div class="table-responsive">
                                <form method="POST" id="searchAllocationForm" name="searchAllocationForm">
                                    <table class="table table-hover" style="border: 1px solid #ababab;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Benificiary Name </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" placeholder="Type Benificiary Name to Search" type="text" id="benificiary_name" name="benificiary_name" />
                                                        <div id="benificiaryList" style="background-color: #ccc;">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim From </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="date" id="claim_from" name="claim_from" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Claim To </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="date" id="claim_to" name="claim_to" />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Sanction Letter </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" id="sanction_letter" name="sanction_letter" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label  font-weight-medium">Scheme </label>
                                                    <div class="col-sm-10">
                                                        <select style="width:170px; text-align:left" name="scheme_id" id="scheme_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            @foreach($subsidyMaster as $subsidyMaster)
                                                            <option value="{{$subsidyMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$subsidyMaster->Scheme_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td> <label for="" class="col-sm-2 form-control-label  font-weight-medium">Status </label>
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
                                                    <button type="submit" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInputWithTwoDatatable(this,'{{url('search-fund-allocation-result')}}','searchResult','searchAllocationForm','sanction_letter');">
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
                            <form id="disbursementSearchResult" method="GET">
                                <table style="width:100%">
                                    <tr>
                                        <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">List of Fund Allocation:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>

                                </table>
                                <table id="example1" class="display table table-striped table-bordered no-footer" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Sanction Letter </th>
                                            <th> Scheme </th>
                                            <th style="text-align:right;"> Sanction Amount </th>
                                            <th style="text-align:right;"> Allocated Amount </th>
                                            <th> Status </th>
                                            <th style="text-align:right;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($fundAllocation as $fundAllocation)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$fundAllocation->Sanction_Letter}} </td>
                                            <td> {{$fundAllocation->Scheme_Name}} </td>
                                            <td class="text-right"> {{number_format($fundAllocation->Sanction_Amount,2)}}</td>
                                            <td class="text-right"> {{number_format($fundAllocation->Total_Allocated_Amount,2)}} </td>
                                            <td> {{$fundAllocation->Status_Name}}</td>
                                            <td class="text-right">
                                                <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewFundAllocation" onclick="viewModel({{$fundAllocation->Pkid}},'{{ url('view-edit-fund-allocation') }}','appendFundAllocation','VIW','Fund Allocation');">
                                                    <i class="mdi mdi-view-carousel"></i></button>
                                                @if($fundAllocation->Status_Id_Fk==1 or $fundAllocation->Status_Id_Fk==3)
                                                <button title="Edit Record" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addFundAllocation" onclick="addAllocationModal('{{ url('fund-allocation.add-fund-allocation-modal')}}','modal','addedFundForm',{{$fundAllocation->Fund_Id_Fk}},{{$fundAllocation->Scheme_Id_Fk}} )">
                                                    <i class="mdi mdi-grease-pencil"></i></button>
                                                <a href="javascript:void(0);" onclick="deleteAllocation({{$fundAllocation->Pkid}},'{{url('delete-fund-allocation-master') }}','searchResult')" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                @else
                                                <button title="Edit Record" type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addFundAllocation" onclick="addAllocationModal('{{ url('fund-allocation.add-fund-allocation-modal')}}','modal','addedFundForm',{{$fundAllocation->Fund_Id_Fk}},{{$fundAllocation->Scheme_Id_Fk}} )">
                                                    <i class="mdi mdi-grease-pencil"></i></button>
                                                <button title="Delete Record" disabled type="button" disabled class="btn btn-danger btn-sm" onclick="deleteAllocation({{$fundAllocation->Pkid}},'{{url('delete-fund-allocation-master') }}','searchResult')" class="btn btn-danger btn-sm">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Subsidy Model -->
    <div class="modal fade" id="addFundAllocation">
        <div style="width: 80%; text-align:left" class="modal-dialog modal-lg">
            <div class="modal-content" id="modal">
            </div>
        </div>
    </div>

    <!-- View Disbursement Model -->
    <div class="modal fade" id="viewFundAllocation">
        <div style="width: 80%; text-align:left" class="modal-dialog modal-lg">
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
                                        <div id="appendFundAllocation">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
            </div> -->

            </div>
        </div>
    </div>

    <!-- Edit Disbursement Model -->
    <div class="modal fade" id="editFundAllocation">
        <div style="width: 80%; text-align:center" class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title"><i class="mdi mdi-grease-pencil"></i>Edit Subsidy</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
            </div> -->

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div style="width: 80%; text-align:left" class="modal-dialog modal-lg">
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
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(document).ready(function() {

        $('#benificiary_name').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete.fetch') }}",
                    method: "POST",
                    data: {
                        query: query
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(data) {
                        // alert(data);
                        $('#benificiaryList').fadeIn();
                        $('#benificiaryList').html(data);
                    }
                });
            } else {
                $('#benificiaryList').html('');
            }
        });

        $(document).on('click', 'li', function() {
            $('#benificiary_name').val($(this).text());
            $('#benificiaryList').fadeOut();
        });

    });
</script>