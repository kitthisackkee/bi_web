@extends('layouts.app.app')
@section('content')

<section>
    <div class="col-md-12 text-center"><br>
        <p><h4>{{__('lang.title')}} | {{__('lang.dashboard')}}</h4></p>
        <a class="btn btn-app bg-primary" href="" target="_blank">
            <!--<span class="badge bg-success">300</span>-->
            <i class="fas fa-envelope"></i> <h6>{{__('lang.module_email')}}</h6>
        </a>
        <a class="btn btn-app bg-info" href="{{route('post.index')}}">
            <!--<span class="badge bg-success">300</span>-->
            <i class="fas fa-globe"></i> <h6>{{__('lang.module_website')}}</h6>
        </a>
        <a class="btn btn-app bg-warning" href="{{route('import_doc.index')}}">
            <!--<span class="badge bg-success">300</span>-->
            <i class="fas fa-file"></i> <h6>{{__('lang.module_document')}}</h6>
        </a>
        <!--
        <a class="btn btn-app bg-danger" href="">
            <span class="badge bg-teal">67</span>
            <i class="fas fa-dollar-sign"></i> <h6>{{__('lang.module_account')}}</h6>
        </a>
        -->
        <!--
        <a class="btn btn-app bg-secondary">
            <span class="badge bg-success">300</span>
            <i class="fas fa-barcode"></i> <h6>Products</h6>
        </a>-->
        <!--
        <a class="btn btn-app bg-success" href="">
            <span class="badge bg-purple">891</span>
            <i class="fas fa-users"></i> <h6>{{__('lang.module_employee')}}</h6>
        </a>-->
        <!--
        <a class="btn btn-app bg-warning">
            <span class="badge bg-info">12</span>
            <i class="fas fa-envelope"></i> Inbox
        </a>-->
        <!--
        <a class="btn btn-app bg-info">
            <span class="badge bg-danger">531</span>
            <i class="fas fa-heart"></i> Likes
        </a>-->
    </div>
</section>
@endsection