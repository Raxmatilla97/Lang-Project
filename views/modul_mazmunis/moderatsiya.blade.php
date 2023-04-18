@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">__('lms.modul_mazmuni_uchun')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             __('lms.modul_mazmuni_uchun_moderatsiya')
                             {{-- <a class="pull-right" href="{{ route('news.create') }}"><i class="fa fa-plus-square fa-lg"></i></a> --}}
                         </div>
                         <div class="card-body">
                         
                            @if($modulMazmunis->count() >= 1)
                                <div class="table-responsive-sm">
                                    <table class="table table-striped" id="news-table">
                                        <thead>
                                            <tr>
                                                <th>__('lms.nomlanishi')</th>   
                                                <th>__('lms.aktivligi')</th>
                                                <th>__('lms.moderatsiya')</th>
                                                <th>__('lms.yaratilgan_sana')</th>
                                                <th>__('lms.yaratgan')</th>
                                                <th colspan="3">__('lms.amaliyot')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        @foreach($modulMazmunis as $resurs)
                                                <tr>
                                                    <td>{{ $resurs->title }}</td>
                                                    <td>@if($resurs->is_active)
                                                        <p class="btn btn-success btn-sm">__('lms.aktive')</p>
                                                        @else
                                                        <p class="btn btn-danger btn-sm">__('lms.no_aktive')</p>
                                                        @endif
                                                    
                                                    </td>             
                                                    <td>@if($resurs->is_moderate)
                                                        <p class="btn btn-success btn-sm">__('lms.tasdiqlangan')</p>
                                                    @else
                                                        <p class="btn btn-danger btn-sm">__('lms.tasdiqlanmagan')</p>
                                                    @endif
                                                    
                                                </td>
                                                    <td>{{ $resurs->created_at }}</td>
                                                    <td><p class="btn btn-info btn-sm">{{ $resurs->user->name }}</p></td>
                                                    <td></td>
                                                    <td>
                                                        {!! Form::open(['route' => ['modulMazmunis.destroy', $resurs->id], 'method' => 'delete']) !!}
                                                        <div class='btn-group'>
                                                            <a href="{{ route('modulMazmunis.show', [$resurs->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                                            <a href="{{ route('modulMazmunis.edit', [$resurs->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroringiz qatiymi?')"]) !!}
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div style="width: 50%; margin: auto;">
                                    <img style="width: 100%; display:block; margin:auto;" src="/image/gif_load.gif" alt="">
                                    <h2 class="text-center p-5" style="margin-top: 20px;">@lang('lms.moderatsiyaga_yuborilgan_resurslar_yoq')</h2>
                                </div>                                
                            @endif
                        </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
   

@endsection

