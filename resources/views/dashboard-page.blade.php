@stack('plugin-scripts')
<div id="ajaxLoadPage">
    <div id="contain">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin1 stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                            <div class="float-left">
                                <i class="mdi mdi-cube text-primary icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Total Claims</p>
                                <div class="fluid-container">
                                    <h4 id="totalClaim" class="font-weight-medium text-right mb-0">{{ number_format($totalClaim,0) }}</h4>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin1 stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                            <div class="float-left">
                                <i class="mdi mdi-poll-box text-success icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Total Allocation</p>
                                <div class="fluid-container">
                                    <h4 id="totalAllocation" class="font-weight-medium text-right mb-0">{{number_format($totalAllocation,0)}}</h4>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin1 stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                            <div class="float-left">
                                <i class="mdi mdi-receipt text-warning icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Total Disbursement</p>
                                <div class="fluid-container">
                                    <h4 id="totalDisbursement" class="font-weight-medium text-right mb-0">{{number_format($totalDisbursement,0)}}</h4>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin1 stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                            <div class="float-left">
                                <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Total Beneficiaries</p>
                                <div class="fluid-container">
                                    <h4 id="totalBenificiary" class="font-weight-medium text-right mb-0">{{number_format($totalBenificiary,0)}}</h4>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                            <i class="mdi mdi-reload mr-1" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin1">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-container">
                            <div class="table-responsive">
                                <table style="width:100%">
                                    <tr>
                                        <td class="card-title" style="text-align: left;">
                                            <i class="menu-icon mdi mdi-cube  text-primary icon-sm"></i> Claim by Disbursement Chart
                                        </td>
                                        <td style="text-align: left;">Year:
                                            <select style="width:150px" name="category_id" class="btn btn-secondary dropdown-toggle chosen" onchange="getDashboardOnYearChange(this.value,'{{url('get-dashboard-values-onChange')}}');">
                                                <option value="">--Select Year--</option>
                                                @foreach($finYear as $finYear2)
                                                <option value="{{$finYear2->Received_Date}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$finYear2->Received_Date}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="card-title" style="text-align: right;">
                                            <button class="btn btn-secondary btn-sm" id="line" title="View by Line Chart" style="height:30px;width:50px"><img style="height:20px;width:25px" src="../public/assets/images/line-chart.png" /></button>
                                            <button class="btn btn-secondary btn-sm" id="column" title="View by Column Chart" style="height:30px;width:50px"><img style="height:20px;width:25px" src="../public/assets/images/bar-chart.png" /></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <hr />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div id="linechart" style="width: 100%; height: 400px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div id="columnchart" style="width: 100%; height: 400px"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin1">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                                <td class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-cube text-danger icon-sm"></i> State-wise Total Claim
                                </td>
                                <td class="card-title" style="text-align: right;">
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>

                        </table>
                        <div id="statewiseclaim">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%"> # </th>
                                        <th width="25%"> State </th>
                                        <th width="15%" style="text-align: right;"> Claim Amount </th>
                                        <th width="15%" style="text-align: right;"> Allocation Amount </th>
                                        <th width="15%"> Precentage </th>
                                        <th width="20%"> Progress </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($stateWiseClaim as $stateWiseClaim)
                                    @php $allocationPC=round($stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100,3); @endphp
                                    <tr onclick="fnDashboardMenuNavigation('{{$stateWiseClaim->Pkid}}','{{url('report-ui.claim-report')}}');"  style="cursor: pointer;">
                                        <td class="font-weight-medium"> {{$loop->iteration}} </td>
                                        <td> {{$stateWiseClaim->State_Name}} </td>
                                        <td align="right"> {{round($stateWiseClaim->Claim/10000000,4)}} Cr.</td>
                                        <td align="right">
                                            {{round($stateWiseClaim->Allocated_Amount/10000000,4)}} Cr.
                                        </td>
                                        <td>{{$allocationPC}} %</td>
                                        <td>
                                            <div class="progress">
                                                @if($allocationPC<'50') <div title="{{round($stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100)}} %" class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: {{$stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                            @elseif ($allocationPC>'50' && $allocationPC<'70') <div title="{{round($stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100)}} %" class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: {{$stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                        </div>
                        @else
                        <div title="{{round($stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100)}} %" class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: {{$stateWiseClaim->Allocated_Amount/$stateWiseClaim->Claim*100}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        @endif
                    </div>
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
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-receipt text-warning icon-sm"></i> State-wise Total Disbursement
                            </td>
                            <td class="card-title" style="text-align: right;">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>

                    </table>
                    <div id="statewisedisbursement">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="5%"> # </th>
                                    <th width="25%"> State </th>
                                    <th width="15%" style="text-align: right;"> Allocated Amount </th>
                                    <th width="15%" style="text-align: right;"> Disbursed Amount </th>
                                    <th width="15%"> Percentage </th>
                                    <th width="20%"> Progress </th>
                                </tr>
                            </thead>
                            <tbody>

                            @forelse ($stateWiseDisbursement as $stateWiseDisbursement)
                                @php $disbursementPC=round($stateWiseDisbursement->Disbursement_Amount/$stateWiseDisbursement->Allocated_Amount*100,3); @endphp
                                <tr onclick="fnDashboardMenuNavigation('{{$stateWiseDisbursement->Pkid}}','{{url('report-ui.disbursement-report')}}');" style="cursor: pointer;">
                                    <td class="font-weight-medium"> {{$loop->iteration}} </td>
                                    <td> {{$stateWiseDisbursement->State_Name}} </td>
                                    <td align="right"> {{round($stateWiseDisbursement->Allocated_Amount/10000000,4)}} Cr.</td>
                                    <td align="right">
                                        {{round($stateWiseDisbursement->Disbursement_Amount/10000000,4)}} Cr.
                                    </td>
                                    <td>
                                        {{$disbursementPC}} %
                                    </td>
                                    <td>
                                        <div class="progress">
                                            @if($disbursementPC<'50') <div title="{{$disbursementPC}} %" class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: {{$disbursementPC}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                        @elseif ($disbursementPC>'50' && $disbursementPC<'70') <div title="{{$disbursementPC}} %" class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: {{$disbursementPC}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                    </div>
                    @elseif ($disbursementPC>'70')
                    <div title="{{$disbursementPC}} %" class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: {{$disbursementPC}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                </div>
                </td>
                @empty
                <tr>
                    <td colspan="6" align="center">No Records Found !!</td>
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
</div>

<script type="text/javascript" src="{{ asset('assets/js/loader.js') }}"></script>
<script src="https://www.google.com/jsapi"></script>
<script>
    $(document).ready(function() {
        $("#linechart").hide();
        displayColumnChart();
    });

    $(function() {
        $("#line").click(function() {
            $("#linechart").show();
            $("#columnchart").hide();
            displayLineChart();
        });
        $("#column").click(function() {
            $("#linechart").hide();
            $("#columnchart").show();
            displayColumnChart();
        });
    });

    function displayLineChart() {
        var claimDisbursement = <?php echo $claimDisbursement; ?>;
        //console.log(claimDisbursement);
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(lineChart);

        function lineChart() {
            var data = google.visualization.arrayToDataTable(claimDisbursement);
            var options = {
                colors: ['#2196f3', '#ffaf00'],
                is3D: true,
                smoothLine: true,
                curveType: 'function',
                hAxis: {
                    areaOpacity: 0.3,
                    title: 'Year',
                    titleTextStyle: {
                        color: '#404040'
                    }
                },
                vAxis: {
                    title: 'Amount',
                    viewWindow: {
                        min: 1000
                    }
                },
                // For the legend to fit, we make the chart area smaller
                chartArea: {
                    width: '85%',
                    height: '50%'
                },
                legend: {
                    position: 'bottom'
                },
                animation: {
                    duration: 400,
                    startup: true //This is the new option
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    }

    function displayColumnChart() {
        var claimDisbursement = <?php echo $claimDisbursement; ?>;
        // console.log(claimDisbursement);
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(clmChart);

        function clmChart() {
            var data = google.visualization.arrayToDataTable(claimDisbursement);
            var options = {
                colors: ['#2196f3', '#ffaf00'],
                is3D: true,
                curveType: 'function',
                hAxis: {
                    areaOpacity: 0.3,
                    title: 'Year',
                    titleTextStyle: {
                        color: '#404040'
                    }
                },
                vAxis: {
                    areaOpacity: 0.3,
                    title: 'Amount',
                    minValue: 1000
                },
                // For the legend to fit, we make the chart area smaller
                chartArea: {
                    width: '85%',
                    height: '50%'
                },
                legend: {
                    position: 'bottom'
                },
                animation: {
                    duration: 400,
                    startup: true //This is the new option
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
            // var chart2 = new google.charts.Bar(document.getElementById('columnchart'));
            // chart2.draw(data, google.charts.Bar.convertOptions(options));
            chart.draw(data, options);
        }
    }
</script>