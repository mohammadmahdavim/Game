<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <link rel="stylesheet" href="/assets/vendors/bundle.css" type="text/css">

    <link rel="stylesheet" href="/assets/css/app.css?fdf" type="text/css">
    <link rel="stylesheet" href="/assets/css/custom.css?1" type="text/css">
    {{--    <link rel="stylesheet" href="{{(asset('assets/css/aos.css'))}}" type="text/css">--}}

    <link rel="manifest" href="/manifest.json">
{{--    <link rel="shortcut icon" href="/assets/media/image/logo.png">--}}
    <meta name="theme-color" content="#3f51b5"/>

    @yield('css')

    <style>

        body {
            font-family: Sans-Serif !important;
        }

        .multiselect-container {
            z-index: 10056;
        }

        .multiselect-all input[type=checkbox], .multiselect-option input[type=checkbox] {
            margin-left: -20px;
        }

        .multiselect-container .multiselect-filter {
            position: sticky;
            top: 0;
            z-index: 1056;
        }


        .multiselect-container .form-check-label {
            margin-left: 8px;
        }


    </style>

</head>
<body>

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>LOADING ...</span>
</div>
<!-- end::page loader -->

<!-- begin::sidebar -->
<!-- end::sidebar -->

<!-- begin::side menu -->
@include('include.menu')
<!-- end::side menu -->

<!-- begin::navbar -->
<nav class="navbar"
     style="@if(env('APP_ENV') != 'production') background: linear-gradient(45deg,  #240747,#3f0f78, #f03861); @endif">
    <div class="container-fluid">


        <img src="/assets/media/image/logo.png" alt="..." height="40px" width="40px">
<p>Admin Panel</p>
{{--        <h2 class="text-white ml-5 "> {{env('APP_ENV')}}</h2>--}}

        <div class="header-body">


            <div class="input-group">

            </div>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown">
                        <figure class="avatar avatar-sm avatar-state-success">
                            <img class="rounded-circle" src="/assets/media/image/avatar.jpg" alt="...">
                        </figure>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <a href="/panel/profile" class="dropdown-item">Profile</a>
                        <div class="dropdown-divider"></div>
                        <form action="/logout" method="post">
                            @csrf
                            <button href="" class="text-danger dropdown-item">exit</button>

                        </form>
                    </div>
                </li>
                <li class="nav-item d-lg-none d-sm-block">
                    <a href="#" class="nav-link side-menu-open">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<main class="main-content">

    <div class="container-fluid">
        @yield('content')

    </div>
</main>


<div
        onclick="$(this).removeClass('hide')"
        id="master_loading"

        style="z-index: 9000000;
    display: none;
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    padding-left: 30%;
    background: rgba(130,172,183,0.15);">


</div>

<script src="{{asset('assets/js/js.cookie.min.js')}}" ></script>

<script src="/assets/vendors/bundle.js"></script>
<!-- end::global scripts -->

<script src="/assets/js/custom.js?2"></script>
<!-- begin::custom scripts -->
<script src="/assets/js/app.js"></script>



<!-- end::custom scripts -->

{{--<script src="//unpkg.com/xhook@latest/dist/xhook.min.js"></script>--}}

<script>

    function showLoading() {
        $('#master_loading').fadeIn('fast');
    }

    function hideLoading() {
        $('#master_loading').fadeOut('fast');
    }

    function swAlert(text, type = 'success', title = '',) {
        swal({
            title: title,
            text: text,
            type: type,
            icon: type,
        });
    }

    function bootstrap_multi_select_config(idOrClass = '.bootstrap_multi_select', onShownFunc = '', onHiddenFunc = '') {
        $(idOrClass).multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
            onDropdownShown: function (event) {
                if (onShownFunc !== '')
                    onShownFunc()
            },
            onDropdownHide: function (event) {
                if (onHiddenFunc !== '')
                    onHiddenFunc()
            },
        });
    }

    function bootstrap_multi_select_rebuild(idOrClass = '.bootstrap_multi_select', onShownFunc = '', onHiddenFunc = '') {
        $(idOrClass).multiselect('destroy');
        bootstrap_multi_select_config(idOrClass, onShownFunc, onHiddenFunc)
    }

    $(document).ready(function () {
        bootstrap_multi_select_config();
    });

    function awsLogError(id) {
        var logText = JSON.parse($('#' + id).html());
        var msg = JSON.parse(logText.Message).detail;

        swAlert('Error code: ' + msg.errorCode + "\nMessage: " + msg.errorMessage, 'error', 'AWS Error ');

    }


    function searchWithSelect2(idOrClass, url, keys_array, key_id = 'id', rqParams = '') {

        setTimeout(function () {
            $('#' + idOrClass).select2({
                ajax: {
                    url: url,
                    dataType: 'json',
                    delay: 250,
                    multiple: true,
                    data: function (params) {
                        return {
                            term: params.term, // search term
                            page: params.page,
                            rqParams: rqParams,
                        };
                    },
                    processResults: function (data) {

                        if (data.status === false || data.data.length === 0) {
                            return;
                        } else {
                            return {
                                results: $.map(data.data, function (item) {

                                    var custom_text = '';
                                    $.each(keys_array, function (i, o) {
                                        var itemTmp = '';
                                        if (o.includes('.')) {
                                            $.each(o.split('.'), function (i2, o2) {
                                                if (itemTmp === '')
                                                    itemTmp = item[o2]
                                                else
                                                    itemTmp = itemTmp[o2]
                                            });
                                        } else {
                                            itemTmp = item[o];
                                        }

                                        custom_text += itemTmp + ' ';
                                    });


                                    return {
                                        text: custom_text,
                                        // slug: item.last_name,
                                        id: item[key_id]
                                    }
                                })
                            };
                        }
                    }
                }
            });
        }, 0)
    }

    $(document).ready(function () {

        $.each($('.select2Search'), function (index, item) {
            if ($(item).attr('id') === undefined ||
                $(item).attr('searchSelect2-url') === undefined ||
                $(item).attr('searchSelect2-keys') === undefined
                // $(item).attr('searchSelect2-rqParams') === undefined

            ) {

                console.log('select2Search => this item doesn\'t attr => ' + item)
                swAlert("attr not found.\n" +
                    $(item).attr('id') + ' ' +
                    $(item).attr('searchSelect2-url') + ' ' +
                    $(item).attr('searchSelect2-keys') + ' ' +
                    $(item).attr('searchSelect2-rqParams') +
                    "\nplease see console log", 'error')
                return;
            }

            searchWithSelect2($(item).attr('id'), $(item).attr('searchSelect2-url'), $(item).attr('searchSelect2-keys').split(','), 'id',$(item).attr('searchSelect2-rqParams')??'')
        })
    });

    function rebuildSelect2Search(itemClassOrIdWithDotOrSharp) {
            searchWithSelect2($(itemClassOrIdWithDotOrSharp).attr('id'), $(itemClassOrIdWithDotOrSharp).attr('searchSelect2-url'), $(itemClassOrIdWithDotOrSharp).attr('searchSelect2-keys').split(','),'id', $(itemClassOrIdWithDotOrSharp).attr('searchSelect2-rqParams')??'')
    }


    /*xhook.after(function (request, response) {
        hideLoading();
    });*/


</script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error('خطا در بارگذاری CKEditor:', error);
        });
</script>

@yield('js')

</body>
</html>
