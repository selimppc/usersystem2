@extends('admin::layouts.master')
@section('sidebar')
@include('admin::layouts.sidebar')
@stop

@section('content')
        <!-- form open for batch delete -->
{{--{!!  Form::open(['route' => ['delete-permission-role']]) !!}--}}

<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>we can show all permission in this page<br> and add new permission, update from this page</em>"></span>
                <a class="btn btn-primary btn-xs pull-right pop" data-toggle="modal" href="#addData" data-placement="top" data-content="click add permission role button for new permission of a role">
                    <strong>Add New Permission Role</strong>
                </a>
                <input type="button" id="deleteBatch" class="btn btn-primary btn-xs" value="Delete Selected Permission Role" style="display: none;"  onclick="submitForm()" {{--"return confirm('Are you sure to Delete?')"--}}>
                @if(Session::get('role_id')!='cadmin' && Session::get('role_id')!='user')
                <a class="btn btn-info btn-xs pull-right pop" href="{{route('index-permission')}}" data-placement="left" data-content="Click to redirect in permission page" style="margin-right: 10px;">
                    <strong>Go to permission page</strong>
                </a>
                @endif
            </div>
            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['method' =>'GET','url'=>'/search-permission-role']) !!}
                <div id="index-search">
                    @if(Session::get('role_id')!='cadmin' && Session::get('role_id')!='user' )
                        <div class="col-sm-3">
                            {!! Form::Select('company_id',$company, @Input::get('company_id')? Input::get('company_id') : null,['class' => 'form-control input-sm', 'title'=>'select your require "company"']) !!}
                        </div>
                    @endif
                    <div class="col-sm-3">
                        {!! Form::Select('role_id',($role_id), @Input::get('role_id')? Input::get('role_id') : null,['class' => 'form-control input-sm', 'title'=>'select your require "role", example :: admin, then click "search" button']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('permission_name',@Input::get('permission_name')? Input::get('permission_name') : null,['class' => 'form-control input-sm','placeholder'=>'Type permission name', 'title'=>'Type your require "permission name", then click "search" button']) !!}
                    </div>
                    <div class="col-sm-2 filter-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-sm pull-left btn-search-height','id'=>'button', 'data-placement'=>'right', 'data-content'=>'Type role name and permission name in specific field then click search button for required information')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <p> &nbsp;</p>
                <p> &nbsp;</p>

                {{-------------- Filter :Ends -------------------------------------------}}
                        <!-- form open for batch delete -->
                {!!  Form::open(['route' => ['delete-permission-role'], 'id' => 'formCheckbox']) !!}
                <div class="table-primary">
                    <table id="jq-datatables-example" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll">&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="check for select permission roles delete"></span></th>
                            <th> Role </th>
                            <th> Permission </th>
                            @if(Session::get('role_id')!='cadmin' && Session::get('role_id')!='cadmin' )
                                <th>Company</th>
                            @endif
                            <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details information<br>update : click for update information"></span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td><input type="checkbox" name="pr_ids[]" value="{{ $values->id }}"></td>
                                    <td>{{isset($values->r_title)?ucfirst($values->r_title):ucfirst($values->relRole->title)}}</td>
                                    <td>{{isset($values->p_title)?ucfirst($values->p_title):ucfirst($values->relPermission->title)}}</td>
                                    @if(Session::get('role_id')!='cadmin' && Session::get('role_id')!='cadmin' )
                                        <td>{{ $values->company_title }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('view-permission-role', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                        @if($values->role_id!=$first_role_id)
                                            <a href="{{ route('delete-permission-role', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                <!-- form close for bathc delete -->
                {!! Form::close() !!}

                <span class="pull-right">{!! str_replace('/?', '?',  $data->appends(Input::except('page'))->render() ) !!} </span>
            </div>
        </div>
    </div>
</div>
<!-- page end-->

<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Permission assign to a role <span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2"></font> </span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'add-permission-role','id' => 'form_2']) !!}
                @include('admin::permission_role._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!-- modal -->
<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>

<script>

    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
        if($(this).prop("checked") == true){
            $("#deleteBatch").show();
        }
        else{
            $("#deleteBatch").hide();
        }
    });
    $("table input:checkbox").on('change',function(){
        if($(this).prop("checked") == true){
            $("#deleteBatch").show();
        }
    });
    function submitForm(){
        var form = document.getElementById('formCheckbox');
        var r = confirm("Press a button!");
        if (r == true) {
            form.submit();
        } else {
            return false;
        }
    }
</script>
<!-- modal -->
{{--<script>

    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
        if($(this).prop("checked") == true){
            $("#deleteBatch").show();
        }
        else{
            $("#deleteBatch").hide();
        }
    });
    $("table input:checkbox").on('change',function(){
        if($(this).prop("checked") == true){
            $("#deleteBatch").show();
        }
    });
    function submitForm(){
        var form = document.getElementById('formCheckbox');
        var r = confirm("Press a button!");
        if (r == true) {
            form.submit();
        } else {
            return false;
        }
    }
</script>--}}
<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif


        <!-- form close for bathc delete -->
    {{--{!! Form::close() !!}--}}
@stop