<script>
    $("#generateSectorWiseReport").submit(function() {
        return false;
    });
</script>
<div id="ajaxLoadPage">
    <div class="result"></div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                                <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-account-box-multiple text-danger mdi-elevation-rise"></i>
                                    <span class="menu-title" style="font-weight: bold;">Sector Wise Report</span>
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
                                <span class="menu-title" style="font-weight: bold;">Search</span>
                            </legend>
                            <div class="table-responsive">
                                <form id="generateSectorWiseReport" method="POST">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Sector Name</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" id="sector_id" name="sector_id" class="btn btn-secondary dropdown-toggle chosen">
                                                            <option value="">--Select--</option>
                                                            @foreach ( $sectorMaster as $sectorMaster)
                                                            <option value="{{$sectorMaster->Pkid}}">{{$sectorMaster->Sector_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">SLC From Date</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <input class="form-control" type="date" id="from_date" name="from_date" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">SLC To Date</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <input class="form-control" type="date" id="to_date" name="to_date" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Scheme <!-- <span class="text-danger">*</span>--> </label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" id="scheme_id" name="scheme_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            @foreach ( $TbCmnSchemeMaster as $TbCmnSchemeMaster)
                                                            <option value="{{$TbCmnSchemeMaster->Pkid}}">{{$TbCmnSchemeMaster->Scheme_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Group By</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="group" id="group" class="btn btn-secondary dropdown-toggle">
                                                            <option value="1">State Wise</option>
                                                            <option value="2">Scheme Wise</option>
                                                            <option value="3">Year Wise</option>
                                                            <option value="4">Claim Wise</option>
                                                            <option value="5">Sector Wise</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Report Type</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="report_type" class="btn btn-secondary dropdown-toggle" onchange="getDistrictPerState(this.value,'#district_id','{{url('fill-district-onChange')}}');">
                                                            <option value="1">Unit Wise</option>
                                                            <!-- <option value="2">Summary</option> -->
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">State</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="state_id" class="btn btn-secondary dropdown-toggle" onchange="getDistrictPerState(this.value,'#district_id','{{url('fill-district-onChange')}}');">
                                                            <option value="">--Select--</option>
                                                            @foreach ( $TbCmnStateMaster as $TbCmnStateMaster)
                                                            <option value="{{$TbCmnStateMaster->Pkid}}">{{$TbCmnStateMaster->State_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Short By</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="short_id" id="short_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="1">Alphabeticaly</option>
                                                            <option value="2">Claim Received Date</option>
                                                            <option value="3">SLC Date</option>
                                                            <option value="4">Date of Payment</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <label for="" class="col-sm-2 form-control-label">Amount In</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="amount_id" id="amount_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="1">Actual</option>
                                                            <option value="100000">Lakh</option>
                                                            <option value="10000000">Cr</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="header">
                                                <td colspan="4" align="center">
                                                    <button type="submit" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('report-ui.generate-sector-wise-report')}}','searchResult','generateSectorWiseReport','sector_id');">
                                                        <i class="mdi mdi-magnify"></i>Generate</button>
                                                    <!-- <a id="print" type="button" href="{{ url("generate-pdf") }}" target="_blank" class="btn btn-primary hidden-print"><i class="mdi mdi-printer"></i>Print</a> -->
                                                    <button id="btnPrint" type="button" disabled onclick="printDiv('searchResult','Sector Wise Report');" class="btn btn-primary hidden-print">
                                                        <i class="mdi mdi-printer"></i>Print</button>
                                                    <button type="button" class="btn btn-primary hidden-print" id="btnExport" disabled data-type="excel">
                                                        <i class="mdi mdi-file-excel-box"></i>Export</button>
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

    </div>
</div>
<script type="text/javascript" src="{{ asset('assets/tableExport/tableExport.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/tableExport/html2canvas.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/tableExport/jquery.base64.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/export.js') }}"></script>
