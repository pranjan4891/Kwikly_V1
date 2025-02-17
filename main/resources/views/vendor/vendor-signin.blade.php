@extends('vendor.include.main')
@section('content')

<!-- resources/views/vendor/register.blade.php -->

<section class="vendor-welcome" style="margin-top: 0px;">
  <div class="container-fluid">
    <div class="row align-items-center">
      <!-- Left Content -->
      <div class="col-lg-7 col-md-6 boxhd">
        <!--<h4>Selling your products made <a href="#">pretty simple</a></h4>-->
        <!--<h5>Sit back & relax and let us get <a href="#">the job done for you</a></h5>-->
      </div>

      <!-- Right Form -->
      <div class="col-lg-5 col-md-6">
        <div class="vender-form form-login">
          <h4>Sign Here for manage your Business</h4>
          @if (session('thank_msg'))
            <div>
              <p class="form_error">{{ session('thank_msg') }}</p>
            </div>
          @endif

          @if (session('msg'))
            <p class="form_error">{{ session('msg') }}</p>
          @endif

          <form action="{{ route('vendor.store') }}" method="post">
            @csrf
            <div>
           
              <div class="form-group">
                <input
                  type="email"
                  class="form-control form-text required"
                  id="useremail"
                  placeholder="Email ID"
                  name="email"
                  required
                >
                @error('email')
                  <p class="form_error">{{ $message }}</p>
                @enderror
              </div>
             
              <div class="form-group">
                <input
                  type="password"
                  class="form-control form-text required"
                  id="userpassword"
                  placeholder="Password"
                  name="password"
                  required
                >
                @error('password')
                  <p class="form_error">{{ $message }}</p>
                @enderror
              </div>
              <button  class="btn btn-default form-submit addtocart cookbtn-yellow" id="edit-submit--2" type="submit"
              >
                Login
              </button>
            </div>
            <a href="{{route('vendor.signup')}}">Become a vendor</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
