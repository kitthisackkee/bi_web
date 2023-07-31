<div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="display-4 text-white">{{__('blog.all_news')}}</h5>
                <!--
                <a href="">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Blog Grid</a>
                -->
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-3 px-3">
        <div class="row g-5">

            <!-- Blog list Start -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <div class="input-group">
                                <input type="text" class="form-control p-3" wire:model="search" placeholder="{{__('lang.search')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-5">

                    @foreach ($news as $item)
                    <div class="col-xl-6 col-lg-12 col-md-6">
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

                    <div class="col-12">
                        <nav aria-label="Page navigation">
                          <ul class="pagination pagination-lg m-0">
                            {{ $news->links() }}
                          </ul>
                        </nav>
                    </div>

                </div>
            </div>
            <!-- Blog list End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <!-- Category Start -->
                <div class="mb-5">
                    <h2 class="mb-4">{{__('blog.category')}}</h2>

                    
                    <div class="d-flex flex-column justify-content-start bg-secondary p-4">
                        @foreach ($categorys as $item)
                        <a class="h5 mb-3" href="javascript:void(0)" wire:click="searchByType({{$item->id}})"><i class="bi bi-arrow-right text-primary me-2"></i>
                            @if (Config::get('app.locale') == 'lo')
                                {{$item->name_la}}
                            @elseif (Config::get('app.locale') == 'en') 
                                {{$item->name_la}}
                            @endif
                        </a>
                        @endforeach
                    </div>
                    

                </div>
                <!-- Category End -->

                <!-- Recent Post Start -->
                <div class="mb-5">

                    <h2 class="mb-4">{{__('blog.other_news')}}</h2>

                    @foreach ($random_news as $item)
                    <div class="d-flex mb-3">
                        <img class="img-fluid" src="{{asset($item->image)}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        <a href="" class="h5 d-flex align-items-center bg-secondary px-3 mb-0">
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
