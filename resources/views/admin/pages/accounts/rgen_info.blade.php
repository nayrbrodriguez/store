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
              @if($acc->id == $account->id)
                <td class="table-striped table-selected"><a style= "color: white" href="{{url('accounts', array($acc->id))}}?page={{$accounts->currentPage()}}" >{!!$acc->account!!}</a></td>
              
              @else
              <td><a href="{{url('accounts', array($acc->id))}}?page={{$accounts->currentPage()}}" >{!!$acc->account!!}></a></td>
              @endif
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
          <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="deleteAccount()">Delete</a>
        </div>

        <div class="panel-heading">&nbsp;

        </div>
        <div class="panel-heading"></div>
        <div class="panel-body">
          <h3>{!!$account->account or "Account" !!}</h3> 
          <hr>
          {!!$account->username or "No Username"!!}
          <br>
          <div id='password'>{!!$password or ""!!}</div>

        </div>
        <div type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Show Password</div>
      </div>

    </div>


  </div>
</div>
<div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="border:#dd4245 2px solid;">
      <div class="modal-header">
        <button type="button" class="close" onclick="closebut()" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Override your action!</h4>
      </div>
      <div class="modal-body">
        <form action="url" method="post" id="myForm">
          <input type="hidden" name="id" value="{!!$account->id!!}">
          <p><input type="password" name="password" value="" class="form-control"></p>
        </div>
        <div class="modal-footer" style="border:red 2px solid">
          <input type="submit" name="send" id="send" value="Show" onclick="viewPassword()" class="btn btn-success">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="closebut()">Close</button>
        </div>
        {!! csrf_field() !!}
      </form>
    </div>

  </div>
</div>

</div>
<script>
  function viewPassword() {
    document.getElementById('myForm').action;
    document.getElementById('myForm').action = "{{url('password')}}?page={{$accounts->currentPage()}}"; 
  }

  function deleteAccount() {
    var x = document.getElementById("myForm").id;
    var x = document.getElementById("myForm").id = "deleteInfo";
    var y = document.getElementById("deleteInfo").action;
    var y = document.getElementById("deleteInfo").action = "{{url('delete_accounts',array($account->id))}}";
  }

  function closebut() {
    if(document.getElementById("myForm")){
      var x = document.getElementById("myForm").id;
      var x = document.getElementById("myForm").id = "myForm";
      var y = document.getElementById("myForm").action;
      var y = document.getElementById("myForm").action = "url";
    }

    if(document.getElementById("deleteInfo")){
      var x = document.getElementById("deleteInfo").id;
      var x = document.getElementById("deleteInfo").id = "myForm";
      var y = document.getElementById("myForm").action;
      var y = document.getElementById("myForm").action = "url";
    }

  }

</script>
@include('admin.search.accounts')
}
@endsection