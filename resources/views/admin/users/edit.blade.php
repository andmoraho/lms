@extends('layouts.admin')

@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    <strong>Unable to update the User!</strong><br><br>
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
          <h3 class="box-title">{{__('Update User')}}</h3>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
              <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Name">
              </div>
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email">
              </div>
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                <select class="form-control" name="role" id="role">
                  <option value="admin" @if($user->getRole($user->id)->name === 'admin') selected @endif>{{__('Admin')}}</option>
                  <option value="author" @if($user->getRole($user->id)->name === 'author') selected @endif>{{__('Author')}}</option>
                  <option value="user" @if($user->getRole($user->id)->name === 'user') selected @endif>{{__('User')}}</option>
                </select>
              </div>
              <div class="input-group form-group">
                <img class="profile-user-img img-responsive img-circle" src="{{asset('storage/users/'.$user->image)}}" alt="{{ $user->name }} profile picture">
              </div>
              <div class="form-group">
                <label for="image">{{__('New Image')}}</label>
                <input type="file" id="image" name="image">
                <p class="help-block">{{__('Image of 500 x 500 px.')}}</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> {{__('Update')}}</button>
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
        <li class="active"><a href="{{ url('admin/users/'.$user->id.'/edit') }}"><i class="fa fa-pencil"></i> Update User</a></li>
      </ol>
    </section>
@endsection


@section('pagetitle')
Administration Panel | Create User
@endsection