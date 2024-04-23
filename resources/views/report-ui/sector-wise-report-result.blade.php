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
                                                    <h4><b>Sector Wise Report</b></h4>
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
                                                    <div class="h7"><b><span>Group By:</span></b> @if(!empty($groupby)) {{$groupby}} @else - - - - @endif</div>
                                                    <div class="h7"><b><span>Report Type:</span></b> Unit Wise</div>
                                                    <div class="h7"><b><span>Date Duration:</span></b> @if(!empty($from)) {{date('d-m-Y', strtotime( $from))}} - {{date('d-m-Y', strtotime( $to))}} @else - - - - @endif</div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="invoice-items">
                                                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                                    <table id="dataTable" class="table1 table-bordered" cellpadding="5" style="font-size:9pt;" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="4%"> # </th>
                                                                <th width="20%"> Sector Name </th>
                                                                <th width="18%"> Claim Nos. </th>
                                                                <th width="18%" style="text-align:right;"> Claim Amount </th>
                                                                <th width="20%" style="text-align:right;"> Disbursement Amount </th>
                                                                <th width="20%" style="text-align:right;"> Balance Amount </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $total_claim =0;
                                                            $total_disbursement =0;
                                                            $total_balance =0;
                                                            $count =0;
                                                            $sub_total_claim =0;
                                                            $sub_total_disbursement =0;
                                                            $sub_total_balance =0;
                                                            $length=0;
                                                            $state ='';
                                                            $scheme='';
                                                            $sector='';
                                                            @endphp
                                                            @php $length=count($smsSectorWiseReport); @endphp
                                                            @forelse ($smsSectorWiseReport as $smsSectorWiseReport)
                                                            @if($groupby=='State Wise')
                                                                @if($smsSectorWiseReport->State_Name!=$state)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="3" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_total_claim,2)}}</th>
                                                                    <th class="text-right">{{number_format($sub_total_disbursement,2)}}</th>
                                                                    <th class="text-right">{{number_format($sub_total_balance,2)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $state=$smsSectorWiseReport->State_Name; @endphp
                                                                @php $count=0; @endphp
                                                                @php $sub_total_claim=0; @endphp
                                                                @php $sub_total_disbursement=0; @endphp
                                                                @php $sub_total_balance=0; @endphp
                                                                <tr>
                                                                    <td colspan="6" style="background: #CCC; font-weight:bold;">{{$smsSectorWiseReport->State_Name}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif
                                                            @if ($groupby=='Scheme Wise')
                                                            @if($smsSectorWiseReport->Scheme_Name!=$scheme)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="3" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_total_claim,2)}}</th>
                                                                    <th class="text-right">{{number_format($sub_total_disbursement,2)}}</th>
                                                                    <th class="text-right">{{number_format($sub_total_balance,2)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $scheme=$smsSectorWiseReport->Scheme_Name; @endphp
                                                                @php $count=0; @endphp
                                                                @php $sub_total_claim=0; @endphp
                                                                @php $sub_total_disbursement=0; @endphp
                                                                @php $sub_total_balance=0; @endphp
                                                                <tr>
                                                                    <td colspan="6" style="background: #CCC; font-weight:bold;">{{$smsSectorWiseReport->Scheme_Name}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif
                                                            @if ($groupby=='Sector Wise')
                                                            @if($smsSectorWiseReport->Sector_Name!=$sector)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="3" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_total_claim,2)}}</th>
                                                                    <th class="text-right">{{number_format($sub_total_disbursement,2)}}</th>
                                                                    <th class="text-right">{{number_format($sub_total_balance,2)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $sector=$smsSectorWiseReport->Sector_Name; @endphp
                                                                @php $count=0; @endphp
                                                                @php $sub_total_claim=0; @endphp
                                                                @php $sub_total_disbursement=0; @endphp
                                                                @php $sub_total_balance=0; @endphp
                                                                <tr>
                                                                    <td colspan="6" style="background: #CCC; font-weight:bold;">{{$smsSectorWiseReport->Sector_Name}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif
                                                            @php $count=$count+1; @endphp
                                                            @php $sub_total_claim=$sub_total_claim+$smsSectorWiseReport->Claim_Amount; @endphp
                                                            @php $sub_total_disbursement=$sub_total_disbursement+$smsSectorWiseReport->Disbursement_Amt; @endphp
                                                            @php $sub_total_balance=$sub_total_balance+($smsSectorWiseReport->Claim_Amount-$smsSectorWiseReport->Disbursement_Amt); @endphp
                                                            <tr>
                                                                <td>{{$count}}</td>
                                                                <td>{{$smsSectorWiseReport->Sector_Name}}</td>
                                                                <td>{{number_format($smsSectorWiseReport->claim_no,0)}}</td>
                                                                <td align="right"> {{number_format($smsSectorWiseReport->Claim_Amount,2)}} </td>
                                                                <td align="right"> {{number_format($smsSectorWiseReport->Disbursement_Amt,2)}} </td>
                                                                <td align="right"> {{number_format(($smsSectorWiseReport->Claim_Amount-$smsSectorWiseReport->Disbursement_Amt),2)}} </td>
                                                                @php $total_claim=$total_claim+$smsSectorWiseReport->Claim_Amount; @endphp
                                                                @php $total_disbursement=$total_disbursement+$smsSectorWiseReport->Disbursement_Amt; @endphp
                                                                @php $total_balance=$total_balance+($smsSectorWiseReport->Claim_Amount-$smsSectorWiseReport->Disbursement_Amt); @endphp
                                                            </tr>
                                                            @if ($length==$loop->iteration)
                                                            <tr>
                                                                <th colspan="3" class="text-right">Sub Total Rs.:</th>
                                                                <th class="text-right">{{number_format($sub_total_claim,2)}}</th>
                                                                <th class="text-right">{{number_format($sub_total_disbursement,2)}}</th>
                                                                <th class="text-right">{{number_format($sub_total_balance,2)}}</th>
                                                            </tr>
                                                            @endif
                                                            @empty
                                                            <tr>
                                                                <td colspan="6" align="center" width="100%">No Records Found !!</td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="3" class="text-right">Grand Total Rs.:</th>
                                                                <th class="text-right">{{number_format($total_claim,2)}}</th>
                                                                <th class="text-right">{{number_format($total_disbursement,2)}}</th>
                                                                <th class="text-right">{{number_format($total_balance,2)}}</th>
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