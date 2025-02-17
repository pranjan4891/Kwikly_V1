<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kwiklly</title>
    
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/assets/website/img/web-main/logo.png') }}"/>
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('public/assets/website/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/website/css/custom_style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/website/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
    
    <meta name="google-signin-client_id" content="669730510016-jq5g6541tub5v6cbvtunf59u4p4vk6uj.apps.googleusercontent.com">
    
    <!-- JS Libraries -->
    <script src="{{ asset('public/assets/website/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('public/assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/website/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <link rel="stylesheet" href="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.css" />
    <script src="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.js"></script>
   

    <style>
        /* Search section */
        .suggestions_input {
            position: relative;
            z-index: 9999;
            background: #fff;
            width: 100%;
        }
        .suggestions_input #autoSuggestionsList {
            width: 100%;
            background: #fff;
            max-height: 412px;
            overflow-y: auto;
        }
        .suggestions_input #autoSuggestionsList li {
            background: #fff;
        }
        #autoSuggestionsList > li a {
            color: #f15a24;
            padding: 5px 5px;
            display: inline-block;
        }
        .auto_list {
            border: 1px solid #eaeaea;
            position: absolute;
        }
        #autoSuggestionsList > li {
            background: #F3F3F3;
            border-bottom: 1px solid #eaeaea;
            list-style: none;
            padding: 3px 15px;
            text-align: left;
        }
        #autoSuggestionsList > li:hover {
            background: #39a003;
        }
        #autoSuggestionsList > li:hover a {
            color: #fff;
        }

        /* Other styles */
        .number-prefix {
            display: none;
        }
        .number-prefix {
            position: absolute;
            left: 0;
            padding: 7px 10px;
            border-right: dashed 1px #ccc;
            bottom: 12px;
            font-size: 17px;
            height: 37px;
        }
        span.number-prefix.move-left + #oemail {
            padding-left: 50px;
        }
        .login_wrap .login_bg .input_group {
            position: relative;
        }
    </style>
    <style>
    input#placename {
        display: none;
    }

    .suggestions {
        list-style-type: none;
        margin-left:10%;
        padding: 0;
        /*margin-top: 88px;*/
        border: 0px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        position: absolute;
        background-color: #fff;
        z-index: 1000;
        width: 75%;
    }

    .suggestions li {
        padding: 8px;
        cursor: pointer;
    }

    .suggestions li:hover {
        background-color: #f0f0f0;
    }

    #map {
        width: 85%;
        height: 200px;
        margin: 0 auto;
        display: block;
    }
    
  
    .form-group {
    margin-bottom: 0px;
}
    
</style>
</head>
<body>
 <div class="container-fluid">
	<div class="row">
		<header id="topheader">
			<div class="header d-none d-lg-block d-xl-block">
				<a href="User/index'" class="logo"><img src="{{ asset('public/assets/website/img/web-main/logo.png')}}" alt="logo" title="Logo" class="img-fluid" /></a>
				<input class="menu-btn" type="checkbox" id="menu-btn" />
				<label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
				<ul class="menu">
					
				</ul>
			</div>
			
			<div class="mobile_menu">
				<div class="logo_close">
					<span class="menu_logo"><img src="{{ asset('public/assets/website/img/web-main/logo.png')}}" alt="logo" title="Logo" class="img-fluid" /></span>
					<span class="m_close"><a href="#"><img src="{{ asset('public/website/assets/img/icons/close.svg')}}" class="img-fluid" alt="mobile menu" title="mobile-menu" /></a></span>
				</div>
				<ul>
					<li><a href="User/index">Store</a></li>
					<li><a href="User/Departments">Departments </a></li>
					
                    <li><a href="javascript:void(0)" onclick="loginopen()">Join Us!</a></li>

				</ul>
			</div>
		</header>
	</div>
</div>
<!-- Your content goes here -->


