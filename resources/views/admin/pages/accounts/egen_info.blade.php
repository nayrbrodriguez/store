@extends('admin.admin_template')

@section('title')
  {{-- Update {!!$title->title!!} --}}
@endsection
  

@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">
                  <a href="{{url('add_accounts')}}" class="btn btn-primary ">Add account</a>
                </div>
      <div class="panel-heading"><h3>accounts</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sccounts List</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($accounts as $acc)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td><a href="{{url('view_accounts', array($acc->id))}}" >{!!$acc->account!!}</a></td>
            {{-- <td>
              <a href="{{url('view_course_offering', array($acc->id))}}" class="btn btn-primary">View</a>
              <a href="{{url('edit_course_offering',array($acc->id))}}" class="btn btn-info">Edit</a>
              <a href="{{url('delete_course_offering',array($acc->id))}}" class="btn btn-danger " type="button">Delete</a>
              <a onclick="return confirm('Are you sure you want to delete {!!$acc->title!!}?')" href="{{url('delete_course_offering',array($acc->id))}}" class="btn btn-danger ">Delete</a>
              
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
        {{-- <h4>@yield('title')</h4> --}}
      </div>
      <div class="panel-body">
        <form action="{{ url('update_accounts') }}" method="put">

          <div class="form-group">
            <label for="account">Account Name</label>
            <input type="hidden" name="id" value="{!!$account->id!!}">
            <input type="text" name="account" class="form-control" value="{!!$account->account!!}">
          </div>

          <div class="form-group">
            <label for="account">Password</label>
            <input type="password" name="account" value="{!!$account->password!!}" class="form-control" id="myPassword">
            <input type="checkbox" onclick="myFunction()">Show Password
            <br><br>
          </div>
          {{-- <div class="form-group">
            <textarea id="summernote" name="summernote" class="form-control">
              {!! $account->description !!}
            </textarea>
          </div> --}}
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('view_accounts',$account->id)}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form>
      </div>
    </div>
       
        
    </div>
  </div>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myPassword");
    if (x.type === "password") {
        x.type = "text";
        x.value = "{!!decrypt($account->password)!!}";
    } 
    else{
        x.type = "password";
        x.value = "{!!$account->password!!}"
    }

}
</script>
  @include('admin.search.accounts')
@endsection