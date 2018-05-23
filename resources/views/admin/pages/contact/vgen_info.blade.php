@extends('admin.admin_template')

@section('title')
  Contact List
@endsection



@section('content')
  
<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header col-md-6">
                  <h3 class="box-title">Contact Us</h3>
                </div><!-- /.box-header -->

   <div class="col-md-6">

</div>
        <div class="row"><div class="col-xs-12">
                <div class="col-xs-12">
                  {{-- <a href="{{url('admin/create_contact')}}" class="btn  btn-primary ">Add Contact</a> --}}
                </div>
                <div class="col-xs-6 pull-right">
                  <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
                </div>
                </div>
                </div>
 
                
   
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        {{-- <th>Title</th> --}}
                        <th width="30">Type</th>
                        <th width="70%">Description</th>
                        <th width="10%"><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td>{!!$gen->type!!}</td>
            <td>{!!$gen->description!!}</td>

            <td>
              {{-- <a href="{{url('view_course_offering', array($gen->id))}}" class="btn btn-primary">View</a> --}}
              <a href="{{url('admin/edit_contact',array($gen->id))}}" class="btn btn-info">Edit</a>
              {{-- <a href="{{url('delete_course_offering',array($gen->id))}}" class="btn btn-danger " type="button">Delete</a> --}}
              {{-- <a onclick="return confirm(`Are you sure you want to delete {!!$gen->type!!} {!! $gen->description !!}?`)" href="{{url('admin/delete_contact',array($gen->id))}}" class="btn btn-danger ">Delete</a> --}}
              
            </td>
                      </tr>
                    @endforeach
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                {{ $data->links() }}
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
{{-- @include('script') --}}
<script type="text/javascript">
  $('#search').on('keyup',function() {
    $value=$(this).val();
    $.ajax({
      type: 'get',
      url :'{{URL::to('admin/contact_search')}}',
      data :{'search':$value},
      success:function(data){
        $('tbody').html(data);
      }
    });
  })
</script>
@endsection
