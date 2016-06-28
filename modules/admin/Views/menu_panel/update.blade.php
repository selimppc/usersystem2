<script type="text/javascript" src="{{ URL::asset('assets/bitd/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/bitd/js/custom.min.js') }}"></script>


{!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-menu-panel', $data->id]]) !!}

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::hidden('menu_id',1) !!}
                {!! Form::label('menu_type', 'Menu Type:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::select('menu_type', array(''=>'Select Menu Type','MODU'=>'MODU','MENU'=>'MENU','SUBM'=>'SUBM'),Input::old('menu_type'),['id'=>'update-menu-data','class' => 'form-control','autofocus','required','title'=>'select menu type']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('menu_name', 'Menu Name:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::text('menu_name', Input::old('menu_name'), ['id'=>'menu_name', 'class' => 'form-control','required', 'style'=>'text-transform:capitalize','title'=>'enter menu name']) !!}
            </div>
        </div>
    </div>

    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('route', 'URL:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::text('route', Input::old('route'), ['id'=>'route', 'class' => 'form-control','required','title'=>'enter route of menu']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('parent_menu_id', 'Parent Menu Id	:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::select('parent_menu_id', $menu_data,Input::old('parent_menu_id'),['id'=>'update-parent-menu-id','class' => 'form-control','required']) !!}
                {{--{!! Form::Select('hd_branch_id', $branch_data, @$data[0]['branch_id'],['required', 'class' => 'form-control','title'=>'select journal voucher branch']) !!}--}}
            </div>
        </div>
    </div>

    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('icon_code', 'Icon Code:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::text('icon_code', Input::old('icon_code'), ['id'=>'icon_code', 'class' => 'form-control','required','title'=>'enter icon code of menu']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('menu_order', 'Menu Order:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::input('number', 'menu_order', Input::old('menu_order'), ['id'=>'menu_order', 'class' => 'form-control','required', 'step'=>'any','title'=>'enter menu order of menu']) !!}
            </div>
        </div>
    </div>

    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class' => 'form-control','required','title'=>'select status of menu panel']) !!}
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save menu information']) !!}&nbsp;
    <a href="{{route('menu-panel')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

{!! Form::close() !!}

@include('admin::menu_panel.update_script')


<script>
    $(".btn").popover({ trigger: "manual" , html: true, animation:false})
            .on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide");
                    }
                }, 300);
            });


    $(".form-control").tooltip();
    $('input:disabled, button:disabled').after(function (e) {
        d = $("<div>");
        i = $(this);
        d.css({
            height: i.outerHeight(),
            width: i.outerWidth(),
            position: "absolute",
        })
        d.css(i.offset());
        d.attr("title", i.attr("title"));
        d.tooltip();
        return d;
    });
</script>