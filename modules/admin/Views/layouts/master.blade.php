<!DOCTYPE html>
<html lang="en">
<head>
    <title> {{isset($pageTitle)?$pageTitle:'User System'}}</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/main/css/theme-default/bootstrap.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/main/css/theme-default/materialadmin.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/main/css/theme-default/font-awesome.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/main/css/theme-default/material-design-iconic-font.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/main/css/theme-default/libs/rickshaw/rickshaw.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/main/css/theme-default/libs/morris/morris.core.css') }}" />
    <!-- END STYLESHEETS -->
    <!-- Main Scripts -->
    <script src="{{ asset("assets/main/js/libs/jquery/jquery-1.11.2.min.js") }}"></script>
    <script src="{{ asset("assets/main/js/libs/jquery/jquery-migrate-1.2.1.min.js") }}"></script>
    <script src="{{ asset('assets/main/js/libs/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Main Scripts -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN HEADER-->
@include('admin::layouts.header')
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <message>
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {{--set some message after action--}}
                @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get("message")}}</div>

                @elseif(Session::has('error'))
                    <div class="alert alert-warning">{{Session::get("error")}}</div>

                @elseif(Session::has('info'))
                    <div class="alert alert-info">{{Session::get("info")}}</div>

                @elseif(Session::has('danger'))
                    <div class="alert alert-danger">{{Session::get("danger")}}</div>
                @endif
            </message>
            <div class="section-body">
                @yield('content')
            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    @include('admin::layouts.sidebar')
    <!-- END MENUBAR -->

    <!-- BEGIN OFFCANVAS RIGHT -->
    <div class="offcanvas">

        <!-- BEGIN OFFCANVAS SEARCH -->
        <div id="offcanvas-search" class="offcanvas-pane width-8">
            <div class="offcanvas-head">
                <header class="text-primary">Search</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>
            <div class="offcanvas-body no-padding">
                <ul class="list ">
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>A</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar4.jpg?1404026791" alt="" />
                            </div>
                            <div class="tile-text">
                                Alex Nelson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar9.jpg?1404026744" alt="" />
                            </div>
                            <div class="tile-text">
                                Ann Laurens
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>J</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar2.jpg?1404026449" alt="" />
                            </div>
                            <div class="tile-text">
                                Jessica Cruise
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar8.jpg?1404026729" alt="" />
                            </div>
                            <div class="tile-text">
                                Jim Peters
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>M</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar5.jpg?1404026513" alt="" />
                            </div>
                            <div class="tile-text">
                                Mabel Logan
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar11.jpg?1404026774" alt="" />
                            </div>
                            <div class="tile-text">
                                Mary Peterson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar3.jpg?1404026799" alt="" />
                            </div>
                            <div class="tile-text">
                                Mike Alba
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>N</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar6.jpg?1404026572" alt="" />
                            </div>
                            <div class="tile-text">
                                Nathan Peterson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>P</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar7.jpg?1404026721" alt="" />
                            </div>
                            <div class="tile-text">
                                Philip Ericsson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>S</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="../../assets/img/avatar10.jpg?1404026762" alt="" />
                            </div>
                            <div class="tile-text">
                                Samuel Parsons
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                </ul>
            </div><!--end .offcanvas-body -->
        </div><!--end .offcanvas-pane -->
        <!-- END OFFCANVAS SEARCH -->

        <!-- BEGIN OFFCANVAS CHAT -->
        <div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
            <div class="offcanvas-head style-default-bright">
                <header class="text-primary">Chat with Ann Laurens</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                    <a class="btn btn-icon-toggle btn-default-light pull-right" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                        <i class="md md-arrow-back"></i>
                    </a>
                </div>
                <form class="form">
                    <div class="form-group floating-label">
                        <textarea name="sidebarChatMessage" id="sidebarChatMessage" class="form-control autosize" rows="1"></textarea>
                        <label for="sidebarChatMessage">Leave a message</label>
                    </div>
                </form>
            </div>
            <div class="offcanvas-body">
                <ul class="list-chats">
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
                            <div class="chat-body">
                                Yes, it is indeed very beautiful.
                                <small>10:03 pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li class="chat-left">
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar9.jpg?1404026744" alt="" /></div>
                            <div class="chat-body">
                                Did you see the changes?
                                <small>10:02 pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
                            <div class="chat-body">
                                I just arrived at work, it was quite busy.
                                <small>06:44pm</small>
                            </div>
                            <div class="chat-body">
                                I will take look in a minute.
                                <small>06:45pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li class="chat-left">
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar9.jpg?1404026744" alt="" /></div>
                            <div class="chat-body">
                                The colors are much better now.
                            </div>
                            <div class="chat-body">
                                The colors are brighter than before.
                                I have already sent an example.
                                This will make it look sharper.
                                <small>Mon</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
                            <div class="chat-body">
                                Are the colors of the logo already adapted?
                                <small>Last week</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                </ul>
            </div><!--end .offcanvas-body -->
        </div><!--end .offcanvas-pane -->
        <!-- END OFFCANVAS CHAT -->

    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS RIGHT -->

</div><!--end #base-->
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<script src="{{ asset('assets/main/js/libs/spin.js/spin.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/autosize/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/flot/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/flot/curvedLines.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/d3/d3.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('assets/main/js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/main/js/core/source/App.js') }}"></script>
<script src="{{ asset('assets/main/js/core/source/AppNavigation.js') }}"></script>
<script src="{{ asset('assets/main/js/core/source/AppOffcanvas.js') }}"></script>
<script src="{{ asset('assets/main/js/core/source/AppCard.js') }}"></script>
<script src="{{ asset('assets/main/js/core/source/AppForm.js') }}"></script>
<script src="{{ asset('assets/main/js/core/source/AppNavSearch.js') }}"></script>
<script src="{{ asset('assets/main/js/core/demo/Demo.js') }}"></script>
<script src="{{ asset('assets/main/js/custom.js') }}"></script>
<script src="{{ asset('assets/main/js/core/demo/DemoFormComponents.js') }}"></script>
{{--<script src="{{ asset('assets/main/js/core/demo/DemoDashboard.js') }}"></script>--}}
<!-- END JAVASCRIPT -->

</body>
</html>
