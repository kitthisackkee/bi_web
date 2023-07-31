<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>{{__('lang.title')}}</title>

    <meta property="og:url"                content="{{ request()->fullUrl() }}" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="@yield('meta_title')" />
	<meta property="og:description"        content="@yield('meta_des')" />
	<meta property="og:image"              content="{{asset('')}}@yield('meta_img')" />

    <!-- Favicon -->
    <link rel="icon" href="{{asset('images/logo.png')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">

    <style>
        nav svg{
          height: 20px;
        }
    
        @font-face{
          font-family: BoonHome;
          src: url('{{asset('fonts/boonhome.otf')}}');
        }
      </style>

    @livewireStyles

</head>

<body style="font-family: 'BoonHome'">
    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-4 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body py-2 px-3 border-end" href=""><small>{{__('blog.terms')}}</small></a>
                    <a class="text-body py-2 ps-3" href=""><small>{{__('blog.career')}}</small></a>
                </div>
            </div>
            <div class="col-md-8 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>{{$generals->email}}</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>{{$generals->phone}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-3 py-3 py-lg-0">
        <a href="/" class="navbar-brand p-0">
            <h4 class="m-0 text-uppercase text-primary"><img src="{{asset('frontend/img/logo.png')}}" height="40" width="40" alt=""> 
            @if (Config::get('app.locale') == 'lo')
                {{$generals->name_la}}
            @elseif(Config::get('app.locale') == 'en')
                {{$generals->name_en}}
            @endif
            </h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" style="font-family: 'BoonHome'">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a href="/" class="nav-item nav-link"><i class="fas fa-home"></i></a>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link" data-bs-toggle="dropdown">{{__('blog.about')}}</a>
                    <div class="dropdown-menu m-0">
                        
                        @foreach ($pages as $item)
                            <a href="{{route('pages_detail', $item->id)}}" class="dropdown-item">
                                @if (Config::get('app.locale') == 'lo')
                                    {{$item->title_la}}
                                @elseif(Config::get('app.locale') == 'en')
                                    {{$item->title_en}}
                                @endif
                            </a>
                        @endforeach

                    </div>
                </div>
                <a href="{{route('documents')}}" class="nav-item nav-link">{{__('blog.documents')}}</a>
                <a href="{{route('services')}}" class="nav-item nav-link">{{__('blog.course')}}</a>
                <a href="{{route('all_news')}}" class="nav-item nav-link">{{__('blog.news')}}</a>
                <a href="{{route('contact')}}" class="nav-item nav-link">{{__('blog.contact')}}</a>

                @auth
                <div class="nav-item dropdown">
                    <a href="" class="nav-link" data-bs-toggle="dropdown">{{__('blog.customer_dashboard')}}</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('customer.dashboard', $item->id)}}" class="dropdown-item">{{__('blog.customer_dashboard')}}</a>
                        <a href="{{route('customer.profile', auth()->user()->id)}}" class="dropdown-item">{{__('blog.profile')}}</a>
                        <a href="{{route('customer_sign_out', $item->id)}}" class="dropdown-item">{{__('blog.sign_out')}}</a>
                    </div>
                </div>
                @else
                <a href="{{route('customer_sign_in')}}" class="nav-item nav-link">{{__('blog.sign_in')}}</a>
                @endauth

                <div class="nav-item dropdown">
                    <a href="" class="nav-link" data-bs-toggle="dropdown">{{__('blog.language')}}</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{url('localization/lo')}}" class="dropdown-item">{{__('lang.lao')}}</a>
                        <a href="{{url('localization/en')}}" class="dropdown-item">{{__('lang.eng')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    {{ $slot }}


    <!-- Footer Start 
    <div class="container-fluid bg-primary text-secondary p-5">
        <div class="row g-5">
            <div class="col-12 text-center">
                <h1 class="display-5 mb-4">Stay Update!!!</h1>
                <form class="mx-auto" style="max-width: 600px;">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                        <button class="btn btn-dark px-4">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>-->

    <div class="container-fluid bg-dark text-secondary p-5">
        <div class="row g-5">

            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">{{__('blog.menu')}}</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="/"><i class="bi bi-arrow-right text-primary me-2"></i>{{__('blog.home')}}</a>
                    <a class="text-secondary mb-2" href="{{route('all_news')}}"><i class="bi bi-arrow-right text-primary me-2"></i>{{__('blog.news')}}</a>
                    <a class="text-secondary" href="{{route('contact')}}"><i class="bi bi-arrow-right text-primary me-2"></i>{{__('blog.contact')}}</a>
                    
                    @auth
                    <a class="text-secondary mb-2" href="{{route('customer.dashboard')}}"><i class="bi bi-arrow-right text-primary me-2"></i>{{__('blog.customer_dashboard')}}</a>
                    @else
                    <a class="text-secondary mb-2" href="{{route('customer_sign_in')}}"><i class="bi bi-arrow-right text-primary me-2"></i>{{__('blog.sign_in')}}</a>
                    @endauth
                    
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">{{__('blog.contact')}}</h3>
                <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>
                    @if (Config::get('app.locale') == 'lo')
                        {{$generals->address_la}}
                    @elseif (Config::get('app.locale') == 'en')
                        {{$generals->address_en}}
                    @endif
                </p>
                <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>{{$generals->email}}</p>
                <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>{{$generals->phone}}</p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">{{__('blog.download_app')}}</h3>
                <div class="d-flex flex-column justify-content-start">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{$generals->app_store}}" target="_blank"><img src="{{asset('images/appgle-app-store.png')}}" height="40" class="mb-1"></a> <br>
                            <a href="{{$generals->play_store}}" target="_blank"><img src="{{asset('images/google-play-store.png')}}" height="40" class="mb-1"></a> <br>
                            <a href="{{$generals->app_gallery}}" target="_blank"><img src="{{asset('images/huawei-app-gallery.png')}}" height="40"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">{{__('blog.follow_us')}}</h3>
                <div class="d-flex">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="{{$generals->whatapps}}"><i class="fab fa-whatsapp fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="{{$generals->fanpage}}"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="{{$generals->youtube}}"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid bg-dark text-secondary text-center border-top py-4 px-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="m-0">&copy; 
            <a class="text-secondary border-bottom" href="https://bibol.online" target="_blank">
                @if (Config::get('app.locale') == 'lo')
                    {{$generals->name_la}}
                @elseif (Config::get('app.locale') == 'en')
                    {{$generals->name_en}}
                @endif
            </a>. {{__('lang.allrightreserved')}} 
            <!--Designed by <a class="text-secondary border-bottom" href="https://citgroup.la">CIT SOLE CO.,LTD</a>-->
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>

    <script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>

    @livewireScripts

    <script>
        window.livewire.on('alert', param => {
              toastr[param['type']](param['message'],param['type']);
        });
      
    </script>

</body>

</html>
