<!DOCTYPE html>
<html>
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title') | {{ getAppName() }}</title>
    <meta name="description" content="@yield('title') - {{getAppName()}}">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" href="{{ mix('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="{{ mix('assets/css/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icheck/skins/all.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/jquery.toast.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ mix('assets/css/nav.scss') }}"> --}} 
    <script src='https://meet.jit.si/external_api.js'></script>  
    <script src="{{ mix('assets/js/jquery.min.js') }}"></script>

    
    
    
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        let webNotificationRoute = '{{ url('update-web-notifications') }}/';
        let currentUserId = '{{ getLoggedInUserId() }}';
        let isSubscribedBefore = '{{ !is_null(Auth::user()->is_subscribed) ? true : false }}';

        let oneSignalAppId = '{{ config('onesignal.app_id') }}';
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function () {
            OneSignal.init({
                appId: oneSignalAppId,
            });

            // if push is disabled in DB then disable it in OneSignal too.
            let isPushEnabled = '{{Auth::user()->is_subscribed}}';
            if (!isPushEnabled) {
                OneSignal.setSubscription(false);
            }

            $('#webNotification').on('ifChanged', function () {
                let isSubscribed = ($(this).val()) ? false : true;

                if (isSubscribed) {
                    OneSignal.showNativePrompt();
                } else {
                    if (confirm("Veb-xabarnomani o'chirishga ishonchingiz komilmi?")) {
                        OneSignal.getUserId(function (userId) {
                            OneSignal.setSubscription(false);
                            updateWebPushNotification(false, userId);
                        });
                    }
                }
            });

            OneSignal.on('customPromptClick', function (promptClickResult) {
                let result = promptClickResult.result;

                if (result == 'denied') {
                    updateWebPushNotification(false);
                    return;
                }

                OneSignal.getUserId(function (userId) {
                    updateWebPushNotification(true, userId);
                });
            });

            /** Show Subscribe web notification only first time */
            if (!isSubscribedBefore) {
                OneSignal.showNativePrompt();
            }
        });

        function updateWebPushNotification (isSubscribed, oneSignalPlayerId = null) {
            /** Change Web notification Status */
            let data = {};
            data.is_subscribed = isSubscribed;
            if (oneSignalPlayerId) {
                data.player_id = oneSignalPlayerId;
            }

            $.ajax({
                url: webNotificationRoute,
                type: 'PUT',
                data: data,
                success: function (result) {
                    if (result.success) {
                        displayToastr('Success', 'success', result.message);
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }
                },
                error: function (result) {
                    displayToastr('Error', 'error', result.responseJSON.message);
                },
            });
        }
    </script>
    <link rel="stylesheet" href="{{ mix('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/emojionearea.min.css') }}">
    @yield('page_css')
    <link rel="stylesheet" href="{{ mix('assets/css/style.css') }}">
    @yield('css')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">


<div class="app-body">
    {{-- @include('layouts.sidebar') --}}
    @include('layouts.change_password')
    <main class="main">
        @yield('content')
    </main>
</div>
@include('chat.templates.notification')
@include('partials.file-upload')
@include('partials.set_custom_status_modal')

</body>
<!-- jQuery 3.1.1 -->
<script src="{{ mix('assets/js/popper.min.js') }}"></script>
<script src="{{ mix('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ mix('assets/js/coreui.min.js') }}"></script>
<script src="{{ mix('assets/js/jquery.toast.min.js') }}"></script>
<script src="{{ mix('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('assets/icheck/icheck.min.js') }}"></script>
<script src="https://www.jsviews.com/download/jsviews.min.js"></script>
<script src="{{ asset('js/emojionearea.js') }}"></script>
<script src="{{ mix('assets/js/emojione.min.js') }}"></script>
@yield('page_js')
<script>
    let setLastSeenURL = '{{url('update-last-seen')}}';
    let pusherKey = '{{ config('broadcasting.connections.pusher.key') }}';
    let pusherCluster = '{{ config('broadcasting.connections.pusher.options.cluster') }}';
    let messageDeleteTime = '{{ config('configurable.delete_message_time') }}';
    let changePasswordURL = '{{ url('change-password') }}';
    let baseURL = '{{ url('/') }}';
    let conversationsURL = '{{ route('conversations') }}';
    let notifications = JSON.parse(JSON.stringify({!! json_encode(getNotifications()) !!}));
    let loggedInUserId = '{{Auth::id()}}';
    let loggedInUserStatus = '{!! Auth::user()->userStatus !!}';
    if (loggedInUserStatus != '') {
        loggedInUserStatus = JSON.parse(JSON.stringify({!! Auth::user()->userStatus !!}));
    }
    let setUserCustomStatusUrl = '{{ route('set-user-status') }}';
    let clearUserCustomStatusUrl = '{{ route('clear-user-status') }}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>

<script src="{{ mix('assets/js/app.js') }}"></script>
<script src="{{ mix('assets/js/custom.js') }}"></script>
<script src="{{ mix('assets/js/notification.js') }}"></script>
<script src="{{ mix('assets/js/set_user_status.js') }}"></script>
<script src="{{ mix('assets/js/set-user-on-off.js') }}"></script>
<script src="https://coreui.io/docs/dist/js/coreui.bundle.min.js"></script>


@yield('scripts')

</html>
