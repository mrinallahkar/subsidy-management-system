@extends('layout.master')

@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th> # </th>
                <th> Sanction Letter </th>
                <th> Sanction Date </th>
                <th> Scheme </th>
                <th style="text-align: right;"> Sanction Amount </th>
                <th style="text-align: right;"> Balance Amount </th>
                <th style="text-align:right;"> Action </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($subsidyFund as $subsidyFund)
              <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$subsidyFund->Sanction_Letter}} </td>
                <td> {{$subsidyFund->Sanction_Date->format('d-M-Y') }} </td>
                <td> {{$subsidyFund->Scheme_Name}}</td>
                <td style="text-align: right;"> {{ number_format($subsidyFund->Sanction_Amount,2) }} </td>
                <td style="text-align: right;"> {{ number_format($subsidyFund->Fund_Balance, 2) }} </td>
                <td align="right">
                  <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#addFundAllocation" onclick="addAllocationModal('{{ url('fund-allocation.add-fund-allocation-modal')}}','modal','addedFundForm',{{$subsidyFund->Pkid}},{{$subsidyFund->Scheme_Pk}} )">
                    <i class="mdi mdi mdi-plus"></i>Allocate</button>
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
@endsection

@section('page-js-files')
<!-- Bootstrap js -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- jQuery Datatable js -->
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
@stop

@section('page-js-script')
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
@stop