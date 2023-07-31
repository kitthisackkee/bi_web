@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.books')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.books')}}</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <a href="{{route('book.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-add"></i>{{__('lang.add')}}</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="text-align: center">
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.image')}}</th>
                      <th>{{__('lang.term')}}</th>
                      <th>{{__('lang.book_type')}}</th>
                      <th>{{__('lang.name')}}</th>
                      <th>{{__('lang.status')}}</th>
                      <th>{{__('lang.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $stt = 1; @endphp
                    @foreach($book as $item)
                    <tr align="center">
                        <td>{{$stt++}}</td>
                        <td><img src="{{$item->image}}" width="50px" height="50px" alt=""></td>
                        <td>{{$item->termname->name}}</td>
                        <td>{{$item->booktypename->name}}</td>
                        <td>{{$item->name}}</td>
                        <td style="text-align: center">
                          @if ($item->status == 1)
                            <label class="text-success">{{__('blog.active')}}</label>
                          @else
                            <label class="text-danger">{{__('blog.inactive')}}</label>
                          @endif
                        </td>
                        <td>
                        <form action=" {{ route('book.destroy', $item->id) }} " method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{route('download_book', $item->id)}}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                          <a href="{{ route('book.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນ ({{$item->name}}) ນີ້ ຫຼື ບໍ?')"><i class="fas fa-trash"></i></button>

                        </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection