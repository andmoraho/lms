@extends('layouts.admin')

@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    <strong>Unable to create a new User!</strong><br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
@endif

 <section class="content">
  <div class="row">
    <!-- column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Create User')}}</h3>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              </div>
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
              </div>
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                <select class="form-control" name="role" id="role">
                  <option value="admin">{{__('Admin')}}</option>
                  <option value="author">{{__('Author')}}</option>
                  <option value="user">{{__('User')}}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="image">{{__('Image')}}</label>
                <input type="file" id="image" name="image">
                <p class="help-block">{{__('Image of 500 x 500 px.')}}</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {{__('Create')}}</button>
            </div>
        </form>
      </div>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col -->
  </div>
  <!-- /.row -->  
</section>

@endsection


@section('contentheader')

<section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ url('admin/users') }}"><i class="fa fa-user"></i> Users</a></li>
        <li class="active"><a href="{{ url('admin/users/create') }}"><i class="fa fa-user-plus"></i> Create User</a></li>
      </ol>
    </section>
@endsection


@section('pagetitle')
Administration Panel | Create User
@endsection