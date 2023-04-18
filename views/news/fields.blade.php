<div class="alert alert-success" role="alert" style="margin-bottom: 2.5rem;">
    <h4 class="alert-heading">@lang('lms.eslatma')</h4>
    <p>
        @lang('lms.eslatma_desc')     
    </p>
    <hr>
    <p class="mb-0">@lang('lms.modul_create_eslatma2') <a href="/conversations">Chat</a></p>
  </div>

<!-- Title Field -->
<div class="row col-sm-12 col-lg-12">
    <div class="form-group col-sm-8">
        {!! Form::label('title', __('lms.yangilik_nomini_yozing')) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Img Field -->
    <div class="form-group col-sm-4">
        <div class="col-md-12 mb-2">
            @if(isset($news->img))
                @if($news->img == "")            
                    <img style="width: 60%" id="image_preview_container" src="{{ asset('storage/default.jpg') }}"
                    alt="preview image" style="max-height: 150px;">
                @else
                    <img style="width: 50%" id="image_preview_container" src="/image/{{$news->img}}"
                    alt="preview image" style="max-height: 150px;">
                @endif
            @else
                <img style="width: 60%" id="image_preview_container" src="{{ asset('storage/default.jpg') }}"
                alt="preview image" style="max-height: 150px;"> 
            @endif
       
    </div>
        {!! Form::label('img', 'Yangilik suratini yuklang:') !!}
        {!! Form::file('img', ['id' => 'image', 'multiple', 'data-allow-reorder' => 'true', 'data-max-file-size' => '3MB', 'data-max-files' => '1']) !!}
    </div>
    <div class="clearfix"></div>
   
</div>

{{-- <div class="col-md-12 mb-2">
    <img id="image_preview_container" src="{{ asset('storage/default.jpg') }}"
        alt="preview image" style="max-height: 150px;">
</div> --}}


<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', __('lms.asosiy_qismni_yozing')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'classic-ckeditor5']) !!}

    <script>
        CKEDITOR.replace( 'content' );
    </script>
</div>

<div class="row col-sm-12 col-lg-12">
    <!-- Is Ready Field -->
<div class="form-group col-sm-6 ">
    {!! Form::label('is_active', __('lms.yangilik_chop_etishga_tayyormi'), ['style' => 'margin-right: 10px;']) !!}
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
    {!! Form::label('is_ready', __('lms.moderatsiyadan_otganligini_tasdiqlash'), ['style' => 'margin-right: 10px;']) !!}
    <label class="checkbox-inline switch-lg switch-label switch-pill switch-success">
        {!! Form::hidden('is_ready', 0) !!}
        {!! Form::checkbox('is_ready', '1', null, ['class' => 'switch-input']) !!}
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
    {!! Form::submit(__('lms.yangilik_yaratish'), ['class' => 'btn btn-success']) !!}
    <a href="{{ route('news.index') }}" class="btn btn-secondary float-right">@lang('lms.chiqib_ketish')</a>
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

