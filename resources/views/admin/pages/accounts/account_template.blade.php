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
          <h3>Accounts</h3>
          <div class="form-group">
            <form action="{{ url('accounts') }}" method="get">
            <input class="form-control" name="account" type="text" id="search" placeholder="Search"></input>
            <input type="submit" id="send" value="Search" class="btn btn-success" style="">
          </div>
        </div>
        <div class="panel-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Accounts list</th>
              </tr>
            </thead>
            <tbody>
              @foreach($accounts as $account)
              <tr>
                <td><a href="{{url('/accounts', array($account->id))}}" id="password">
                  {!!$account->account!!}
                  <br>
                </a>

              </td>

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
      </div>
      <div class="panel-heading"></div>
      <div class="panel-body">
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
