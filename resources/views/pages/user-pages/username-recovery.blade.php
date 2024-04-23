@extends('layout.master-mini')
@section('content')

<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">

            <div class="auto-form-wrapper">
                <div class="col-sm-0" style="text-align: left; margin-top:-20px;">
                    <img src="{{ url('assets/images/favicon.ico') }}" alt="logo" />
                </div>
                <br>
                <span class="card-title text-center" style="margin-left:0px; font-size:.8em; color:#205a9e; font-family:Verdana, Geneva, Tahoma, sans-serif">Your user ID has been sent to the registered email address.<span>
                        <div class="table-responsive">
                            <form class="pt-5">

                                <div class="form-group text-center">
                                    Please <a href="{{ url('/') }}"><span style="color: red;">click here</span></a> to login with recovered ID!
                                </div>
                                <div class="mt-3 text-center">
                                </div>
                            </form>
                        </div>
                        </form>
            </div>

            <!--<p class="footer-text text-center">Copyright ©  <a href="http://www.nedfi.com/" target="_blank">NEDFi</a>. All rights reserved.</p>-->
        </div>
    </div>
</div>
@endsection