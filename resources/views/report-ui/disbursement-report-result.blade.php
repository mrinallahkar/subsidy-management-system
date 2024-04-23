<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row invoice row-printable" id="export">
                        <div class="col-md-12">
                            <!-- col-lg-12 start here -->
                            <div class="panel panel-default plain" id="dash_0">
                                <!-- Start .panel -->
                                <div class="panel-body p30">
                                    <div class="row">
                                        <!-- Start .row -->
                                        <div class="col-lg-4">
                                            <!-- col-lg-6 start here -->
                                            <div class="invoice-logo"><img width="60" src="{{ url('assets/images/favicon.ico') }}" alt="NEDFi logo"></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <!-- col-lg-6 start here -->
                                            <!-- <div class="invoice-tittle">
                                                <h4><b>Claim Received Report</b></h4>
                                            </div> -->
                                        </div>
                                        <!-- col-lg-6 end here -->
                                        <div class="col-lg-5">
                                            <!-- col-lg-6 start here -->
                                            <div class="invoice-from">
                                                <div class="col-lg text-right" style="font-size:12px">
                                                    <h4><b>Disbursement Report</b></h4>
                                                    <h7><b>North Eastern Development Finance Corporation Ltd</b>
                                                    </h7>
                                                    </br>
                                                    <h7><b>नार्थ ईस्टर्न डेवलपमेंट फाइनेंस कारपोरेशन लिमिटिड</b>
                                                    </h7>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <!-- col-lg-6 end here -->
                                        <div class="col-lg-12">
                                        <br>
                                            <!-- col-lg-12 start here -->
                                            <div class="invoice-details mt25">
                                                <div class="well" style="font-size:12px">
                                                    <div class="h7"><b><span>Scheme:</span></b> @if(!empty($scheme_name)) {{$scheme_name}} @else - - - - @endif</div>
                                                    <div class="h7"><b><span>Group By:</span></b>  @if(!empty($groupby)) {{$groupby}} @else - - - - @endif</div>
                                                    <div class="h7"><b><span>Report Type:</span></b> Unit Wise</div>
                                                    <div class="h7"><b><span>Date Duration:</span></b>  @if(!empty($from)) {{date('d-m-Y', strtotime( $from))}} - {{date('d-m-Y', strtotime( $to))}} @else - - - - @endif</div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="invoice-items">
                                                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                                    <table id="dataTable" class="table1 table-bordered" cellpadding="5" style="font-size:9pt;" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="4%"> # </th>
                                                                <th width="11%"> Unit Name </th>
                                                                <th width="12%"> Address </th>
                                                                <th width="8%"> NEIPP Scheme </th>
                                                                <th width="8%"> Goods </th>
                                                                <th width="8%"> Raw Material </th>
                                                                <th width="8%"> Prduction Date </th>
                                                                <th width="8%"> SLC Date </th>
                                                                <th width="8%"> Claim Period </th>
                                                                <th width="8%"> Chq. No. </th>
                                                                <th width="8%"> Chq. Date </th>
                                                                <th width="*%" style="text-align:right;"> Paid Amount </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $total =0;
                                                            $count =0;
                                                            $sub_total =0;
                                                            $length=0;
                                                            $state ='';
                                                            $scheme ='';
                                                            $year='';
                                                            $claim='';
                                                            $unit='';
                                                            @endphp
                                                            @php $length=count($smsClaimMaster); @endphp
                                                            @forelse ($smsClaimMaster as $smsClaimMaster)
                                                            @if ($groupby=='State Wise')
                                                                @if($smsClaimMaster->State_Name!=$state)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="11" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_total,2)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $state=$smsClaimMaster->State_Name; @endphp
                                                                @php $count=0; @endphp
                                                                @php $sub_total=0; @endphp
                                                                <tr>
                                                                    <td colspan="12" style="background: #CCC; font-weight:bold;">{{$smsClaimMaster->State_Name}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif
                                                            <!-- Scheme wise -->
                                                            @if ($groupby=='Scheme Wise')
                                                                @if($smsClaimMaster->Scheme_Name!=$scheme)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="11" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_total,2)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $scheme=$smsClaimMaster->Scheme_Name; @endphp
                                                                @php $count=0; @endphp
                                                                @php $sub_total=0; @endphp
                                                                <tr>
                                                                    <td colspan="12" style="background: #CCC; font-weight:bold;">{{$smsClaimMaster->Scheme_Name}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif

                                                            @php $count=$count+1; @endphp
                                                            @php $sub_total=$sub_total+$smsClaimMaster->Disbursement_Amt; @endphp
                                                            <tr>
                                                                <td> {{$count}}</td>
                                                                <td> {{$smsClaimMaster->Benificiary_Name}}</td>
                                                                <td> {{$smsClaimMaster->Address1}} {{$smsClaimMaster->Address2}} </td>
                                                                <td> {{$smsClaimMaster->Policy_Name}} </td>
                                                                <td> {{$smsClaimMaster->Goods_Name }}</td>
                                                                <td> {{$smsClaimMaster->Material_Name}} </td>
                                                                <td> @if(!empty($smsClaimMaster->Production_Date)) {{date('d-m-Y', strtotime($smsClaimMaster->Production_Date))}} @else - - - - @endif</td>
                                                                </td>
                                                                <td> @if(!empty($smsClaimMaster->Slc_Date)) {{date('d-m-Y', strtotime($smsClaimMaster->Slc_Date))}} @else - - - - @endif</td>
                                                                <td> @if(!empty($smsClaimMaster->Claim_From_Date)) {{date('d-m-Y', strtotime($smsClaimMaster->Claim_From_Date))}} to {{date('d-m-Y', strtotime($smsClaimMaster->Claim_To_Date))}} @else - - - - @endif</td>
                                                                <td> {{$smsClaimMaster->Instrument_No}}</td>
                                                                <td> {{date('d-m-Y', strtotime($smsClaimMaster->Instrument_Date))}}</td>
                                                                <td align="right"> {{number_format($smsClaimMaster->Disbursement_Amt,2)}} </td>
                                                                @php $total=$total+$smsClaimMaster->Disbursement_Amt; @endphp
                                                            </tr>
                                                            @if ($length==$loop->iteration)
                                                            <tr>
                                                                <th colspan="11" class="text-right">Sub Total Rs.:</th>
                                                                <th class="text-right">{{number_format($sub_total,2)}}</th>
                                                            </tr>
                                                            @endif
                                                            @empty
                                                            <tr>
                                                                <td colspan="12" align="center" width="100%">No Records Found !!</td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="11" class="text-right">Grand Total Rs.:</th>
                                                                <th class="text-right">{{number_format($total,2)}}</th>
                                                            </tr>
                                                            <!-- <tr>
                                                                <th colspan="6" class="text-right">20% VAT:</th>
                                                                <th class="text-center">$47.40 USD</th>
                                                            </tr> -->
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="invoice-footer mt25">
                                                <p class="text-center">Generated on {{date('d-m-Y', strtotime( $current))}}</p>
                                            </div>
                                        </div>
                                        <!-- col-lg-12 end here -->
                                    </div>
                                    <!-- End .row -->
                                </div>
                            </div>
                            <!-- End .panel -->
                        </div>
                        <!-- col-lg-12 end here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>