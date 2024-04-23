<div id="ajaxLoadPage">
    <div class="result"></div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                                <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-settings"></i>
                                    <span class="menu-title" style="font-weight: bold;">Master Settings</span>
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

                                <div class="card">
                                    @include('master-ui.panels.unit-master-panel')
                                </div>
                                <div class="card">
                                    @include('master-ui.panels.raw-material-panel')
                                </div>
                                <div class="card">
                                    @include('master-ui.panels.finish-goods-panel')
                                </div>
                                <div class="card">
                                    @include('master-ui.panels.subsidy-master-panel')
                                </div>
                                <div class="card">
                                    @include('master-ui.panels.bank-master-panel')
                                </div>
                                <div class="card">
                                    @include('master-ui.panels.remark-master-panel')
                                </div>
                                {{-- <div class="card">
                                @include('master-ui.panels.fund-master-panel')
                            </div> --}}
                            </div>
                        </div>
                    </div>
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
        <div style="width: 70%; text-align:left" class="modal-dialog modal-lg">
            <div id="contModal"></div>
        </div>
    </div>

    <!-- End Tabs -->
    <div class="modal fade" id="editModal">
        <div style="width: 50%; text-align:left" class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Add Raw Material</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->

                <div class="modal-body">
                    <div class="result"></div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form method="POST" id="editRawForm">
                                            <div id="viewEditModal">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
 