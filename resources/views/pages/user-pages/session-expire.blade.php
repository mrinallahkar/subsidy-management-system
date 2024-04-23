@extends('layout.master-mini')
@section('content')

<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">

            <div class="auto-form-wrapper">
                <div class="col-sm-0" style="text-align: left; margin-top:-20px;">
                    <img src="{{ url('assets/images/favicon.ico') }}" alt="logo" />
                    <span class="card-title" style="margin-left:30px; font-size:1.1em; color:#205a9e; font-family:Verdana, Geneva, Tahoma, sans-serif">Your session has expired<span>
                </div>
                <br>
                <div class="table-responsive">
                    <form class="pt-5">
                        <div class="form-group text-center">
                            <img height="120" src="{{ url('assets/images/reload.png') }}" alt="logo" />
                            <br>
                            <br>
                            Please <a href="{{ url('/') }}">click here</a> to reload the page 
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