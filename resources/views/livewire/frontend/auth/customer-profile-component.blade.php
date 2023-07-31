<div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-3">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="display-4 text-white">{{__('blog.profile')}}</h5>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">

            <!-- Shop Sidebar Start-->
            
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8">
                <div class="bg-light p-4 mb-30">

                    <div class="row">
                        <div>
                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <p><h4>{{__('blog.hello')}}: {{Auth::user()->name}} - {{__('blog.tel')}}: {{Auth::user()->phone}}</h4></p>
                    </div>
                    
                    <div class="row">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">{{__('blog.profile')}}</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="container-fluid bg-secondary px-0">
                                    <div class="row g-0">
                                        <div class="col-lg-12 py-3 px-3">
                                            <h5 class="display-5 mb-4">{{__('lang.edit')}}</h5>
                                                <div>
                                                    @if (session()->has('message'))
                                                        <div class="alert alert-success">
                                                            {{ session('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" @error('name') is-invalid @enderror" wire:model="name" placeholder="{{__('blog.name_and_surename')}}">
                                                            <label for="form-floating-1">{{__('blog.name')}}</label>
                                                            @error('name') <span style="color: red" class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" @error('phone') is-invalid @enderror" wire:model="phone" placeholder="{{__('lang.phone')}}">
                                                            <label for="form-floating-1">{{__('lang.phone')}}</label>
                                                            @error('phone') <span style="color: red" class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" @error('email') is-invalid @enderror" wire:model="email" placeholder="{{__('lang.email')}}">
                                                            <label for="form-floating-2">{{__('lang.email')}}</label>
                                                            @error('email') <span style="color: red" class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" @error('password') is-invalid @enderror" wire:model="password" placeholder="{{__('lang.password')}}">
                                                            <label for="form-floating-3">{{__('lang.password')}}</label>
                                                            @error('password') <span style="color: red" class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" @error('confirmpassword') is-invalid @enderror" wire:model="confirmpassword" placeholder="{{__('lang.confirmpassword')}}">
                                                            <label for="form-floating-3">{{__('lang.confirmpassword')}}</label>
                                                            @error('confirmpassword') <span style="color: red" class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button class="btn btn-primary w-100 py-3" wire:click="updateProfile">{{__('lang.save')}}</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</div>

