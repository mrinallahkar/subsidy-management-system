
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
                                    <span class="menu-title" style="font-weight: bold;">Fund Receipt Report</span>
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
                                <form id="generateFundReport" method="POST">
                                <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Sanction Letter </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" id="sanction_letter" name="sanction_letter" autofocus />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Received From Date </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="date" id="registered_From_Date" name="registered_From_Date" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Received To Date </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="date" id="registered_To_Date" name="registered_To_Date" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Scheme <!-- <span class="text-danger">*</span>--> </label>
                                                    <div class="col-sm-10">
                                                        <select style="width:170px; text-align:left" name="scheme_id" id="scheme_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="">--Select--</option>
                                                            @foreach($TbCmnSchemeMaster as $TbCmnSchemeMaster)
                                                            <option value="{{$TbCmnSchemeMaster->Pkid}}" {{--  {{$country_data->Product_Name == $country->country_id  ? 'selected' : ''}} --}}>{{$TbCmnSchemeMaster->Scheme_Name}}</option>
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
                                                             <option value="2">Scheme Wise</option>
                                                             <option value="3">Year Wise</option>
                                                         </select>
                                                     </div>
                                                 </td>
                                                <td>
                                                    <label for="" class="col-sm-2 form-control-label">Amount In</label>
                                                    <div class="col-sm-10" aria-colspan="2">
                                                        <select style="width:150px; text-align:left" name="amount_id" id="amount_id" class="btn btn-secondary dropdown-toggle">
                                                            <option value="1">Actual</option>
                                                            <option value="100000">Lakh</option>
                                                            <option value="10000000">Cr</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                </td>
                                            </tr>
                                            <tr class="header">
                                                <td colspan="4" align="center">
                                                    <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="searchWithInput(this,'{{url('report-ui.generate-fund-report')}}','searchResult','generateFundReport','benificiary_name');">
                                                        <i class="mdi mdi-magnify"></i>Generate</button>
                                                    <button id="btnPrint" type="button" disabled onclick="printDiv('searchResult','Fund Report');" class="btn btn-primary hidden-print">
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
<!-- <script type="text/javascript" src="{{ asset('assets/tableExport/html2canvas.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ asset('assets/tableExport/jspdf/1.5.3/jspdf.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('assets/tableExport/jquery.base64.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/export.js') }}"></script>