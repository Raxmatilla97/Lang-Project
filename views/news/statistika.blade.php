    <div class="docs-example col-lg-12">
                            <div class="row">
                            <div class="col-sm-2">
                                <div class="callout callout-info">
                                <small class="text-muted">@lang('lms.barcha_aktive_yangiliklar')</small><br>
                                <strong class="h4">{{ $news->where('is_active', '=', '1')->count() }} ta</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout callout-danger">
                                <small class="text-muted">@lang('lms.aktiv_bolishi_kutilayotgan')</small><br>
                                <strong class="h4">{{ $news->where('is_active', '=', '0')->count() }} ta</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout callout-warning">
                                <small class="text-muted">@lang('lms.tasdiqlash_jarayonida')</small><br>
                                <strong class="h4">{{ $news->where('is_ready', '=', '0')->count() }} ta</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout callout-success">
                                <small class="text-muted">@lang('lms.tasdiqlangan_yangiliklar')</small><br>
                                <strong class="h4">{{ $news->where('is_ready', '=', '1')->count() }} ta</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout">
                                <small class="text-muted">@lang('lms.umumiy_korishlar')</small><br>
                                <strong class="h4">{{ $db->number }} @lang('lms.martda')</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout callout-primary">
                                <small class="text-muted">Moderator</small><br>
                                <strong class="h4">ADMIN</strong>
                                </div>
                            </div><!--/.col-->
                            </div><!--/.row-->
                           
                            </div>
                           
                        </div>