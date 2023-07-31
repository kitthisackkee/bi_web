@if (Config::get('app.locale') == 'lo')
    @section('meta_title', $service->name_la)
    @section('meta_des', $service->des_la)
    @section('meta_img', $service->image)
@elseif (Config::get('app.locale') == 'en')
    @section('meta_title', $service->name_en)
    @section('meta_des', $service->des_en)
    @section('meta_img', $service->image)
@endif
<div>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{route('home')}}">{{__('blog.home')}}</a>
                    <span class="breadcrumb-item active">{{__('blog.service_detail')}}</span>
                    <input type="hidden" wire:model="hiddenId">
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3 text-center">
                                @if (Config::get('app.locale') == 'lo')
                                    {{$service->name_la}}
                                @elseif (Config::get('app.locale') == 'en')
                                    {{$service->name_en}}
                                @endif
                            </h4>
                            <p>
                                @if (Config::get('app.locale') == 'lo')
                                    {!! $service->des_la !!}
                                @elseif (Config::get('app.locale') == 'en')
                                    {!! $service->des_en !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
