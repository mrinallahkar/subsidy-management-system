@extends('layout.master-mini')
@section('content')
<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>
<script type="text/javascript" src="{{ asset('assets/js/common_script.js') }}"></script>
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">

            <div class="auto-form-wrapper">
                <div class="col-sm-0" style="text-align: left; margin-top:-20px;">
                    <img src="{{ url('assets/images/favicon.ico') }}" alt="logo" />
                    <!--<span class="card-title" style="margin-left:90px; font-size:2.5em; color:#205a9e; font-family:Verdana, Geneva, Tahoma, sans-serif">SMS<span> -->
                </div>
                <br>
                <div id="ajaxLoadPage">
                    <div class="result" id="result"></div>
                    <div id="return" style="width: 100%;">
                        <form method="POST" id="resetPasswordForm">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="" class="col-sm-15 form-control-label"><span style="font-weight: bold;">User Name :</span> {{$passwordChangeHistory->Username}} </label>
                                            <div class="col-sm-15" aria-colspan="2">
                                                <input type="hidden" id="userPk" name="userPk" value="{{$passwordChangeHistory->UserId}}" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="" class="col-sm-15 form-control-label">Current Password <span class="text-danger">*</span></label>
                                            <div class="col-sm-15" aria-colspan="2">
                                                <input class="form-control" type="password" id="current_pwd" name="current_pwd" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="" class="col-sm-15 form-control-label">New Password <span class="text-danger">*</span></label>
                                            <div class="col-sm-15" aria-colspan="2">
                                                <input class="form-control" type="text" id="new_pwd" name="new_pwd" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="" class="col-sm-15 form-control-label">Confirm Password <span class="text-danger">*</span></label>
                                            <div class="col-sm-15" aria-colspan="2">
                                                <input class="form-control" type="password" id="confirm_pwd" name="confirm_pwd" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <button type="button" class="btn btn-primary btn-fw" id="searchBtn" onclick="changePassword(this,'{{url('reset-password-on-first-login')}}','resetPasswordForm');">
                                                <i class="mdi mdi-content-save"></i>Change</button>
                                            <a class="btn btn-danger btn-fw" href="{{ url('/') }}"><i class="mdi mdi-refresh"></i>Cancel</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <!--<p class="footer-text text-center">Copyright ©  <a href="http://www.nedfi.com/" target="_blank">NEDFi</a>. All rights reserved.</p>-->
        </div>
    </div>
</div>

@endsection