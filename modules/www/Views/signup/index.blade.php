@extends('admin::layouts.login')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-sm">
                <div id="logo-login" class="light-version">
                    <!--<img src="<?php //echo e(URL::to('/')); ?>/assets/img/logo-dark.png" alt="SOP" class="bgm_logo_img">-->
                    <h3>Online Platform</h3>
                </div>
                <br clear="all" />
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    @include('www::signup._form')
                </div>
            </div>
        </div>
    </div>
@stop

