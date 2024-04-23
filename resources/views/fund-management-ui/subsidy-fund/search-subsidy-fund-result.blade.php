<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="width:100%">
                        <tr>
                            <td colspan="2" class="card-title" style="text-align: left; font-weight:bold">Search Fund List:
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
                                <th> Sanction Date </th>
                                <th> Scheme </th>
                                <th style="text-align:right;"> Sanction Amount </th>
                                <th> Status </th>
                                <th width="20%" style="text-align:right;"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subsidyFund as $subsidyFund)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$subsidyFund->Sanction_Letter}} </td>
                                <td> {{ date('d-M-Y', strtotime($subsidyFund->Sanction_Date))}}</td>
                                <td> {{$subsidyFund->Scheme_Name}}</td>
                                <td align="right"> {{number_format($subsidyFund->Sanction_Amount,2)}} </td>
                                <td> {{$subsidyFund->Status_Name}}</td>
                                <td align="right">
                                    <button title="View Record" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$subsidyFund->Pkid}},'{{ url('view-edit-subsidy-fund') }}','appendSubsidyFund','VIW','Subsidy Fund');" data-placement="bottom" title="View Details">
                                        <i class="mdi mdi-view-carousel"></i></button>
                                    @if($subsidyFund->Status_Id==1 or $subsidyFund->Status_Id==3)
                                    <button title="Edit Record" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewSubsidyFund" onclick="viewModel({{$subsidyFund->Pkid}},'{{ url('view-edit-subsidy-fund') }}','appendSubsidyFund','EDT','Subsidy Fund');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <a href="javascript:void(0);" onclick="deletePost({{$subsidyFund->Pkid}},'{{url('save-subsidy-fund') }}','searchResult')" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                    @else
                                    <button title="Edit Record" type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewBenificiary" onclick="viewModel({{$subsidyFund->Pkid}},'{{ url('view-edit-subsidy-fund') }}','appendSubsidyFund','EDT','Subsidy Fund');">
                                        <i class="mdi mdi-grease-pencil"></i></button>
                                    <button title="Delete Record" disabled type="button" class="btn btn-danger btn-sm" onclick="deletePost({{$subsidyFund->Pkid}},'{{url('save-subsidy-fund') }}','searchResult')">
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
                </div>
            </div>
        </div>
    </div>
</div>