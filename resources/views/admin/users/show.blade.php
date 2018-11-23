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
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">

        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('storage/users/'.$user->image)}}" alt="{{ $user->name }} profile picture">
            <h3 class="profile-username text-center">{{$user->name}}</h3>
            <div class="col-md-12">
              <div class="col-md-6">
                  <i class="fa fa-sitemap"></i> <a class="pull-right">@if($user->getRole($user->id)->name === 'user') {{__('User')}} @else {{__('Admin')}} @endif</a>
              </div>
              <div class="col-md-6">
                  <i class="fa fa-envelope"></i> <a class="pull-right">{{$user->email}}</a>
              </div>
            </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="box-footer">
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{__('Delete')}}</button>
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
        <li class="active"><a href="{{ url('admin/users/'.$user->id.'') }}"><i class="fa fa-eye"></i> Show User</a></li>
      </ol>
    </section>
@endsection


@section('pagetitle')
Administration Panel | Show User
@endsection