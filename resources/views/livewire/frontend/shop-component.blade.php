<div>
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-12">
                    <nav class="breadcrumb bg-light mb-30">
                        <a class="breadcrumb-item text-dark" href="{{route('home')}}">{{__('blog.home')}}</a>
                        <span class="breadcrumb-item active">{{__('blog.shop')}}</span>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
    
    
        <!-- Shop Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">

                <!-- Shop Sidebar Start
                <div class="col-lg-3 col-md-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{__('lang.catalog')}}</span></h5>
                    <div class="bg-light p-4 mb-30">
                        @foreach ($all_catalogs as $item)
                            <div class="custom-control d-flex align-items-center justify-content-between mb-3">
                                <label class="custom-control-label"><a href="javascript:void(0)" wire:click="searchByCatalog({{$item->id}})" class="text-dark">{{$item->name}}</a></label>
                            </div> 
                        @endforeach
                    </div>
                </div> -->
                <!-- Shop Sidebar End -->

                <!-- Shop Product Start -->
                <div class="col-lg-12 col-md-8">
                    <div class="row">
                        <div class="col-md-3 pb-2">
                            <div class="form-group">
                                <select wire:model="searchByCatalog" id="selectProduct" class="form-control">
                                    <option value="" selected>{{__('lang.select')}}</option>
                                      @foreach($all_catalogs as $item)
                                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-9 pb-2">
                            <input type="text" wire:model="search_products" class="form-control" placeholder="{{__('blog.search_for_products')}}">
                        </div>
                    </div>
                    <div class="row pb-3">
                        
                        @foreach ($products as $item)
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <a href="{{route('product_detail', $item->id)}}"><img class="img-fluid w-100" src="{{asset($item->image)}}" alt=""></a>
                                        
                                        <div class="product-action">
                                            <a class="btn btn-outline-dark btn-square" href="javascript:void(0)" wire:click="addtoCart({{$item->id}},'{{$item->name}}',{{$item->price_online}})"><i class="fa fa-shopping-cart"></i></a>
                                            <!--<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>-->
                                        </div>
                                    </div>
                                    <div class="text-center py-4">
                                        <p><a class="h6 text-decoration-none" href="{{route('product_detail', $item->id)}}">{{$item->name}}</a></p>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            
                                            <h5>
                                                @if ($item->price_online == 0)
                                                    {{__('blog.call')}}
                                                @else
                                                    {{number_format($item->price_online)}} {{__('lang.lak')}}
                                                @endif
                                            </h5>
                                            <!--<h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-1">
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                    <div class="col-12">
                        <nav>
                        <ul class="pagination justify-content-center">
                            {{ $products->links() }}
                        </ul>
                        </nav>
                    </div>
                </div>
                <!-- Shop Product End -->
            </div>
        </div>
        <!-- Shop End -->
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#selectProduct').select2();
        $('#selectProduct').on('change', function (e) {
            var data = $('#selectProduct').select2("val");
            @this.set('product_id', data);
        });
    });
</script>
@endpush
