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
                  <a href="{{url('admin/add_news')}}" class="btn btn-primary ">Add News</a>
                </div>
      <div class="panel-heading"><h3>News</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>News List</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td><a href="{{url('admin/view_news', array($gen->id))}}" >{!!$gen->title!!}</a></td>
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


      <form action="{{ url('admin/update_news') }}" method="post" enctype="multipart/form-data">
          <div class="form-group">

            <label for="title">Title</label>
            <input type="hidden" name="id" value="{!!$title->id!!}">
            <input type="text" name="title" class="form-control" value="{!!$title->title!!}">
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="text" name="date" placeholder="YYYY/MM/DD" class="form-control" value="{!!$title->date!!}">
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <img src="{{ url('/uploads/news',$title->image)}}" style="width:100%; height: 250px; float: left;  margin-right:25px; border:1px black solid; margin-bottom: 10px">
            <br>
            <br>
            <br>
            <br>
            <input type="button"  id="loadFileXml" value="Change the Image" class="btn btn-info" onclick="document.getElementById('image').click();"  />

            <input type="file" id="image" name="image" class="form-control" value="{!!$title->image!!}">
          </div>
          <div class="form-group">
            <label for="description">Short Description</label>
            <textarea class="form-control"  name="description" rows="5" id="comment">{!!$title->description!!}</textarea>
          </div>
          <div class="form-group">
            <label for="content">Content</label>
             <textarea id="summernote" name="summernote" class="form-control">
              {!! $title->content !!}
            </textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('admin/view_news',$title->id)}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form>
        {{-- <form action="{{ url('admin/update_news') }}" method="post" enctype="multipart/form-data">
          <div class="form-group">

            <label for="title">Title</label>
            <input type="hidden" name="id" value="{!!$title->id!!}">
            <input type="text" name="title" class="form-control" value="{!!$title->title!!}">
          </div>

          <div class="form-group">
            <label for="date">Date</label>
            <input type="text" name="date" class="form-control" value="{!!$title->date!!}">
          </div>

           <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="title" class="form-control" value="{!!$title->image!!}">
          </div>

           <div class="form-group">
            <label for="description">Short Description</label>
            <input type="text" name="description" class="form-control" value="{!!$title->description!!}">
          </div>

          <div class="form-group">
            <textarea id="summernote" name="summernote" class="form-control">
              {!! $title->content !!}
            </textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('admin/about_news')}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form> --}}
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

<script type="text/javascript">
  $('#image').change(function() {
   alert($(this).val()); 
});
</script>

@include('admin.search.news')
@endsection















{{-- 
@section('')
  
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>@yield('title')</h4>
      </div>
      <div class="panel-body">
        <form action="{{ url('update_scholarship') }}" method="post">
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