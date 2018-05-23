@extends('admin.admin_template')

@section('title')
  General Information Content
@endsection



@section('content')
    @if(session()->has('message'))
    <div class="alert alert-warning">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">General Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        {{-- <th>Title</th> --}}
                        <th>Content</th>
                        <th width="15%"><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td>{!!$gen->description!!}</td>
            <td>
              <a href="{{url('view_gen_info', array($gen->id))}}" class="btn btn-primary">View</a>
              <a href="{{url('edit_gen_info',array($gen->id))}}" class="btn btn-info">Edit</a>
              {{-- <a href="{{url('delete_gen_info',array($gen->id))}}" class="btn btn-danger">Delete</a> --}}
            </td>
                      </tr>
                    @endforeach
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
{{-- @include('script') --}}

@endsection
