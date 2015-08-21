    {{generate_theme_css('electrasol/assets/css/bootstrap.min.css')}}
    {{generate_theme_css('electrasol/assets/css/font-awesome.min.css')}}
    @if($tema->isiCss=='')  
    {{generate_theme_css('electrasol/assets/css/main.css')}}
    @else   
    {{generate_theme_css('electrasol/assets/css/editmain.css')}}
    @endif  
    {{generate_theme_css('electrasol/assets/css/prettyPhoto.css')}}
    {{generate_theme_css('electrasol/assets/css/price-range.css')}}
    {{generate_theme_css('electrasol/assets/css/animate.css')}}
    {{generate_theme_css('electrasol/assets/css/responsive.css')}}
    {{generate_theme_css('electrasol/assets/css/jquery.fancybox.css')}}

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
