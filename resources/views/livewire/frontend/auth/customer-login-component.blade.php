<div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="display-4 text-white">{{__('blog.sign_in')}}</h5>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Sigin Start -->
    <div class="container-fluid bg-secondary px-0">
        <br>
        <div class="row g-0">

            <div class="col-lg-4 py-3 px-3">
            </div>
            
            <div class="col-lg-4 py-3 px-3">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="phone" wire:model="phone" wire:keydown.enter="signIn" class="form-control @error('phone') is-invalid @enderror" placeholder="{{__('lang.phone')}}">
                            <label for="form-floating-2">{{__('lang.phone')}} 020</label>
                            @error('phone') <span style="color: red" class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" wire:model="password" wire:keydown.enter="signIn" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('lang.password')}}">
                            <label for="form-floating-3">{{__('lang.password')}}</label>
                            @error('password') <span style="color: red" class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session()->has('message'))
                            <div class="alert alert-warning">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" wire:click="signIn">{{__('blog.sign_in')}}</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 px-3">
            </div>

        </div>
    </div>
    <!-- Sigin End -->

</div>
