<div class="table-responsive-sm">
    <table class="table table-striped" id="modulMazmunis-table">
        <thead>
            <tr>
                <th>@lang('lms.mavzu_nomi')</th>    
                <th>@lang('lms.bolimi')</th>
                <th>@lang('lms.holati')</th>
                <th>@lang('lms.holati')</th>
                <th>@lang('lms.yaratgan')</th>
                <th colspan="3">@lang('lms.amaliyot')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($modulMazmunis as $modulMazmuni)      
            @if(str_contains(url()->current(), '/modulMazmunis/category/shaxsiy_hujjatlar'))   
                @if($modulMazmuni->is_active == 1 and $modulMazmuni->is_private == 1 and $modulMazmuni->is_moderate == 1 and $modulMazmuni->user_id == Auth::user()->id)                
                    <tr>
                        <td>
                            <a href="{{ route('modulMazmunis.show', [$modulMazmuni->id]) }}"><b>{{ $modulMazmuni->title }}</b></a>
                        </td>
                        <td>
                            @if($modulMazmuni->category == "mavular")
                                @lang('lms.mavzular')
                            @elseif($modulMazmuni->category == "tagdimotlar")
                               @lang('lms.tagdimotlar')
                            @elseif($modulMazmuni->category == "video_darslar")
                                @lang('lms.video_darslar')
                            @elseif($modulMazmuni->category == "oqish_uchun_tafsiya")
                               @lang('lms.oqish_uchun_tafsiya_qilingan_manbalar')
                            @elseif($modulMazmuni->category == "maqola_va_tezislar")
                                @lang('lms.maqola_va_tezislar')
                            @elseif($modulMazmuni->category == "ilmiy_ishlar")
                               @lang('lms.ilmiy_ishlar')
                            @elseif($modulMazmuni->category == "meyoriy_hujjatlar")
                               @lang('lms.meyoriy_hujjatlar')
                            @elseif($modulMazmuni->category == "shaxsiy_hujjatlar")
                               @lang('lms.shaxsiy_hujjatlar')
                            @else                              
                                @lang('lms.bolim_topilmadi')
                            @endif
                        </td>
                        <td>
                            @if($modulMazmuni->is_active == 1)
                                <p class="btn btn-success btn-sm">@lang('lms.aktive')</p>
                            @else
                                <p class="btn btn-danger btn-sm">@lang('lms.no_aktive')</p>
                            @endif

                            {{-- @if($modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                                @if($modulMazmuni->is_moderate)
                                    <p class="btn btn-success btn-sm">Tasdiqlangan</p>
                                @else
                                    <p class="btn btn-danger btn-sm">Tasdiqlanmagan</p>
                                @endif               
                            @endif    --}}  
                        </td>                       
                        <td>
                            @if($modulMazmuni->is_private)
                                <p class="btn btn-warning btn-sm text-white"><b>@lang('lms.shaxsiy')</b></p>
                            @else
                                <p class="btn btn-info btn-sm text-white"><b>@lang('lms.ochiq_manba')</b></p>
                            @endif    
                        </td>   
                        <td>{{ $modulMazmuni->user->name }}</td>
                        <td>
                            {!! Form::open(['route' => ['modulMazmunis.destroy', $modulMazmuni->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                @if($modulMazmuni->is_private or $modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                                <a href="{{ route('modulMazmunis.show', [$modulMazmuni->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                @endif                       
                                @if($modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                                <a href="{{ route('modulMazmunis.edit', [$modulMazmuni->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroriz qatiymi?')"]) !!}
                                @endif
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif

            @else
                @if($modulMazmuni->is_active == 1 and $modulMazmuni->is_private == 0 and $modulMazmuni->is_moderate == 1)                
                    <tr>
                        <td>
                            <a href="{{ route('modulMazmunis.show', [$modulMazmuni->id]) }}"><b>{{ $modulMazmuni->title }}</b></a>
                        </td>
                        <td>
                            @if($modulMazmuni->category == "mavular")
                                @lang('lms.mavzular')
                            @elseif($modulMazmuni->category == "tagdimotlar")
                                @lang('lms.tagdimotlar')
                            @elseif($modulMazmuni->category == "video_darslar")
                                @lang('lms.video_darslar')
                            @elseif($modulMazmuni->category == "oqish_uchun_tafsiya")
                                @lang('lms.oqish_uchun_tafsiya_qilingan_manbalar')
                            @elseif($modulMazmuni->category == "maqola_va_tezislar")
                                @lang('lms.maqola_va_tezislar')
                            @elseif($modulMazmuni->category == "ilmiy_ishlar")
                                @lang('lms.ilmiy_ishlar')
                            @elseif($modulMazmuni->category == "meyoriy_hujjatlar")
                                @lang('lms.meyoriy_hujjatlar')
                            @elseif($modulMazmuni->category == "shaxsiy_hujjatlar")
                                @lang('lms.shaxsiy_hujjatlar')
                            @else                              
                                @lang('lms.bolim_topilmadi')
                            @endif
                        </td>
                        <td>
                            @if($modulMazmuni->is_active == 1)
                                <p class="btn btn-success btn-sm">@lang('lms.aktive')</p>
                            @else
                                <p class="btn btn-danger btn-sm">@lang('lms.no_aktive')</p>
                            @endif

                            {{-- @if($modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                                @if($modulMazmuni->is_moderate)
                                    <p class="btn btn-success btn-sm">Tasdiqlangan</p>
                                @else
                                    <p class="btn btn-danger btn-sm">Tasdiqlanmagan</p>
                                @endif               
                            @endif    --}}  
                        </td>                       
                        <td>
                            @if($modulMazmuni->is_private)
                                <p class="btn btn-warning btn-sm text-white"><b>@lang('lms.shaxsiy')</b></p>
                            @else
                                <p class="btn btn-info btn-sm text-white"><b>@lang('lms.ochiq_manba')</b></p>
                            @endif    
                        </td>   
                        <td>{{ $modulMazmuni->user->name }}</td>
                        <td>
                            {!! Form::open(['route' => ['modulMazmunis.destroy', $modulMazmuni->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('modulMazmunis.show', [$modulMazmuni->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                @if($modulMazmuni->is_private or $modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))                               
                                @endif                       
                                @if($modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                                <a href="{{ route('modulMazmunis.edit', [$modulMazmuni->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroriz qatiymi?')"]) !!}
                                @endif
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endif
                    


        @endforeach
        </tbody>
    </table>
</div>