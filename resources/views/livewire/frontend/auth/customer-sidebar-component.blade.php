<div class="col-lg-3 col-md-4">
    <!--
    <div class="bg-light p-4 mb-30">
        <a href="{{route('customer.dashboard')}}" class="form-control text-dark"><i class="fas fa-layer-group"></i> {{__('blog.customer_dashboard')}}</a>
        <a href="" class="form-control text-dark"><i class="fa fa-book"></i> {{__('blog.e-book')}}</a>
        <a href="{{route('customer.profile', auth()->user()->id)}}" class="form-control text-dark"><i class="fa fa-id-badge"></i> {{__('blog.profile')}}</a>
        <a href="{{route('customer_sign_out')}}" class="form-control text-dark"><i class="fa fa-unlock"></i> {{__('blog.sign_out')}}</a>                
    </div>
    -->
    <div class="p-4">
        <div class="card" style="width: 100%">
            <div class="card-header">
              {{__('blog.menu')}}
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="{{route('customer.dashboard')}}" class="text-dark"><i class="fas fa-layer-group"></i> {{__('blog.customer_dashboard')}}</a></li>
              <li class="list-group-item"><a href="" class="text-dark"><i class="fas fa-book"></i> {{__('blog.e-book')}}</a></li>
              <li class="list-group-item"><a href="{{route('customer.profile', auth()->user()->id)}}" class="text-dark"><i class="fa fa-id-badge"></i> {{__('blog.profile')}}</a></li>
              <li class="list-group-item"><a href="{{route('customer_sign_out')}}" class="text-dark"><i class="fa fa-unlock"></i> {{__('blog.sign_out')}}</a></li>
            </ul>
        </div>
    </div>
</div>


