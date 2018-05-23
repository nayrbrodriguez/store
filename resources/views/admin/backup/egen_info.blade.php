@extends('admin.admin_template')

@section('title')
  Update General Information
@endsection
  
@section('content')
  
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>@yield('title')</h4>
      </div>
      <div class="panel-body">
        <form action="{{ url('update_gen_info') }}" method="post">
          <div class="form-group">

            <label for="title">Title</label>
            <input type="hidden" name="id" value="{!!$data->id!!}">
            <input type="text" name="title" class="form-control" value="{!!$data->title!!}">
          </div>
          <div class="form-group">
            <textarea id="summernote" name="summernote" class="form-control">
              {!! $data->description !!}
            </textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('gen_info')}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form>
      </div>
    </div>
  
  <script type="text/javascript">
    $(document).ready(function(argument) {
      $('#summernote').summernote({
        height: '200px',
        placeholder:'Content here....',
        fontNames:['Arial','Arial Black','Khmer OS'],
      })
    })
    $('#clear').on('click',function() {
    $('#summernote').summernote('code',null);     
    })

  </script>
@endsection