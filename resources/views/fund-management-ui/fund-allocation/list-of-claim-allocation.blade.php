<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">List of Fund Allocation:
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>

                    </table>
                    <table id="example"  class="display table table-striped table-bordered no-footer" width="100%">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Sanction Letter </th>
                                <th> Scheme </th>
                                <th style="text-align:right;"> Sanction Amount </th>
                                <th style="text-align:right;"> Allocated Amount </th>
                                <th> Status </th>
                                <th style="text-align:right;"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fundAllocation as $fundAllocation)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$fundAllocation->Sanction_Letter}} </td>
                                <td> {{$fundAllocation->Scheme_Name}} </td>
                                <td align="right"> {{number_format($fundAllocation->Sanction_Amount,2)}}</td>
                                <td align="right"> {{number_format($fundAllocation->Total_Allocated_Amount,2)}} </td>
                                <td> {{$fundAllocation->Status_Name}}</td>
                                <td align="right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewFundAllocation" onclick="viewModel({{$fundAllocation->Pkid}},'{{ url('view-edit-fund-allocation') }}','appendFundAllocation','VIW','Fund Allocation');">
                                        <i class="mdi mdi-view-carousel"></i></button>
                                    @if($fundAllocation->Status_Id_Fk==1 or $fundAllocation->Status_Id_Fk==3)
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addFundAllocation" onclick="addAllocationModal('{{ url('fund-allocation.add-fund-allocation-modal')}}','modal','addedFundForm',{{$fundAllocation->Fund_Id_Fk}},{{$fundAllocation->Scheme_Id_Fk}} )">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <a href="javascript:void(0);" onclick="deletePost({{$fundAllocation->Pkid}},'{{url('delete-fund-allocation-master') }}','searchResult')" class="btn btn-danger btn-sm"><i class="mdi mdi mdi-archive"></i>  </a>
                                    @else
                                    <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addFundAllocation" onclick="addAllocationModal('{{ url('fund-allocation.add-fund-allocation-modal')}}','modal','addedFundForm',{{$fundAllocation->Fund_Id_Fk}},{{$fundAllocation->Scheme_Id_Fk}} )">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <button disabled type="button" disabled class="btn btn-danger btn-sm" onclick="deletePost({{$fundAllocation->Pkid}},'{{url('delete-fund-allocation-master') }}','searchResult')" class="btn btn-danger btn-sm">
                                        <i class="mdi mdi mdi-archive"></i>                                        
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
                </div>
            </div>
        </div>
    </div>
</div>