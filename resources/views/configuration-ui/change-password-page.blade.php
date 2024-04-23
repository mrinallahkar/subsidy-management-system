<div id="ajaxLoadPage">
    <div class="result" id="result"></div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                                <td colspan="2" class="card-title" style="text-align: left;"><i class="menu-icon mdi mdi-settings"></i>
                                    <span class="menu-title" style="font-weight: bold;">Change Password</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                        </table>
                        <div class="table-responsive">
                            <form method="POST" id="changePasswordForm">
                                <table class="table table-hover" style="border: 1px solid #ababab;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">User Name </label>
                                                <div class="col-sm-5" aria-colspan="2">
                                                    <input type="hidden" id="userPk" name="userPk" value="{{$user->Pkid}}" />
                                                    <label for="" class="form-control-label font-weight-small">{{$user->User_Id}}</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Current Password <span class="text-danger">*</span></label>
                                                <div class="col-sm-5" aria-colspan="2">
                                                    <input class="form-control" type="password" id="current_pwd" name="current_pwd" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">New Password <span class="text-danger">*</span></label>
                                                <div class="col-sm-5" aria-colspan="2">
                                                    <input class="form-control" type="text" id="new_pwd" name="new_pwd" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="" class="col-sm-2 form-control-label">Confirm Password <span class="text-danger">*</span></label>
                                                <div class="col-sm-5" aria-colspan="2">
                                                    <input class="form-control" type="password" id="confirm_pwd" name="confirm_pwd" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="changePassword(this,'{{url('update_password')}}','changePasswordForm');">
                                                    <i class="mdi mdi-content-save"></i>Change</button>
                                                <button type="reset" class="btn btn-light btn-fw">
                                                    <i class="mdi mdi-refresh"></i>Reset</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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