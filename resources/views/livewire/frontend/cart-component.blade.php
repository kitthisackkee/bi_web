<div>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{route('home')}}">{{__('blog.home')}}</a>
                    <span class="breadcrumb-item active">{{__('blog.cart')}}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Cart Start -->
    <div class="container-fluid">

        @if(Cart::count() > 0)
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">

                @if (Session::has('success_message'))
                    <div class="alert alert-success">
                        {{Session::get('success_message')}}
                    </div>
                @endif

                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{__('lang.productname')}}</th>
                            <th>{{__('lang.price')}}</th>
                            <th>{{__('lang.qty')}}</th>
                            <th>{{__('lang.amount')}}</th>
                            <th>{{__('lang.action')}}</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">
                        
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td class="align-start"><img src="{{asset($item->model->image)}}" alt="{{$item->model->name}}" style="width: 50px;"> {{$item->model->name}}</td>
                                <td class="align-middle">{{number_format($item->model->price_online)}}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" wire:click="decreaseQty('{{$item->rowId}}')"><i class="fa fa-minus"></i></button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{$item->qty}}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus" wire:click="increaseQty('{{$item->rowId}}')"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{number_format($item->subtotal)}}</td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger" wire:click="destroy('{{$item->rowId}}')"><i class="fa fa-times"></i></button></td>
                            </tr>
                        @endforeach

                    </tbody>
        
                </table>
                
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>{{__('lang.subtotal')}}</h6>
                            <h6>{{Cart::subtotal()}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>{{__('blog.tax')}}</h6>
                            <h6>{{Cart::tax()}}</h6>
                        </div>
                        <!--
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">{{__('blog.shipping')}}</h6>
                            <h6 class="font-weight-medium">Free</h6>
                        </div>-->
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>{{__('lang.total')}}</h5>
                            <h5>{{Cart::total()}}</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3 text-center">{{__('blog.no_product_in_list')}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
    <!-- Cart End -->
</div>
