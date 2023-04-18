@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('news.index') !!}">@lang('lms.yangilikni')</a>
          </li>
          <li class="breadcrumb-item active">@lang('lms.tahrirlash')</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('lms.yangilikni_ozgartirish')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($news, ['route' => ['news.update', $news->id], 'method' => 'patch', 'files' => true]) !!}
                              
                              @include('news.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection