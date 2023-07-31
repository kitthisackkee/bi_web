<div>
    
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach ($sliders as $key => $item)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img class="w-100" src="{{asset($item->image)}}" alt="Image">
                    <!--
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-end">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="text-white text-uppercase">
                                @if(Config::get('app.locale') == 'lo')
                                    {{$item->name_la}}
                                @elseif(Config::get('app.locale') == 'en')
                                    {{$item->name_en}}
                                @endif
                            </h1>
                            <h5 class="display-1 text-white mb-md-4"></h5>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 rounded-pill">Get Quote</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 rounded-pill">Contact Us</a>
                        </div>
                    </div>
                    -->
                </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start
    <div class="container-fluid p-0">
        <div class="card">
            <div class="row g-0">
                <div class="col-lg-6 py-3 px-3">
                    <h1 class="display-5 mb-4">{{__('blog.welcome_to')}}</h1>
                    <h4 class="text-primary mb-4">Diam dolor diam ipsum sit. Clita erat ipsum et lorem stet no lorem sit clita duo justo magna dolore</h4>
                    <p class="mb-4">
                        @if (Config::get('app.locale') == 'lo')
                            {!! $vision->des_la !!}
                        @elseif (Config::get('app.locale') == 'en')
                            {!! $vision->des_en !!}
                        @endif
                    </p>
                    <a href="" class="btn btn-primary py-md-3 px-md-5 rounded-pill">Get A Quote</a>
                </div>
                <div class="col-lg-6">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-5">
      
                        <div class="d-flex text-white mb-5">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white text-primary rounded-circle mx-auto mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-user-tie fs-4"></i>
                            </div>
                            <div class="ps-4">
                                <a href="{{route('pages_detail', $history->id)}}">
                                    <h3>
                                        @if (Config::get('app.locale') == 'lo')
                                            {{ $history->title_la }}
                                        @elseif (Config::get('app.locale') == 'en')
                                            {{ $history->title_en }}
                                        @endif
                                    </h3>
                                </a>
                                <p class="mb-0 text-primary"></p>
                            </div>
                        </div>
                        <div class="d-flex text-white mb-5">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white text-primary rounded-circle mx-auto mb-4" style="width: 60px; height: 60px;">
                                <i class="fas fa-book-open fs-4"></i>
                            </div>
                            <div class="ps-4">
                                <h3>{{__('blog.library')}}</h3>
                                <p class="mb-0 text-primary"></p>
                            </div>
                        </div>
                        <div class="d-flex text-white mb-5">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white text-primary rounded-circle mx-auto mb-4" style="width: 60px; height: 60px;">
                                <i class="fas fa-laptop-code fs-4"></i>
                            </div>
                            <div class="ps-4">
                                <a href="https://elearning.bibol.online" target="_blank"><h3>{{__('blog.elearning')}}</h3></a>
                                <p class="mb-0 text-primary"></p>
                            </div>
                        </div>
                        <div class="d-flex text-white mb-5">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white text-primary rounded-circle mx-auto mb-4" style="width: 60px; height: 60px;">
                                <i class="fas fa-book-reader fs-4"></i>
                            </div>
                            <div class="ps-4">
                                <h3>{{__('blog.research')}}</h3>
                                <p class="mb-0 text-primary"></p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row g-5">
                                <div class="col-12">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-book-open fs-4 text-white"></i>
                                    </div>
                                    <h1>{{__('blog.research')}}</h1>
                                    <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                                </div>
                                <div class="col-12">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-book-reader fs-4 text-white"></i>
                                    </div>
                                    <h1>{{__('blog.library')}}</h1>
                                    <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                                </div>
                                <div class="col-12">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-laptop-code fs-4 text-white"></i>
                                    </div>
                                    <div>
                                        <a href="https://elearning.bibol.online" target="_bank"><h1>{{__('blog.elearning')}}</h1></a>
                                    </div>
                                    
                                    <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Services Start -->
    <div class="container-fluid pt-3 px-3">
        <div class="text-center mx-auto mb-5" style="max-width: 100%;">
            <h1 class="display-5 mb-0">{{__('blog.welcome_to')}}</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <a href="https://bibol.edu.la/index.php?p=library" target="_blank">
                <div class="service-item bg-secondary text-center px-5">
                    <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                        <i class="fas fa-school fa-3x"></i>
                    </div>
                    <h3 class="mb-3">{{__('blog.library')}}</h3>
                    <h5 class="mb-3">E-Library</h5>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="https://elearning.bibol.online/" target="_blank">
                    <div class="service-item bg-secondary text-center px-5">
                        <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fas fa-laptop-code fa-3x"></i>
                        </div>
                        <h3 class="mb-3">{{__('blog.elearning')}}</h3>
                        <h5 class="mb-3">E-Learning</h5>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="https://bibol.edu.la/index.php?p=research" target="_blank">
                <div class="service-item bg-secondary text-center px-5">
                    <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                        <i class="fas fa-chalkboard fa-3x"></i>
                    </div>
                    <h3 class="mb-3">{{__('blog.research')}}</h3>
                    <h5 class="mb-3">Researching</h5>
                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- About End -->
    <div class="container-fluid pt-3 px-3">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">{{__('blog.download_app')}}</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-3 text-center">
            <div class="col-lg-12 wow slideInUp" data-wow-delay="0.3s">
                <a href="{{$generals->app_store}}" target="_blank"><img src="{{asset('images/appgle-app-store.png')}}" height="60"></a>
                <a href="{{$generals->play_store}}" target="_blank"><img src="{{asset('images/google-play-store.png')}}" height="60"></a>
                <a href="{{$generals->app_gallery}}" target="_blank"><img src="{{asset('images/huawei-app-gallery.png')}}" height="60"></a>
            </div>
        </div>
    </div>

    <!-- Services Start -->
    <div class="container-fluid pt-3 px-3">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">{{__('blog.course')}}</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-5">

            @foreach ($services as $item)
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-secondary text-center px-5">
                    <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                        <i class="{{$item->icon}} fa-2x"></i>
                    </div>
                    <h3 class="mb-3">
                        @if(Config::get('app.locale') == 'lo')
                            {{$item->name_la}}
                        @elseif(Config::get('app.locale') == 'en')
                            {{$item->name_en}}
                        @endif
                    </h3>
                    <p class="mb-0">
                        @if(Config::get('app.locale') == 'lo')
                            {!! $item->short_des_la !!}
                        @elseif(Config::get('app.locale') == 'en')
                            {!! $item->short_des_en !!}
                        @endif
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Services End -->


    <!-- Features Start 
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">Why Choose Us!!!</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-cubes fs-4 text-white"></i>
                        </div>
                        <h3>Best In Industry</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                    </div>
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-percent fs-4 text-white"></i>
                        </div>
                        <h3>99% Success Rate</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                    </div>
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-award fs-4 text-white"></i>
                        </div>
                        <h3>Award Winning</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-block bg-primary h-100 text-center">
                    <img class="img-fluid" src="{{asset('frontend/img/feature.jpg')}}" alt="">
                    <div class="p-4">
                        <p class="text-white mb-4">Clita nonumy sanctus nonumy et clita tempor, et sea amet ut et sadipscing rebum amet takimata amet, sed accusam eos eos dolores dolore et. Et ea ea dolor rebum invidunt clita eos. Sea accusam stet stet ipsum, sit ipsum et ipsum kasd</p>
                        <a href="" class="btn btn-light py-md-3 px-md-5 rounded-pill mb-2">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="far fa-smile-beam fs-4 text-white"></i>
                        </div>
                        <h3>100% Happy Client</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                    </div>
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-user-tie fs-4 text-white"></i>
                        </div>
                        <h3>Professional Advisors</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                    </div>
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-headset fs-4 text-white"></i>
                        </div>
                        <h3>24/7 Customer Support</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam dolor ea</p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Features Start -->


    <!-- Quote Start 
    <div class="container-fluid bg-secondary px-0">
        <div class="row g-0">
            <div class="col-lg-6 py-6 px-5">
                <h1 class="display-5 mb-4">Request A Free Quote</h1>
                <p class="mb-4">Kasd vero erat ea amet justo no stet, et elitr no dolore no elitr sea kasd et dolor diam tempor. Nonumy sed dolore no eirmod sit nonumy vero lorem amet stet diam at. Ea at lorem sed et, lorem et rebum ut eirmod gubergren, dolor ea duo diam justo dolor diam ipsum dolore stet stet elitr ut. Ipsum amet labore lorem lorem diam magna sea, eos sed dolore elitr.</p>
                <form>
                    <div class="row gx-3">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="form-floating-1" placeholder="John Doe">
                                <label for="form-floating-1">Full Name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="form-floating-2" placeholder="name@example.com">
                                <label for="form-floating-2">Email address</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Financial Consultancy">
                                    <option selected>Financial Consultancy</option>
                                    <option value="1">Strategy Consultancy</option>
                                    <option value="2">Tax Consultancy</option>
                                </select>
                                <label for="floatingSelect">Select A Service</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary w-100 h-100" type="submit">Request A Quote</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{asset('frontend/img/quote.jpg')}}" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>-->
    <!-- Quote End -->


    <!-- Team Start 
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">Our Team Members</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="team-item position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('frontend/img/team-1.jpg')}}" alt="">
                    <div class="team-text w-100 position-absolute top-50 text-center bg-primary p-4">
                        <h3 class="text-white">Full Name</h3>
                        <p class="text-white text-uppercase mb-0">Designation</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-item position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('frontend/img/team-2.jpg')}}" alt="">
                    <div class="team-text w-100 position-absolute top-50 text-center bg-primary p-4">
                        <h3 class="text-white">Full Name</h3>
                        <p class="text-white text-uppercase mb-0">Designation</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-item position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('frontend/img/team-3.jpg')}}" alt="">
                    <div class="team-text w-100 position-absolute top-50 text-center bg-primary p-4">
                        <h3 class="text-white">Full Name</h3>
                        <p class="text-white text-uppercase mb-0">Designation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Team End -->


    <!-- Testimonial Start 
    <div class="container-fluid bg-secondary p-0">
        <div class="row g-0">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{asset('frontend/img/testimonial.jpg')}}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 py-6 px-5">
                <h1 class="display-5 mb-4">What Say Our Client!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal mb-4"><i class="fa fa-quote-left text-primary me-3"></i>Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat dolor rebum sit ipsum.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="{{asset('frontend/img/testimonial-1.jpg')}}" alt="">
                            <div class="ps-4">
                                <h3>Client Name</h3>
                                <span class="text-uppercase">Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal mb-4"><i class="fa fa-quote-left text-primary me-3"></i>Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat dolor rebum sit ipsum.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="{{asset('frontend/img/testimonial-2.jpg')}}" alt="">
                            <div class="ps-4">
                                <h3>Client Name</h3>
                                <span class="text-uppercase">Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-fluid py-3 px-3">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">{{__('blog.news')}}</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-5">
            
            @foreach ($news as $item)
                <div class="col-lg-4">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <a href="{{route('news_detail', $item->id)}}"><img class="img-fluid" src="{{asset($item->image)}}" alt=""></a>
                        </div>
                        <div class="bg-secondary d-flex">
                            <div class="flex-shrink-0 d-flex flex-column justify-content-center text-center bg-primary text-white px-4">
                                <span>{{date('d', strtotime($item->created_at))}}</span>
                                <h5 class="text-uppercase m-0">{{date('M', strtotime($item->created_at))}}</h5>
                                <span>{{date('Y', strtotime($item->created_at))}}</span>
                            </div>
                            <div class="d-flex flex-column justify-content-center py-3 px-4">
                                <div class="d-flex mb-2">
                                    <small class="text-uppercase me-3"><i class="bi bi-person me-2"></i>{{$item->username->name}}</small>
                                    <small class="text-uppercase me-3"><i class="bi bi-bookmarks me-2"></i>
                                        @if (Config::get('app.locale') == 'lo')
                                            {{$item->newstype->name_la}}
                                        @elseif (Config::get('app.locale') == 'en')
                                            {{$item->newstype->name_en}}
                                        @endif
                                    </small>
                                </div>
                                <a class="h4" href="{{route('news_detail', $item->id)}}">
                                    @if (Config::get('app.locale') == 'lo')
                                        {{$item->name_la}}
                                    @elseif (Config::get('app.locale') == 'en')
                                        {{$item->name_en}}
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Blog End -->

</div>
