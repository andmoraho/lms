@extends('layouts.admin')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <p>{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <p>{{ $message }}</p>
    </div>
@endif

 <section class="content">
  <div class="row">
    <!-- column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
        <a href="{{ url('admin/users/create') }}" class="btn btn-success"> <i class="fa fa-user-plus"></i> {{__('Create User')}}</a>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
        @foreach ($users as $user)
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header @if( $user->getRole($user->id)->name === 'admin' ) bg-aqua-active @else bg-yellow @endif">
              <div class="widget-user-image">
                <img class="img-circle" src="{{asset('storage/users/'.$user->image)}}" alt="{{ $user->name }} Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $user->name }}</h3>
            <h5 class="widget-user-desc">{{ucfirst($user->getRole($user->id)->name)}}</h5>
              <h5 class="widget-user-desc">{{$user->email}}</h5>

            </div>
            <div class="box-footer no-padding text-center @if( $user->getRole($user->id)->name === 'admin' ) bg-aqua-active @else bg-yellow @endif">
              <a class="btn btn-app" href="{{ route('users.edit',$user->id) }}">
                <i class="fa fa-edit"></i> Edit
              </a>
              <a class="btn btn-app" href="{{ route('users.show',$user->id) }}">
                  <i class="fa fa-eye"></i> Show
              </a>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        @endforeach

        <div class="col-md-12">
          {!! $users->links() !!}
        </div>
        

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
        <li class="active"><a href="{{ url('admin/users') }}"><i class="fa fa-user"></i> Users</a></li>
      </ol>
    </section>
@endsection


@section('pagetitle')
Administration Panel | Users
@endsection