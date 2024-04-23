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
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">

      <div class="auto-form-wrapper">
        
        @if(Session::has('message'))
        <div class="row" style="text-align: center;">
          <div class="col-sm-12">
            <label style="color: #d9534f">{{Session::get('message')}}
            </label>
          </div>
        </div>
        @endif
        <form method="POST" action="{{url('find-user-email')}}">
          {{ csrf_field() }}
          <div class="form-group">
            <span id="reauth-email" class="reauth-email"></span>
            <label class="label">Enter Email</label>
            <div class="input-group">
              <input type="text" class="form-control" id="Email_Id" name="Email_Id" placeholder="Email ID" autofocus>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block" type="submit">Next</button>
            <a class="btn btn-danger submit-btn btn-block" href="{{ url('/') }}">Cancel</a>
            <!-- <a class="btn btn-primary submit-btn btn-block" href="{{ url('dashboard-page') }}">Login</a> -->
            <!-- <button class="btn btn-primary submit-btn btn-block" href="{{ url('dashboard-page') }}">Login</button> -->
          </div>

        </form>
      </div>

      <!--<p class="footer-text text-center">Copyright ©  <a href="http://www.nedfi.com/" target="_blank">NEDFi</a>. All rights reserved.</p>-->
    </div>
  </div>
</div>

@endsection