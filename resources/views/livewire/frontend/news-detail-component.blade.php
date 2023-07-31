@if (Config::get('app.locale') == 'lo')
    @section('meta_title', $news->name_la)
    @section('meta_des', $news->short_des_la)
    @section('meta_img', $news->image)
@elseif (Config::get('app.locale') == 'en')
    @section('meta_title', $news->name_en)
    @section('meta_des', $news->short_des_en)
    @section('meta_img', $news->image)
@endif
<div>
    <!-- Breadcrumb Start 
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{route('home')}}">{{__('blog.home')}}</a>
                    <span class="breadcrumb-item active">{{__('blog.news_detail')}}</span>
                    <input type="hidden" wire:model="hiddenId">
                </nav>
            </div>
        </div>
    </div>-->
    <!-- Breadcrumb End 
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3 text-center">
                                @if (Config::get('app.locale') == 'lo')
                                    {{$news->name_la}}
                                @elseif (Config::get('app.locale') == 'en')
                                    {{$news->name_en}}
                                @endif
                            </h4>
                            <div class="text-center">
                                <img src="{{asset($news->image)}}" alt="" width="100%">
                            </div>
                            <p>
                                @if (Config::get('app.locale') == 'lo')
                                    {!! $news->des_la !!}
                                @elseif (Config::get('app.locale') == 'en')
                                    {!! $news->des_en !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

     <!-- Page Header Start -->
     <div class="container-fluid bg-dark p-2">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="display-4 text-white">
                    @if (Config::get('app.locale') == 'lo')
                        {{$news->name_la}}
                    @elseif (Config::get('app.locale') == 'en')
                        {{$news->name_en}}
                    @endif
                </h5>
                <!--
                <a href="{{route('home')}}">{{__('blog.home')}}</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">{{__('blog.news_detail')}}</a>
                -->
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-3 px-3">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-100 mb-5" src="{{asset($news->image)}}" alt="">
                    <!--<h1 class="mb-4">Diam dolor est labore duo ipsum clita sed et lorem tempor duo</h1>-->
                    <p>
                        @if (Config::get('app.locale') == 'lo')
                            {!! $news->des_la !!}
                        @elseif (Config::get('app.locale') == 'en')
                            {!! $news->des_en !!}
                        @endif
                    </p>
                </div>
                <!-- Blog Detail End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h2 class="mb-4">{{__('blog.other_news')}}</h2>

                    @foreach ($random_news as $item)
                    <div class="d-flex mb-3">
                        <img class="img-fluid" src="{{asset($item->image)}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        <a href="{{route('news_detail', $item->id)}}" class="h5 d-flex align-items-center bg-secondary px-3 mb-0">
                            @if (Config::get('app.locale') == 'lo')
                                {{$item->name_la}}
                            @elseif (Config::get('app.locale') == 'en')
                                {{$item->name_en}}
                            @endif
                        </a>
                    </div>
                    @endforeach

                </div>
                <!-- Recent Post End -->

            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->
</div>
