<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row invoice row-printable">
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
                                                    <h4><b>Pending Claim Report</b></h4>
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
                                                    <table id="dataTable" width="100%" style="font-size:9pt;" class="table1 table-bordered" cellpadding="5">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%"> # </th>
                                                                <th width="12%"> Unit Name </th>
                                                                <th width="13%"> Address </th>
                                                                <th width="10%"> NEIPP Scheme </th>
                                                                <th width="10%"> SLC Date </th>
                                                                <th width="10%"> App. Date </th>
                                                                <th width="10%"> Investment On PM </th>
                                                                <th width="10%" style="text-align:right;"> Amount </th>
                                                                <th width="10%" style="text-align:right;"> Paid Amount </th>
                                                                <th width="12%" style="text-align:right;"> Balance </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $balance =0;
                                                            $total =0;
                                                            $count =0;
                                                            $sub_total =0;
                                                            $length=0;
                                                            $state ='';
                                                            $scheme ='';
                                                            @endphp
                                                            @php $length=count($smsClaimMaster); @endphp
                                                            @forelse ($smsClaimMaster as $smsClaimMaster)
                                                            @if ($groupby=='State Wise')
                                                                @if($smsClaimMaster->State_Name!=$state)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="9" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_total,3)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $count=0; @endphp
                                                                @php $sub_total=0; @endphp
                                                                @php $state=$smsClaimMaster->State_Name; @endphp
                                                                <tr>
                                                                    <td colspan="10" style="background: #CCC; font-weight:bold;">{{$smsClaimMaster->State_Name}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif  
                                                            @if ($groupby=='Scheme Wise')  
                                                            @if($smsClaimMaster->Scheme_Name!=$scheme)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="9" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_total,3)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $count=0; @endphp
                                                                @php $sub_total=0; @endphp
                                                                @php $scheme=$smsClaimMaster->Scheme_Name; @endphp
                                                                <tr>
                                                                    <td colspan="10" style="background: #CCC; font-weight:bold;">{{$smsClaimMaster->Scheme_Name}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif    
                                                            @php $count=$count+1; @endphp
                                                            @php $sub_total=$sub_total+($smsClaimMaster->Claim_Amt-$smsClaimMaster->Allocated_Amt); @endphp
                                                            <tr>
                                                                @php $balance=$smsClaimMaster->Balance; @endphp
                                                                <td>{{$count}} </td>
                                                                <td> {{$smsClaimMaster->Benificiary_Name}}</td>
                                                                <td> {{$smsClaimMaster->Address1}} {{$smsClaimMaster->Address2}} </td>
                                                                <td> @if(!empty($smsClaimMaster->Policy_Name)){{$smsClaimMaster->Policy_Name}} @else - - - - -@endif</td>
                                                                <td> @if(!empty($smsClaimMaster->Slc_Date)){{date('d-m-Y', strtotime($smsClaimMaster->Slc_Date))}} @else - - - - -@endif</td>
                                                                <td> {{date('d-m-Y', strtotime($smsClaimMaster->Received_Date))}}</td>
                                                                <td align="right"> {{number_format($smsClaimMaster->PM,3)}}</td>
                                                                <td align="right"> {{number_format($smsClaimMaster->Claim_Amt,3)}} </td>
                                                                <td align="right"> {{number_format($smsClaimMaster->Allocated_Amt,3)}} </td>
                                                                <td align="right"> {{number_format($balance,3)}} </td>
                                                                @php $total=$total+$balance; @endphp
                                                            </tr>
                                                            @if ($length==$loop->iteration)
                                                            <tr>
                                                                <th colspan="9" class="text-right">Sub Total Rs.:</th>
                                                                <th class="text-right">{{number_format($sub_total,3)}}</th>
                                                            </tr>
                                                            @endif
                                                            @empty
                                                            <tr>
                                                                <td colspan="10" align="center">No Records Found !!</td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="9" class="text-right">Grand Total Rs.:</th>
                                                                <th class="text-right">{{number_format($total,3)}}</th>
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