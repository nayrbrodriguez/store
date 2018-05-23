@extends('admin.admin_template')

@section('title')
  Update Alumni
@endsection
  
@section('content')
  
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>@yield('title')</h4>
      </div>
      <div class="panel-body">
        <form action="{{ url('admin/update_alumni') }}" method="post">
          <div class="form-group">

            <label for="id">Alumni ID</label>
            <input type="text" name="id" class="form-control" value="{!!$data->id!!}">
          </div>
          <div class="form-group">

            <label for="name">Name</label>
            <input type="hidden" name="id" value="{!!$data->id!!}">
            <input type="text" name="name" class="form-control" value="{!!$data->name!!}">
          </div>
          <div class="form-group">

            <label for="year_grad">Year Graduated</label>
            {{-- <input type="hidden" name="id" value="{!!$data->id!!}"> --}}
            <input type="text" name="year_grad" class="form-control" value="{!!$data->year_grad!!}">
          </div>
          <div class="form-group">

            <label for="course">Course</label>
            {{-- <input type="hidden" name="id" value="{!!$data->id!!}"> --}}
            <input type="text" name="course" class="form-control" value="{!!$data->course!!}">
          </div>
         
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('admin/alumni')}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form>
      </div>
    </div>
  
  
@endsection