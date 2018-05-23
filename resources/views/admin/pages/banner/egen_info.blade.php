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
                  <a href="{{url('admin/create_banner')}}" class="btn btn-primary ">Add Banner</a>
                </div>
      <div class="panel-heading"><h3>Banner</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Banner Title</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td><a href="{{url('admin/view_banner', array($gen->id))}}" >{!!$gen->title!!}</a></td>
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
        <form action="{{ url('admin/update_banner') }}" method="post" enctype="multipart/form-data">
          <div class="form-group">

            <label for="title">Title</label>
            <input type="hidden" name="id" value="{!!$title->id!!}">
            <input type="text" name="title" class="form-control" value="{!!$title->title!!}">
          </div>
          <div class="form-group" style="padding-bottom: 100px;">
            <label for="banner">Banner</label>

            <img src="{{ url('/uploads/banners', $title->banner)}}" style="width:100%; height: 250px; float: left;  margin-right:25px; border:1px black solid; margin-bottom: 10px">
          </div>
          <div class="form-group" >

            <input type="button"  id="loadFileXml" value="Change the Banner" class="btn btn-info" onclick="document.getElementById('banner').click();"  />

            <input type="file" id="banner" name="banner" style="display: none;" class="form-control btn btn-danger"  value="{!!$title->banner!!}">
          </div>
         
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('admin/view_banner',$title->id)}}" class="btn btn-danger">Back</a>
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
   @include('admin.search.banner')
<script type="text/javascript">
  $('#banner').change(function() {
   alert($(this).val()); 
});
</script>
@endsection








