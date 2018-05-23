@extends('admin.admin_template')

@section('title')
  Update {!!$title->title!!}
@endsection
  

@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">
                  <a href="{{url('admin/add_admission')}}" class="btn btn-primary ">Add Admission</a>
                </div>
      <div class="panel-heading"><h3>Admission</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Admission Page</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td><a href="{{url('admin/view_admission', array($gen->id))}}" >{!!$gen->title!!}</a></td>
            {{-- <td>
              <a href="{{url('view_course_offering', array($gen->id))}}" class="btn btn-primary">View</a>
              <a href="{{url('edit_course_offering',array($gen->id))}}" class="btn btn-info">Edit</a>
              <a href="{{url('delete_course_offering',array($gen->id))}}" class="btn btn-danger " type="button">Delete</a>
              <a onclick="return confirm('Are you sure you want to delete {!!$gen->title!!}?')" href="{{url('delete_course_offering',array($gen->id))}}" class="btn btn-danger ">Delete</a>
              
            </td> --}}
                      </tr>
                    @endforeach
                    </tbody>
                    
                  </table>

      </div>
    </div>
   
  </div>
    </div>
    <div class="col-md-6">

   <div class="panel panel-default">
      <div class="panel-heading">
        <h4>@yield('title')</h4>
      </div>
      <div class="panel-body">
        <form action="{{ url('admin/update_admission') }}" method="post">
          <div class="form-group">

            <label for="title">Title</label>
            <input type="hidden" name="id" value="{!!$title->id!!}">
            <input type="text" name="title" class="form-control" value="{!!$title->title!!}">
          </div>
          <div class="form-group">
            <textarea id="summernote" name="summernote" class="form-control">
              {!! $title->description !!}
            </textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('admin/view_admission',$title->id)}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form>
      </div>
    </div>
       
        
    </div>
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
  @include('admin.search.admission')
@endsection















{{-- 
@section('')
  
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>@yield('title')</h4>
      </div>
      <div class="panel-body">
        <form action="{{ url('update_arabic_department') }}" method="post">
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
@endsection --}}