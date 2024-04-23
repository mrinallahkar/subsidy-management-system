@extends('layout.master')

@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')

<div class="result" id="result"></div>
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <fieldset style="border: 1px groove #ddd !important; padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important; -webkit-box-shadow:  0px 0px 0px 0px #000; box-shadow:  0px 0px 0px 0px #000;">
                        <legend style="font-size: .9em !important; font-weight: bold !important;text-align: left !important;
                        width:auto; padding:0 2px;border-bottom:none;"><i class="mdi mdi-magnify"></i>
                            <span class="menu-title" style="font-weight: bold;">Search Disbursement</span>
                        </legend>
                        <form method="POST" id="searchClaimForDisbursementForm">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td> Benificiary Name:</td>
                                        <td>
                                            Claim No
                                        </td>
                                        <td>Subsidy Scheme</td>
                                    </tr>
                                    <tr>
                                        <td> <input class="form-control" type="text" name="benificiary_name" id="benificiary_name" /></td>
                                        <td><input class="form-control" type="text" name="claim_id" id="claim_id" />
                                        </td>
                                        <td>
                                            <select style="width:170px" name="scheme_id" id="scheme_id" class="btn btn-secondary dropdown-toggle">
                                                <option value="">--Select--</option>
                                                @foreach($subsidyMaster as $subsidyMaster)
                                                <option value="{{$subsidyMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$subsidyMaster->Scheme_Name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Disbursement From </td>
                                        <td>Disbursement To</td>
                                        <td>State </td>
                                    </tr>
                                    <tr>
                                        <td><input type="date" class="form-control" name="claim_from" id="claim_from"> </td>
                                        <td>
                                            <input type="date" class="form-control" name="claim_to" id="claim_to">
                                        </td>
                                        <td>
                                            <select style="width:170px" name="status_id" id="status_id" class="btn btn-secondary dropdown-toggle">
                                                <option value="">--Select--</option>
                                                @foreach($stateMaster as $stateMaster)
                                                <option value="{{$stateMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$stateMaster->State_Name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center">
                                            <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput('{{ url('disbursement-ui.search-disbursement-result') }}','searchResult','searchClaimForDisbursementForm','benificiary_name');">
                                                <i class="mdi mdi-magnify"></i>Search</button>
                                            <button type="reset" class="btn btn-light btn-fw">
                                                <i class="mdi mdi-refresh"></i>Reset</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="searchResult">

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
<script>
    $(function() {
        $('.datetimepicker').datetimepicker();
    });
</script>
@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
@endpush