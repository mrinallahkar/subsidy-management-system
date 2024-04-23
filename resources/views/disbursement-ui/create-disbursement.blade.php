@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>
<script>
    $("#searchrDisbursementForm").submit(function() {
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
                                <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-receipt text-warning icon-sm"></i>
                                    <span class="menu-title" style="font-weight: bold;">Disbursement</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                        </table>
                        <form method="GET" id="disbursementClaimSearchForm">
                            <fieldset class="collapsible" style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                                <legend class='togvis' style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                    <span class="menu-title" style="font-weight: bold;">Allocation List: </span>
                                </legend>
                                <table id="example" class="display table table-striped table-bordered no-footer" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="4%"> # </th>
                                            <th width="13%"> Claim ID </th>
                                            <th width="32%"> Benificiary Name </th>
                                            <th width="14%" style="text-align: right;"> Allocated Amount </th>
                                            <th width="13%" style="text-align: right;"> Paid Amount </th>
                                            <!-- <th> Status </th> -->
                                            <th width="26%" style="text-align:right;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($claimListForDisbursement as $claimListForDisbursement)
                                        <!-- @if($claimListForDisbursement->Allocated_Amount > $claimListForDisbursement->Paid_Amount) -->
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$claimListForDisbursement->Claim_Id}} </td>
                                            <td> {{$claimListForDisbursement->Benificiary_Name}} </td>
                                            <td align="right"> {{number_format($claimListForDisbursement->Allocated_Amount,2)}} </td>
                                            <td align="right"> {{number_format($claimListForDisbursement->Paid_Amount,2)}} </td>
                                            <td align="right">
                                                <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDisbursement" onclick="viewModel({{$claimListForDisbursement->Pkid}},'{{ url('view-disbursement-details-modal') }}','viewClaim','VIW','Disbursement Details','disbursementClaimSearchForm');">
                                                    <i class="mdi mdi-view-carousel"></i></button>
                                                @if($claimListForDisbursement->Allocated_Amount > $claimListForDisbursement->Paid_Amount)
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addDisbursement" onclick="disbursementModal('{{ url('disbursement-ui.create-disbursement-modal') }}','modal','disbursementClaimSearchForm','0',{{$claimListForDisbursement->Pkid}})">
                                                    <i class="mdi mdi mdi-plus"></i>Add payment</button>
                                                <!--  <a href="javascript:void(0);" onclick="deletePost({{$claimListForDisbursement->Pkid}},'{{url('save-subsidy') }}','searchResult')" class="btn btn-danger btn-sm"> Delete </a> -->
                                                @else
                                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addDisbursement" onclick="disbursementModal('{{ url('disbursement-ui.create-disbursement-modal') }}','modal','disbursementClaimSearchForm','0',{{$claimListForDisbursement->Pkid}})">
                                                    <i class="mdi mdi-grease-pencil"></i>Edit</button>
                                                <!-- <a href="javascript:void(0);" disabled onclick="deletePost({{$claimListForDisbursement->Pkid}},'{{url('save-subsidy') }}','searchResult')" class="btn btn-danger btn-sm"> Delete </a> -->
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- @endif -->
                                        @empty
                                        <tr>
                                            <td colspan="7" align="center">No Records Found !!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" id="searchrDisbursementForm">
                        <fieldset class="collapsible" style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend class='togvis' style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">Search Disbursement:</span>
                            </legend>
                            <div class="content">
                                <table class="table table-hover" style="border: 1px solid #ababab;" style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Benificiary Name</label>
                                                <div class="col-sm-10" aria-colspan="2">
                                                    <input class="form-control" placeholder="Type Benificiary Name to Search" type="text" name="benificiary_name" id="benificiary_name" />
                                                    <div id="benificiaryList" style="background-color: #ccc;">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Disbursement From</label>
                                                <div class="col-sm-10" aria-colspan="2">
                                                    <input type="date" class="form-control" name="disbursement_from" id="disbursement_from">
                                                </div>
                                            </td>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Disbursement To</label>
                                                <div class="col-sm-10" aria-colspan="2">
                                                    <input type="date" class="form-control" name="disbursement_to" id="disbursement_to">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Claim From</label>
                                                <div class="col-sm-10" aria-colspan="2">
                                                    <input class="form-control" type="date" name="claim_from" id="claim_from" />
                                                </div>
                                            </td>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Claim To</label>
                                                <div class="col-sm-10" aria-colspan="2">
                                                    <input class="form-control" type="date" name="claim_to" id="claim_to" />
                                                </div>
                                            </td>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Scheme</label>
                                                <div class="col-sm-10" aria-colspan="2">
                                                    <select style="width:170px; text-align:left" name="scheme" id="scheme" class="btn btn-secondary dropdown-toggle">
                                                        <option value="">--Select--</option>
                                                        @foreach($subsidyMaster as $subsidyMaster)
                                                        <option value="{{$subsidyMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$subsidyMaster->Scheme_Name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><label for="" class="col-sm-2 form-control-label">State</label>
                                                <div class="col-sm-10" aria-colspan="2">
                                                    <select style="width:170px; text-align:left" name="state_id" id="state_id" class="btn btn-secondary dropdown-toggle">
                                                        <option value="">--Select--</option>
                                                        @foreach($stateMaster as $stateMaster)
                                                        <option value="{{$stateMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$stateMaster->State_Name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="header">
                                            <td colspan="3" align="center">
                                                <button type="submit" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInputWithTwoDatatable(this,'{{ url('disbursement-ui.search-disbursement-result') }}','searchResult','searchrDisbursementForm','disbursement_id');">
                                                    <i class="mdi mdi-magnify"></i>Search</button>
                                                <button type="reset" class="btn btn-light btn-fw">
                                                    <i class="mdi mdi-refresh"></i>Reset</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </form>

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
                                    <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">List of Disbursement:
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
                                        <th width="4%"> # </th>
                                        <!-- <th width="5%"> ID </th> -->
                                        <th width="28%"> Benificiary Name </th>
                                        <th width="15%"> Disbursement Date </th>
                                        <th width="11%" style="text-align: right;"> Claim Amount </th>
                                        <th width="11%" style="text-align: right;"> Paid Amount </th>
                                        <th width="12%" style="text-align: right;"> Pending Amount </th>
                                        <!-- <th> Status </th> -->
                                        <th width="21%" style="text-align:right;"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($disbursementDetailList as $disbursementDetailList)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <!-- <td> {{$disbursementDetailList->Pkid}} </td> -->
                                        <td> {{$disbursementDetailList->Benificiary_Name}}
                                            <br><span style="font-size: x-small; font-weight:bold;">Claim From: </span><span style="font-size: x-small;">@if(!empty($disbursementDetailList->Claim_From_Date)){{date('d M Y', strtotime($disbursementDetailList->Claim_From_Date))}} @else - - - - -@endif</span> <span style="font-size: x-small; font-weight:bold;">Claim To: </span><span style="font-size: x-small;">@if(!empty($disbursementDetailList->Claim_To_Date)){{date('d M Y', strtotime($disbursementDetailList->Claim_To_Date))}} @else - - - - -@endif</span>
                                        </td>
                                        <td> {{date('d-M-Y', strtotime($disbursementDetailList->Disbursement_Date))}} </td>
                                        <td align="right"> {{number_format($disbursementDetailList->Claim_Amount,2)}} </td>
                                        <td align="right"> {{number_format($disbursementDetailList->Disbursement_Amount,2)}} </td>
                                        <td align="right"> @if(($disbursementDetailList->Claim_Amount-$disbursementDetailList->TotalPaid)>0)
                                            {{number_format($disbursementDetailList->Claim_Amount-$disbursementDetailList->TotalPaid,2)}}
                                            @else
                                            0.00
                                            @endif
                                        </td>
                                        <!-- <td> {{$disbursementDetailList->Status_Name}}</td> -->
                                        <td align="right">
                                            <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDisbursement" onclick="viewDisbursementModel({{$disbursementDetailList->Pkid}},{{$disbursementDetailList->Allocation_Pk}},'{{ url('view-disbursement-details-modal') }}','viewClaim','VIW','Disbursement Details','disbursementSearchResult');">
                                                <i class="mdi mdi-view-carousel"></i></button>
                                            @if($disbursementDetailList->Status_Id_Fk==1 or $disbursementDetailList->Status_Id_Fk==3)
                                            <button title="Edit Record" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addDisbursement" onclick="disbursementModal('{{ url('disbursement-ui.edit-view-disbursement-modal') }}','modal','disbursementClaimSearchForm',{{$disbursementDetailList->Pkid}},{{$disbursementDetailList->Allocation_Pk}})">
                                                <i class="mdi mdi-grease-pencil"></i></button>
                                            <a href="javascript:void(0);" disabled onclick="deletePost({{$disbursementDetailList->Pkid}},'{{url('save-disbursement') }}','searchResult')" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                            @else
                                            <button title="Edit Record" type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addDisbursement" onclick="disbursementModal('{{ url('disbursement-ui.edit-view-disbursement-modal') }}','modal','disbursementClaimSearchForm',{{$disbursementDetailList->Pkid}},{{$disbursementDetailList->Allocation_Pk}})">
                                                <i class="mdi mdi-grease-pencil"></i></button>
                                            <button title="Delete Record" disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$disbursementDetailList->Pkid}},'{{url('save-disbursement') }}','searchResult')">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" align="center">No Records Found !!</td>
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

<!-- Add Disbursement Model -->
<div class="modal fade" id="addDisbursement">
    <div style="width: 85%; text-align:left" class="modal-dialog modal-lg">
        <div class="modal-content" id="modal">

        </div>
    </div>
</div>

<!-- View Disbursement Model -->
<div class="modal fade" id="viewDisbursement">
    <div style="width: 85%; text-align:left" class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title"><i class="mdi mdi-view-carousel"></i>View Disbursement</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="result" id="result"></div>
                                    <div id="viewClaim">

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

<!-- Edit Disbursement Model -->
<div class="modal fade" id="editDisbursement">
    <div style="width: 80%; text-align:center" class="modal-dialog modal-lg">
        <div class="modal-content" id="modal">

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
@section('page-js-files')
<link href="{{ asset('assete/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
@stop
@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
{!! Html::script('/assets/js/jquery-collapsible-fieldset.js') !!}
@endpush
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