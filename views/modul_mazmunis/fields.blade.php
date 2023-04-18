
<div class="alert alert-success" role="alert" style="margin-bottom: 2.5rem;">
    <h4 class="alert-heading">@lang('lms.eslatma')</h4>
    <p>
        @lang('lms.modul_create_eslatma')    
    </p>
    <hr>
    <p class="mb-0">@lang('lms.modul_create_eslatma2')     <a href="/conversations">Chat</a></p>
  </div>

<div class="row col-sm-12 col-lg-12">
    <div class="form-group col-sm-8" style="margin-top: 40px;">
        {!! Form::label('title', __('lms.modul_title')) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Img Field -->
    <div class="form-group col-sm-4">
        <div class="col-md-12 mb-2">
            @if( isset($modulMazmuni->img))
                <img style="width: 80%" id="image_preview_container" src="{{asset('/image')}}/{{$modulMazmuni->img}}"
                alt="preview image" style="max-height: 150px;">
            @else
                <img style="width: 80%" id="image_preview_container" src="{{ asset('storage/default.jpg') }}"
                alt="preview image" style="max-height: 150px;">
            @endif
       
    </div>
        {!! Form::label('img', 'Suratini yuklang:') !!}
        {!! Form::file('img',['id' => 'image', 'multiple', 'data-allow-reorder' => 'true', 'data-max-file-size' => '3MB', 'data-max-files' => '1']) !!}
    </div>
    <div class="clearfix"></div>
   
</div>

<div class="row col-sm-12 col-lg-12">
    <!-- File Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('file', __('lms.modul_file')) !!}
        {!! Form::file('file') !!}
        @if(isset($file_old) != "")
        <a href="/files/{{$file_old}}" target="_blank"><button type="button" class="btn btn-primary btn-sm mt-3">@lang('lms.modul_file_download')</button></a>
        @endif
        
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('category', __('lms.modul_category_tanlash')) !!}
        {!! Form::select('category', [
        'mavular' => __('lms.mavzular'),
        'tagdimotlar' => __('lms.tagdimotlar'),
        'video_darslar' =>  __('lms.video_darslar'),
        'oqish_uchun_tafsiya' => __('lms.oqish_uchun_tafsiya_qilingan_manbalar'),
        'maqola_va_tezislar' => __('lms.maqola_va_tezislar'),
        'ilmiy_ishlar' => __('lms.ilmiy_ishlar'),
        'meyoriy_hujjatlar' => __('lms.meyoriy_hujjatlar'),
        'shaxsiy_hujjatlar' => __('lms.shaxsiy_hujjatlar'),
       
       
    ], null, ['class' => 'form-control']) !!}
     </div>
   <!-- Url Content Field -->
<div class="form-group col-sm-5">
    {!! Form::label('url_content', __('lms.modul_faylni_boshqa_manzildan_korsatish')) !!}
    {!! Form::text('url_content', null, ['class' => 'form-control', 'placeholder' => "https://youtube.com/"]) !!}
</div>
    
    <div class="clearfix"></div>
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content',  __('lms.asosiy_qism')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<script>
    CKEDITOR.replace( 'content' );
</script>


<div class="row col-sm-12 col-lg-12">
        <!-- Is Ready Field -->
    <div class="form-group col-sm-6 ">
        {!! Form::label('is_active', __('lms.resurs_tayyormi'), ['style' => 'margin-right: 10px;']) !!}
        <label class="checkbox-inline switch-lg switch-label switch-pill switch-success"  style="margin-right: 10px;">
            {!! Form::hidden('is_active', 0) !!}
            {!! Form::checkbox('is_active', '1', null, ['class' => 'switch-input']) !!}
            <span style=" margin-top: 15px;" class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
        </label>
    </div>
{{-- 
    <label class="switch switch-label switch-pill switch-success">
        <input type="checkbox" class="switch-input" checked>
        <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
      </label> --}}

    @if(Auth::user()->hasRole('Admin') or Auth::user()->hasRole('Moderator'))
    <div class="form-group col-sm-6">
        {!! Form::label('is_moderate', __('lms.moderatsiya_bolganmi'), ['style' => 'margin-right: 10px;']) !!}
        <label class="checkbox-inline switch-lg switch-label switch-pill switch-success">
            {!! Form::hidden('is_moderate', 0) !!}
            {!! Form::checkbox('is_moderate', '1', null, ['class' => 'switch-input']) !!}
            <span style=" margin-top: 15px;" class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
        </label>
    </div>    
    @endif

</div>
   

<style>
input[type=checkbox] {
    width:3vw;
    height:3vh;
}
</style>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('lms.saqlash'), ['class' => 'btn btn-success']) !!}
    <a href="{{ route('modulMazmunis.index') }}" class="btn btn-secondary">@lang('lms.sahifadan_chiqish')</a>
</div>


<script>
    $(document).ready(function (e) {
   
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//    });
  
   $('#image').change(function(){
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#image_preview_container').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 
  
   });
  
//    $('.upload_image_form').submit(function(e) {

//      e.preventDefault();
  
//      var formData = new FormData(this);
  
//      $.ajax({
//         type:'POST',
//         url: "{{ url('photo')}}",
//         data: formData,
//         cache:false,
//         contentType: false,
//         processData: false,
//         success: (data) => {
//            this.reset();
//            alert('Surat yuklandi!');
//         },
//         error: function(data){
//            console.log(data);
//          }
//        });
//    });
});
</script>
