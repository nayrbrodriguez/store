@extends('admin.admin_template')

@section('title')
  Update Course Offering
@endsection
  
@section('content')
  
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>@yield('title')</h4>
      </div>
      <div class="panel-body">
        <form action="{{ url('admin/update_course_offering') }}" method="post">
          <div class="form-group">

            <label for="course">Course</label>
            <input type="hidden" name="id" value="{!!$data->id!!}">
            <input type="text" name="course" class="form-control" value="{!!$data->course!!}">
          </div>
          {{-- <div class="form-group">
            <textarea id="summernote" name="summernote" class="form-control">
              {!! $data->description !!}
            </textarea>
          </div> --}}
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('admin/course_offering')}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form>
      </div>
    </div>
  
  
@endsection