@extends('layouts.admin')

@section('content')



@endsection


@section('contentheader')

<section class="content-header">
      <h1>
        Dashboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

@endsection


@section('pagetitle')
Administration Panel
@endsection