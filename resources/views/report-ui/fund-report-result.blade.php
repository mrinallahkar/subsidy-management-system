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
                                            <div class="invoice-tittle">
                                                <!-- <h4><b>Fund Received Report</b></h4> -->
                                            </div>
                                        </div>
                                        <!-- col-lg-6 end here -->
                                        <div class="col-lg-5">
                                            <!-- col-lg-6 start here -->
                                            <div class="invoice-from">
                                                <div class="col-lg text-right" style="font-size:12px">
                                                    <h4><b>Fund Received Report</b></h4>
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
                                                    <div class="h7"><b><span>SLC Date Duration:</span></b> @if(!empty($from)) {{date('d-m-Y', strtotime( $from))}} - {{date('d-m-Y', strtotime( $to))}} @else - - - - @endif</div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="invoice-items">
                                                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                                <table id="dataTable" class="table1 table-bordered" cellpadding="5" style="font-size:9pt;" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th> # </th>
                                                                <th> Sanction Letter </th>
                                                                <th> Sanction Date </th>
                                                                <th> Scheme </th>
                                                                <th class="text-right"> Sanction Amount </th>
                                                                <th class="text-right"> Balance Amount </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $totalSanc =0;
                                                            $sub_totalSanc =0;
                                                            $totalBal =0;
                                                            $sub_totalBal =0;
                                                            $total =0;
                                                            $count =0;
                                                            $length=0;
                                                            $scheme ='';
                                                            $year='';
                                                            @endphp
                                                            @php $length=count($subsidyFund); @endphp
                                                            @forelse ($subsidyFund as $subsidyFund)
                                                            @if ($groupby=='Scheme Wise')
                                                                @if($subsidyFund->Scheme_Name!=$scheme)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="4" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_totalSanc,2)}}</th>
                                                                    <th class="text-right">{{number_format($sub_totalBal,2)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $scheme=$subsidyFund->Scheme_Name; @endphp
                                                                @php $count=0; @endphp
                                                                @php $sub_totalSanc=0; @endphp
                                                                @php $sub_totalBal=0; @endphp
                                                                <tr>
                                                                    <td colspan="6" style="background: #CCC; font-weight:bold;">{{$subsidyFund->Scheme_Name}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif
                                                            @if ($groupby=='Year Wise')
                                                                @if(date('Y',strtotime($subsidyFund->Sanction_Date))!=$year)
                                                                @if ($loop->iteration>1)
                                                                <tr>
                                                                    <th colspan="4" class="text-right">Sub Total Rs.:</th>
                                                                    <th class="text-right">{{number_format($sub_totalSanc,2)}}</th>
                                                                    <th class="text-right">{{number_format($sub_totalBal,2)}}</th>
                                                                </tr>
                                                                @endif
                                                                @php $year=date('Y',strtotime($subsidyFund->Sanction_Date)); @endphp
                                                                @php $count=0; @endphp
                                                                @php $sub_totalSanc=0; @endphp
                                                                @php $sub_totalBal=0; @endphp
                                                                <tr>
                                                                    <td colspan="6" style="background: #CCC; font-weight:bold;">{{date('Y',strtotime($subsidyFund->Sanction_Date))}}</td>
                                                                </tr>
                                                                @endif
                                                            @endif  
                                                            @php $count=$count+1; @endphp
                                                            @php $sub_totalSanc=$sub_totalSanc+$subsidyFund->Sanction_Amt; @endphp    
                                                            @php $sub_totalBal=$sub_totalBal+$subsidyFund->Fund_Bal; @endphp    
                                                            <tr>
                                                                <td> {{$loop->iteration}} </td>
                                                                <td> {{$subsidyFund->Sanction_Letter}} </td>
                                                                <td> {{ date('d-M-Y', strtotime($subsidyFund->Sanction_Date))}}</td>
                                                                <td> {{$subsidyFund->Scheme_Name}}</td>
                                                                <td class="text-right"> {{number_format($subsidyFund->Sanction_Amt,2)}} </td>
                                                                <td class="text-right"> {{number_format($subsidyFund->Fund_Bal,2)}} </td>
                                                                @php $totalSanc=$totalSanc+$subsidyFund->Sanction_Amt; @endphp
                                                                @php $totalBal=$totalBal+$subsidyFund->Fund_Bal; @endphp
                                                            </tr>
                                                            @if ($length==$loop->iteration)
                                                            <tr>
                                                                <th colspan="4" class="text-right">Sub Total Rs.:</th>
                                                                <th class="text-right">{{number_format($sub_totalSanc,2)}}</th>
                                                                <th class="text-right">{{number_format($sub_totalBal,2)}}</th>
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
                                                                <th colspan="4" class="text-right">Total Rs.:</th>
                                                                <th class="text-right">{{number_format($totalSanc,2)}}</th>
                                                                <th class="text-right">{{number_format($totalBal,2)}}</th>
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