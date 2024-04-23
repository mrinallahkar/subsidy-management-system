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
        <form method="POST" action="{{url('login')}}">
          {{ csrf_field() }}
          <div class="form-group">
            <span id="reauth-email" class="reauth-email"></span>
            <label class="label">Username</label>
            <div class="input-group">
              <input type="text" class="form-control" id="User_Id" name="User_Id" placeholder="Username" autofocus>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="User_Password" name="User_Password" placeholder="*********">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
            <!-- <a class="btn btn-primary submit-btn btn-block" href="{{ url('dashboard-page') }}">Login</a> -->
            <!-- <button class="btn btn-primary submit-btn btn-block" href="{{ url('dashboard-page') }}">Login</button> -->
          </div>
          <div class="form-group d-flex justify-content-between">
            <a href="{{url('forgot-password')}}" class="text-small forgot-password text-black">Forgot Password</a>
            <a href="{{url('forgot-username')}}" class="text-small forgot-password text-black">Forgot Username</a>
          </div>

          <!-- <div class="text-block text-center my-3">
            <span class="text-small font-weight-semibold">Not a member ?</span>
            <a href="{{ url('/user-pages/register') }}" class="text-black text-small">Create new account</a>
          </div> -->
        </form>
      </div>

      <!--<p class="footer-text text-center">Copyright ©  <a href="http://www.nedfi.com/" target="_blank">NEDFi</a>. All rights reserved.</p>-->
    </div>
  </div>
</div>

@endsection