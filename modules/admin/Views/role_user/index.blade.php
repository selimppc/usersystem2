@extends('admin::layouts.master')
@section('sidebar')
@include('admin::layouts.sidebar')
@stop

@section('content')
        <!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>we can show all role user in this page<br> and add new role user, update ole user from this page</em>"></span>
                {{--<a class="btn btn-primary btn-xs pull-right pop" data-toggle="modal" href="#addData" data-placement="top" data-content="click add user role button for select user and give new role">
                    <strong>Add New Role User</strong>
                </a>--}}
                <a class="btn btn-info btn-xs pull-right pop" href="{{route('role')}}" data-placement="left" data-content="Click to redirect in role page" style="margin-right: 10px;">
                    <strong>Go to Role Page</strong>
                </a>
            </div>

            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['method' =>'GET','url'=>'/search-role-user']) !!}
                <div id="index-search">

                    <div class="col-sm-3">
                        {!! Form::text('username',@Input::get('username')? Input::get('username') : null,['class' => 'form-control input-sm','placeholder'=>'Type user name', 'title'=>'Type your require user name, then click "search" button']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::Select('role_id',($role_id), @Input::get('role_id')? Input::get('role_id') : null,['class' => 'form-control input-sm', 'title'=>'select your require "role", example :: admin, then click "search" button']) !!}
                    </div>
                    <div class="col-sm-2 filter-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-sm pull-left btn-search-height','id'=>'button', 'data-placement'=>'right', 'data-content'=>'type username or select role or both in specific field then click search button for required information')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <p> &nbsp;</p>
                <p> &nbsp;</p>

                {{-------------- Filter :Ends -------------------------------------------}}
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            <th> User </th>
                            <th> Email Address </th>
                            <th> Role </th>
                            <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details informations<br>update : click for update informations"></span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{isset($values->username)?ucfirst($values->username):ucfirst($values->relUser->username)}}</td>
                                    <td>{{isset($values->email)?$values->email:$values->relUser->email}}</td>
                                    <td>{{isset($values->title)?ucfirst($values->title):ucfirst($values->relRole->title)}}</td>
                                    <td>
                                        <a href="{{ route('view-role-user', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-role-user', $values->id) }}" class="btn btn-primary btn-xs" data-content="update"><i class="fa fa-edit"></i></a>
                                        {{--<a href="{{ route('delete-role-user', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                <span class="pull-right">{!! str_replace('/?', '?',  $data->appends(Input::except('page'))->render() ) !!} </span>
            </div>
        </div>
    </div>
</div>


<!-- Modal  -->

<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>

<!-- modal -->


<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif

@stop