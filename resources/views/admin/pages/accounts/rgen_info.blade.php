@extends('admin.admin_template')

@section('title')
	View accounts
@endsection
@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">
                  <a href="{{url('add_accounts')}}" class="btn btn-primary ">Add account</a>
                </div>
      <div class="panel-heading"><h3>Accounts</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Accounts List</th>
                      </tr>
                    </thead>
                    <tbody>
          @foreach($accounts as $acc)
                      <tr>
            <td><a href="{{url('view_accounts', array($acc->id))}}" >{!!$acc->account!!}</a></td>
            
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
    
        <div class="pull-right">
      <a href="{{url('edit_accounts',array($account->id))}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$account->account!!}?')" href="{{url('delete_accounts',array($account->id))}}" class="btn btn-danger ">Delete</a>
      </div>
      
      <div class="panel-heading">&nbsp;
      
      </div>
      <div class="panel-heading"></div>
      <div class="panel-body">
      <h3>{!!$account->account or "Account" !!}</h3> 
      <hr>
      {!!$account->username or "No Username"!!}
      <br>
      <div hidden id='password'>{!!decrypt($account->password)!!}</div>

      </div>
        <button class="button btn-primary" id="hide">Hide Password</button>
        <button class="button btn-primary" id="show">Show Password</button>
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

</div>
  @include('admin.search.accounts')
@endsection