<div class="row">
    <div class="col-lg-8" style="margin: auto;     margin-bottom: 15px;">
    <form action="{{ route('onlineVideoDars.search') }}" method="GET" role="search">
    
        <div class="input-group" style="margin-top: 10px;">
            <input type="text" class="form-control form-control-lg" name="search"
                placeholder="Online kurslarni qidirish formasi" >                                                        
                <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span> 
                </button>
            </span>
        </div>
    </form>
</div>
</div>