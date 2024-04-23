@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush
<script>
    $("#searchBenificiaryForm").submit(function() {
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
                                <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-account-box-multiple text-info icon-sm"></i>
                                    <span class="menu-title" style="font-weight: bold;">Beneficiary</span>
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
                                    <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#addBenificiary" onclick="addModal('{{url('benificiary-ui.add-benificiary-modal')}}','modal','benificiaryForm')">
                                        <i class="mdi mdi mdi-plus"></i>Add Beneficiary</button>
                                </td>
                            </tr>
                        </table>
                        <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                                <span class="menu-title" style="font-weight: bold;">Search Beneficiary</span>
                            </legend>
                            <div class="table-responsive">
                                <form method="POST" id="searchBenificiaryForm" action="javascript:void(0);">
                                    <table class="table table-hover" style="border: 1px solid #ababab;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Beneficiary Name</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <input class="form-control" placeholder="Type Benificiary Name to Search" type="text" id="benificiary_name" name="benificiary_name" autofocus />
                                                        <div id="benificiaryList" style="background-color: #ccc;">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">PAN</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <input class="form-control" type="text" id="pan" name="pan" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">State</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="state" id="state" class="btn btn-secondary dropdown-toggle" onchange="getDistrictPerState(this.value,'#district_id','{{url('fill-district-onChange')}}');">
                                                            <option value="">--Select--</option>
                                                            @foreach($stateMaster as $stateMaster)
                                                            <option value="{{$stateMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$stateMaster->State_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">District</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="district_id" id="district_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label"> Govt. Policy</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="policy_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            @foreach($govPolicy as $govPolicy)
                                                            <option value="{{$govPolicy->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$govPolicy->Policy_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr class="header">
                                                <td colspan="3" align="center">
                                                    <button type="submit" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('benificiary-ui.benificiary-search-result')}}','searchResult','searchBenificiaryForm','search_benificiary');">
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
                            <form id="benificiarySearchResult" method="GET">
                                <table style="width:100%">
                                    <tr>
                                        <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Beneficiary List:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                </table>
                                <table id="example" class="display table table-striped table-bordered no-footer" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="4%"> # </th>
                                            <th width="30%"> Beneficiary Name </th>
                                            <th width="20%"> Beneficiary Address </th>
                                            <th width="12%"> Subsidy Reg </th>
                                            <th width="11%"> PAN </th>
                                            <th width="8%"> Status </th>
                                            <th width="20%" style="text-align:right;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($benificiaryList as $benificiaryList)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$benificiaryList->Benificiary_Name}} </td>
                                            <td> {{$benificiaryList->Address1}}</td>
                                            <td> {{$benificiaryList->Subsidy_Regn_No}}</td>
                                            <td style="text-transform: uppercase;"> {{$benificiaryList->Pan_No}} </td>
                                            <td> {{$benificiaryList->Status_Name}}</td>
                                            <td style="text-align:right;">
                                                <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','VIW','Benificiary','benificiarySearchResult');">
                                                    <i class="mdi mdi-view-carousel"></i></button>
                                                @if($benificiaryList->Status_Id==1 or $benificiaryList->Status_Id==3)
                                                <button title="Edit Record" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','EDT','Benificiary','benificiarySearchResult');">
                                                    <i class="mdi mdi-grease-pencil"></i></button>
                                                <a href="javascript:void(0);" onclick="deletePost({{$benificiaryList->Pkid}},'{{url('save-benificiary') }}','searchResult')" confirm="Are your sure?" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                @else
                                                <button title="Edit Record" type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$benificiaryList->Pkid}},'{{ url('view-edit-benificiary') }}','appendBenificiary','EDT','Benificiary','benificiarySearchResult');">
                                                    <i class="mdi mdi-grease-pencil"></i></button>
                                                <button title="Delete Record" disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$benificiaryList->Pkid}},'{{url('save-benificiary') }}','searchResult')">
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
    <!-- Add Benificiary Model -->
    <div class="modal fade" id="addBenificiary">
        <div style="width: 88%; text-align:left" class="modal-dialog modal-lg">
            <div id="modal">

            </div>
        </div>
    </div>


    <!-- View Benificiary Model -->
    <div class="modal fade" id="viewBenificiary">
        <div style="width: 88%; text-align:left" class="modal-dialog modal-lg">
            <div id="access_deny" class="d-none">
            </div>
            <div class="modal-content d-none" id="modal_content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title"><i class="mdi mdi-view-carousel"></i>View Benificiary</h6>
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
                                        <div id="appendBenificiary">

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
        <div style="width: 88%; text-align:left" class="modal-dialog modal-lg">
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
        // on selection clicked of the text, get the text on benificiary textbox
        $(document).on('click', 'li', function() {
            $('#benificiary_name').val($(this).text());
            $('#benificiaryList').fadeOut();
        });

    });
</script>