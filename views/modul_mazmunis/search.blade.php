@extends('layouts.app')

@section('content')
<style>
    .nav-tabs .nav-link {
    margin-bottom: calc(-1 * var(--cui-nav-tabs-border-width));
    background: 0 0;
    border: var(--cui-nav-tabs-border-width) solid transparent;
    border-top-left-radius: var(--cui-nav-tabs-border-radius);
    border-top-right-radius: var(--cui-nav-tabs-border-radius);
}
.nav-tabs {
    --cui-nav-tabs-border-width: 1px;
    --cui-nav-tabs-border-color: #c4c9d0;
    --cui-nav-tabs-border-radius: 0.375rem;
    --cui-nav-tabs-link-hover-border-color: #d8dbe0 #d8dbe0 #c4c9d0;
    --cui-nav-tabs-link-active-color: #768192;
    --cui-nav-tabs-link-active-bg: #fff;
    --cui-nav-tabs-link-active-border-color: #c4c9d0 #c4c9d0 #fff;
    border-bottom: var(--cui-nav-tabs-border-width) solid var(--cui-nav-tabs-border-color);
}
.nav {
    --cui-nav-link-padding-x: 1rem;
    --cui-nav-link-padding-y: 0.5rem;
    --cui-nav-link-font-weight: ;
    --cui-nav-link-color: var(--cui-link-color);
    --cui-nav-link-hover-color: var(--cui-link-hover-color);
    --cui-nav-link-disabled-color: #8a93a2;
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
</style>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('lms.modul_mazmuni')</li>
    </ol>
    <div class="container-fluid justify-content-center">
        <div class="animated fadeIn">
             @include('flash::message')
            
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header" style="margin-bottom: 10px">
                             <i class="fa fa-align-justify"></i>
                            @lang('lms.modul_mazmuni_qismi')
                             {{-- <a class="pull-right" href="{{ route('news.create') }}"><i class="fa fa-plus-square fa-lg"></i></a> --}}
                         </div>
                         
                         {{-- @include('news.statistika') --}}
                         
                       @include('modul_mazmunis.search_form')
                       
                         <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1154">
                              <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="grid-tab" data-coreui-toggle="tab" data-coreui-target="#grid" type="button" role="tab" aria-controls="grid" aria-selected="true">@lang('lms.grid_usulida_korish')</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="jadval-tab" data-coreui-toggle="tab" data-coreui-target="#jadval" type="button" role="tab" aria-controls="jadval" aria-selected="false" tabindex="-1">@lang('lms.jadval_orqali_korish')</button>
                                </li>
                               
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                  
                                    <div class="content">
                                         <div class="row row-cols-1 row-cols-2 g-4 " style="background-color: #fafbfc;">                                            
                                            @if($modulMazmunis->isNotEmpty())
                                                @foreach ($modulMazmunis as $resurs )
                                                    @if($resurs->is_active and $resurs->is_moderate and $resurs->is_private == 0 )   
                                                        <div class="col">
                                                            <div class="card" style="width: 20rem;">
                                                                <img src="@if($resurs->img)
                                                                /image/{{ $resurs->img }}
                                                                @else
                                                                    {{'frontend/images/a270d270d5ca184422cf980475b99e24.gif'}}
                                                                @endif" class="card-img-top" alt="...">
                                                                <hr>
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $resurs->title }}</h5>
                                                                    <p class="card-text">{{ $resurs->user->name }}</p>
                                                                    <a href="{{ route('modulMazmunis.show', [$resurs->id]) }}" class="btn btn-primary">@lang('lms.oqish')</a>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else 
                                                <div style="width: 50%; margin: auto;">
                                                    <img style="width: 70%; display:block; margin:auto;" src="{{asset('/image/notfound.gif')}}" alt="">
                                                    <h2 class="text-center p-5" style="margin-top: 20px;">@lang('lms.malumot_yoq')</h2>
                                                </div>     
                                            @endif
                                        </div> 
                                    </div>


                                </div>
                                <div class="tab-pane fade" id="jadval" role="tabpanel" aria-labelledby="jadval-tab">
                                    <div class="card-body">                         
                                        @include('modul_mazmunis.table')
                                         <div class="pull-right mr-3">
                                                
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
    </div>
   

@endsection

