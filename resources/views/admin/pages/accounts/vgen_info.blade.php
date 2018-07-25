@extends('admin.admin_template')

@section('title')
  accounts Content
@endsection



@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
<div class="pull-right">
                  <a href="{{url('add_accounts')}}" class="btn btn-primary ">Add account</a>
                </div>
      
      <div class="panel-heading">
      <h3>accounts</h3>
        <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body">
         <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Accounts list</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($accounts as $account)
                      <tr>
                        {{-- <td>{!!$account->title!!}</td> --}}
            <td><a href="{{url('/accounts', array($account->id))}}" id="password">
              {!!decrypt($account->password)!!}
              <br>
            </a>
              
            </td>
            {{-- <td>
              <a href="{{url('view_course_offering', array($account->id))}}" class="btn btn-primary">View</a>
              <a href="{{url('edit_course_offering',array($account->id))}}" class="btn btn-info">Edit</a>
              <a href="{{url('delete_course_offering',array($account->id))}}" class="btn btn-danger " type="button">Delete</a>
              <a onclick="return confirm('Are you sure you want to delete {!!$account->title!!}?')" href="{{url('delete_course_offering',array($account->id))}}" class="btn btn-danger ">Delete</a>
              
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

    <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
       {{--  <a href="{{url('edit_accounts',array($title->id))}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$title->title!!}?')" href="{{url('delete_course_offering',array($title->id))}}" class="btn btn-danger ">Delete</a> --}}
      </div>
      <div class="panel-heading">{{-- {!!$title->title or "Title" !!}  --}}</div>
      <div class="panel-body">{{-- {!!$title->description or "Department"!!} --}}
      Choose any Department to view, update or delete 
      <br>
      <br>
      <br>
      <br>
      <br><br>
      <br>
      <br>
      <br>
      <br><br>
      <br>
      <br>
      <br>
      <br>
      </div>
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
      $("#hide").click(function(){
          $("#password").hide();
      });
      $("#show").click(function(){
          $("#password").show();
      });
  });
</script>
 @include('admin.search.accounts')
@endsection
