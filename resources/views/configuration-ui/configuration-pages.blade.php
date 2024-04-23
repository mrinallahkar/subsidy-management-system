<div id="ajaxLoadPage">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                                <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-settings"></i>
                                    <span class="menu-title" style="font-weight: bold;">Configuration</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                        </table>
                        <div class="bs-example">
                            <div class="accordion" id="accordionExample">
                                <div class="result"></div>
                                <div class="card">
                                    @include('configuration-ui.panels.users')
                                </div>
                                <div class="card">
                                    @include('configuration-ui.panels.create-roles')
                                </div>
                                <div class="card">
                                    @include('configuration-ui.panels.user-access')
                                </div>
                                {{-- <div class="card">
                                @include('configuration-ui.panels.create-group')
                            </div> --}}
                            </div>
                        </div>

                    </div>
                    <!-- <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Claim ID </th>
                                <th> Benificiary Name </th>
                                <th> Scheme </th>
                                <th style="text-align:right;"> Claim Amount </th>
                                <th> State </th>
                                <th> Status </th>
                                <th style="text-align:left;"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="left">
                                    1
                                </td>
                                <td align="left">
                                    Two
                                </td>
                                <td align="left">
                                    Three
                                </td>
                                <td align="left">
                                    Four
                                </td>
                                <td align="left">
                                    Five
                                </td>
                                <td align="left">
                                    Six
                                </td>
                                <td align="left">
                                    Seven
                                </td>
                                <td align="left">
                                    Eight
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    1
                                </td>
                                <td align="left">
                                    Two
                                </td>
                                <td align="left">
                                    Three
                                </td>
                                <td align="left">
                                    Four
                                </td>
                                <td align="left">
                                    Five
                                </td>
                                <td align="left">
                                    Six
                                </td>
                                <td align="left">
                                    Seven
                                </td>
                                <td align="left">
                                    Eight
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    1
                                </td>
                                <td align="left">
                                    Two
                                </td>
                                <td align="left">
                                    Three
                                </td>
                                <td align="left">
                                    Four
                                </td>
                                <td align="left">
                                    Five
                                </td>
                                <td align="left">
                                    Six
                                </td>
                                <td align="left">
                                    Seven
                                </td>
                                <td align="left">
                                    Eight
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .bs-example {
            margin: 20px;
        }

        .accordion .fa {
            margin-right: 0.5rem;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Add minus icon for collapse element which is open by default
            $(".collapse.show").each(function() {
                $(this).prev(".card-header").find(".fa").addClass(" fa-minus").removeClass(" fa-plus");
            });

            // Toggle plus minus icon on show hide of collapse element
            $(".collapse").on('show.bs.collapse', function() {
                $(this).prev(".card-header").find(".fa").removeClass(" fa-plus").addClass(" fa-minus");
            }).on('hide.bs.collapse', function() {
                $(this).prev(".card-header").find(".fa").removeClass(" fa-minus").addClass(" fa-plus");
            });
        });
    </script>

    <!-- The Modal -->
    <div class="modal fade" id="modal">
        <div style="width: 90%; text-align:center" class="modal-dialog modal-lg">
            <div id="contModal"></div>
        </div>
    </div>
</div>

@section('page-js-files')
<link href="{{ asset('assete/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

<link href="{{ asset('assete/css/chosen.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
@stop