@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('onlineVideoDars.index') !!}">Online Video Darslar</a>
      </li>
      <li class="breadcrumb-item active">Yangi dars yaratish</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>O'zingizni online darsingizni yarating</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'onlineVideoDars.store', 'id' => 'addForm', 'files' => true]) !!}

                                   @include('online_video_dars.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
