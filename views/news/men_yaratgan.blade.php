@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('lms.yangiliklar')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('lms.men_yaratgan_yangiliklar')
                             {{-- <a class="pull-right" href="{{ route('news.create') }}"><i class="fa fa-plus-square fa-lg"></i></a> --}}
                         </div>
                         <div class="card-body">                         
                            <div class="table-responsive-sm">
                                <table class="table table-striped" id="news-table">
                                    <thead>
                                        <tr>
                                            <th>@lang('lms.nomlanishi')</th>   
                                            <th>@lang('lms.aktivligi')</th>
                                            <th>@lang('lms.moderatsiya')</th>
                                            <th>@lang('lms.yaratilgan_sana')</th>
                                            <th>@lang('lms.yaratgan')</th>
                                            <th colspan="3">@lang('lms.amaliyot')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $resurs)
                                        <tr>
                                            <td>{{ $resurs->title }}</td>
                                            <td>@if($resurs->is_active)
                                                 <p class="btn btn-success btn-sm">@lang('lms.aktive')</p>
                                                @else
                                                 <p class="btn btn-danger btn-sm">@lang('lms.no_aktive')</p>
                                                @endif
                                              
                                            </td>             
                                            <td>@if($resurs->is_ready)
                                                <p class="btn btn-success btn-sm">@lang('lms.tasdiqlangan')</p>
                                               @else
                                                <p class="btn btn-danger btn-sm">@lang('lms.tasdiqlanmagan')</p>
                                               @endif
                                             
                                           </td>
                                            <td>{{ $resurs->created_at }}</td>
                                            <td><p class="btn btn-info btn-sm">{{ $resurs->user->name }}</p></td>
                                            <td></td>
                                            <td>
                                                {!! Form::open(['route' => ['news.destroy', $resurs->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{{ route('news.show', [$resurs->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('news.edit', [$resurs->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroringiz qatiymi?')"]) !!}
                                                </div>
                                                {!! Form::close() !!}
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
         </div>
    </div>
   

@endsection

