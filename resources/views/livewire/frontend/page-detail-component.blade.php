@if (Config::get('app.locale') == 'lo')
    @section('meta_title', $pages->name_la)
    @section('meta_des', $pages->short_des_la)
    @section('meta_img', $pages->image)
@elseif (Config::get('app.locale') == 'en')
    @section('meta_title', $pages->name_en)
    @section('meta_des', $pages->short_des_en)
    @section('meta_img', $pages->image)
@endif
<div>

    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-2">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="display-4 text-white">
                    @if (Config::get('app.locale') == 'lo')
                        {{$pages->title_la}}
                    @elseif (Config::get('app.locale') == 'en')
                        {{$pages->title_en}}
                    @endif
                </h5>
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
                    <p>
                        @if (Config::get('app.locale') == 'lo')
                            {!! $pages->des_la !!}
                        @elseif (Config::get('app.locale') == 'en')
                            {!! $pages->des_en !!}
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
