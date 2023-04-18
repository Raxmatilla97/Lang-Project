@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('modulMazmunis.index') }}">@lang('lms.modul_mazmuni')</a>
            </li>
            <li class="breadcrumb-item active">@lang('lms.toliq_malumotlar')</li>
     </ol>
        <div class="container-fluid " >
            <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-8 " style=" margin: auto;
                    width: 50%;">
                        <div class="card">
                            <div class="card-header">                            
                                 <strong>@lang('lms.toliq_malumotlar')</strong>
                                  <a href="{{ route('modulMazmunis.index') }}" class="btn btn-light">Orqaga qaytish</a>
                             </div>
                             <div class="card-body">
                                 @include('modul_mazmunis.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
