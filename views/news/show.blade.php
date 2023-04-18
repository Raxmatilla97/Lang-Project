@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('news.index') }}">@lang('lms.yangiliklar_sahifasi')</a>
            </li>
            <li class="breadcrumb-item active">@lang('lms.yangilik_haqida')</li>
     </ol>
     <div class="container-fluid " >
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-8 " style=" margin: auto;
                     width: 50%;">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('lms.toliq_malumot')</strong>
                                  <a href="{{ route('news.index') }}" class="btn btn-light">@lang('lms.orqaga')</a>
                             </div>
                             <div class="card-body">
                                 @include('news.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
