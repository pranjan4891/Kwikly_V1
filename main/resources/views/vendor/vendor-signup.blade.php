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
          <h4>Register Today</h4>
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
            <div class="form-group">
              <div class="input_location">
                <!-- Start Map Integration -->
                <div class="form-row">
                  <input type="hidden" id="pincode" name="pin_code" value="">
                  <input type="hidden" id="latitude" name="latitude" value="">
                  <input type="hidden" id="longitude" name="longitude" value="">

                  <div style="flex: 1;" class="pt-2">
                    <input
                      type="text"
                      class="form-control form-text required"
                      placeholder="Enter Landmark"
                      id="googleAddress"
                      name="place_name"
                      oninput="getAutoCompleteAdresses(this.value)"
                      required
                    >
                    <ul id="suggestion-list" class="suggestions pt-0"></ul>
                  </div>
                </div>
                <div class="form-row col-md-12 mt-1">
                  <div class="unique-map-container form-control" id="map">Map goes here</div>

                  <div class="pull-right col-md-12" style="padding-top:10px;
                                                            display: flex;
                                                            padding-right: 5px;
                                                            padding-left: 5px;
                                                            flex-wrap: nowrap;
                                                            flex-direction: row;
                                                            align-content: center;
                                                            justify-content: center;
                                                            align-items: center;">
                    <button  type="button"
                      class="btn btn-success btn-sm confirmBTN"
                    >
                      Confirm & Proceed
                    </button>
                  </div>
                </div>
                <!-- End Map Integration -->

                <div id="result"></div>
                <div id="pincodeError">
                  @if (session('msg'))
                    {{ session('msg') }}
                  @endif
                  <!-- Not Deliverable Message -->
                  <b
                    class="text-danger small text-bold text-center"
                    id="input_location_error_msg"
                  ></b>
                </div>
              </div>
            </div>

            <div id="vendorRegisterForm" >
              <div class="form-group">
                <input
                  type="text"
                  class="form-control form-text required"
                  id="username"
                  placeholder="Full Name"
                  name="name"
                  required
                >
                @error('name')
                  <p class="form_error">{{ $message }}</p>
                @enderror
              </div>
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
                  type="text"
                  class="form-control form-text required"
                  id="userphone"
                  placeholder="Mobile Number"
                  minlength="10"
                  maxlength="10"
                  name="phone"
                  required
                >
                @error('phone')
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
              <button
                class="btn btn-default form-submit addtocart cookbtn-yellow"
                id="edit-submit--2"
                type="submit"
              >
                Register
              </button>
            </div>
            <a href="{{route('vendor.signin')}}">If already Account, please sign in</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
