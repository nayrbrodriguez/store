@extends('admin.admin_template')

@section('css')
<style type="text/css">
.imageWrapper {
    position: relative;
    width: 150px;
    float: left;
    height: 150px;
    padding-right: 100px;
    margin-right:25px; 

    /*border-radius: 50%; */
}
.imageWrapper img {
    display: block;
    width:150px;
    border: 1px solid black;
    height: 150px; 
    float: left; 
}
.imageWrapper .cornerLink {
    opacity: 0;
    position: absolute;
    bottom: 0px;
    left: 0px;
    right: 0px;
    padding: 2px 0px;
    color: #ffffff;
    background: #000000;
    text-decoration: none;
    text-align: center;
    -webkit-transition: opacity 500ms;
    -moz-transition: opacity 500ms;
    -o-transition: opacity 500ms;
    transition: opacity 500ms;

    
}
.imageWrapper:hover .cornerLink {
    opacity: 0.8;
}
    </style>
@endsection

@section('content')
   <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
              <div class="box-tools pull-right">
               
              </div>
            </div>


            <div class="box-body">
             
              <div class="imageWrapper">
                <img src="{{ url('/uploads/avatars', $user->avatar) }}" style="">
                <button class="cornerLink" data-toggle="modal" data-target="#myModal">Change Photo</button>
              </div>
              
                <h2>{{ $user->name }}</h2> 
                <p>{{ $user->email }}</p>
                <a href="{{-- {{ url('admin/reset', Auth::user()->id)}} --}}" data-toggle="modal" data-target="#PassModal" class="btn btn-primary"> Change Password </a>

            </div><!-- /.box-body -->
            
            <div class="box-footer">
              
            </div>
          </div><!-- /.box -->

          {{-- modal --}}
           <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Profile Picture</h4>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" action="{{ url('admin/profile') }}" method="POST">
            <div class="imageWrapper">
              <img src="{{ url('/uploads/avatars', $user->avatar) }}" style="">

              {{-- <a href="http://google.com" class="cornerLink">Link</a>  --}}
                <input type="button"  id="loadFileXml" value="Change the Banner" class="cornerLink" onclick="document.getElementById('profile').click();"  />               
            </div>
            

                <input type="file" id="profile" name="avatar">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

        </div>
        <div class="modal-footer">
          <input type="submit" class="pull-right btn btn-sm btn-primary">
          </form>
        </div>
      </div>
      
    </div>
  </div>
{{-- end modal for avatar --}}

{{-- start modal for password --}}
  <div class="modal fade" id="PassModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body">
             <form action="{{ url('admin/reset') }}" method="post">

              <div class="form-group">

                <label for="name">Name</label>
                <input type="hidden" name="id" value="{!!$user->id!!}">
                <input type="text" name="name" disabled="" class="form-control" value="{!!$user->name!!}">
              </div>

              <div class="form-group">

                <label for="email">Email</label>
                <input type="text" name="email" disabled="" class="form-control" value="{!!$user->email!!}">
              </div>

              <div class="form-group">

                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" >
              </div>

              <div class="form-group">

                <label for="password">Confirm Password</label>
                <input type="password" name="conf_password" class="form-control" >
              </div>

              

              
              <div class="form-group">
                
                {!! csrf_field() !!}

              </div>
            

        </div>
        <div class="modal-footer">
          <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
          </form>
        </div>
      </div>
      
    </div>
  </div>
{{-- end modal for password --}}

<script type="text/javascript">
  $('#profile').change(function() {
   alert($(this).val()); 
});
</script>
@endsection