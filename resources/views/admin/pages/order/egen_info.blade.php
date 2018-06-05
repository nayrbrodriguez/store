@extends('admin.admin_template')

@section('title')
  
@endsection
@section('content')


<div class="row">
    <div class="col-md-3">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">

                </div>
      <div class="panel-heading"><h3>Orders</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>List of Customers</th>
                        

                      </tr>
                    </thead>
                    <tbody>
          @foreach($customers as $key => $gen)
                      <tr>
                @if($gen->id == $customer->id)
                  <td class="table-selected"><a href="{{url('/orders', array($gen->id))}}" style="color: white;">{!!$gen->name!!}</a></td>
                @else
                  <td><a href="{{url('/orders', array($gen->id))}}" >{!!$gen->name!!}</a></td>
                @endif
            
                      </tr>
                    @endforeach
                    </tbody>
                    
                  </table>

      </div>
      {{$customers->links()}}
    </div>
   
  </div>
    </div>
    <div class="col-md-9">

    <div class="panel-group">
    <div class="panel panel-default">
    
       {{--  <div class="pull-right">
      <a href="{{url('edit_customer',array($customer->id))}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$customer->name!!}?')" href="{{url('delete_customer',array($customer->id))}}" class="btn btn-danger ">Delete</a>
      </div> --}}
      
      
      <div class="panel-heading" ><h1>{!!$customer->name!!}'s Utang <span class="tip-warning pull-right" style="font-size: 19px;"><a style="color:white" href="{{url('view_customer',array($customer->id))}}">To view profile</a></span></h1></div>
      <div class="panel-body">
      
      <h3></h3> 
      <hr>
      <div class="table">
  <div class="thead">
    <div class="tr">
      <div class="td_product">Product</div>
      <div class="td">Price</div>
      <div class="td">Quantity</div>
      <div class="td">Subtotal</div>
      <div class="td">Status</div>
      <div class="td">Date Added</div>
      <div class="td">Action</div>

    </div>
  </div>
  <div class="tbody">
    
      
      @foreach($orders as $ord)
        @if($orderID->id === $ord->id)
          
          <form class="tr" action="{{ url('update_order') }}" method="post">
            
            <div class="td_edit" hidden><input type="hidden" name="currentPage" class="form-control" value="{{$customers->currentPage()}}" /></div>
            <div class="td_edit" hidden><input type="hidden" name="cust_id" class="form-control" value="{!!$customer->id!!}" />{!!$customer->id!!}</div>
            <div class="td_edit" hidden><input type="hidden" name="id" class="form-control" value="{!!$orderID->id!!}" />{!!$orderID->id!!}</div>

            <div class="td_edit">
              <select name="prod_id" id="product" class="form-control" "> 
                
                  @foreach($products as $prod)
                  @if($prod->admin_id == Auth::user()->id)
                  <option value="{!!$prod->id!!}"  {{ $edit->prod_id == $prod->id ? 'selected': ''}}><b>{!!$prod->prod_name!!}</b></option>
                  @endif
                  @endforeach
              </select>
            </div>

            

            <div class="td_edit"><input type="number" name="price" class="form-control" value="{{$edit->price}}" /></div>
            <div class="td_edit"><input type="number" name="qty" class="form-control" value="{{$edit->qty}}" /></div>
            <div class="td" align="right">{{number_format($edit->total_amt,2)}}</div>
            <div class="td">
                @if('$edit->status' == 'pending')
                  Pending
                @else
                  Paid
                @endif
            </div>
            <div class="td">{!! date('M d, Y', strtotime($ord->created_at))!!}</div>


            <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
            <div class="td"><input type="submit" name="send" id="send" value="save" class="btn-sm btn-success" ></div>
      </form>
        @else
          <div class="tr">
            <div class="td" hidden>{!!$ord->id!!}</div>
            <div class="td">{!!$ord->prod_name!!}</div>
            <div class="td">{!!$ord->price!!}</div>
            <div class="td">{!!$ord->qty!!}</div>
            <div class="td" align="right">{{number_format($ord->total_amt, 2)}}</div>
            <div class="td">{!!$ord->status!!}</div>
            <div class="td">{!! date('M d, Y', strtotime($ord->status))!!}</div>
            <div class="td action">
              <a type="button" href="{{url('edit_order',array($ord->cust_id, $ord->id))}}" class="btn btn-primary"><i class="fa fa-edit" style="color:white"></i></a>
               <a onclick="return confirm(`Are you sure you want to delete item {!!$ord->prod_name!!} to {!!$customer->name!!}?`)" href="{{url('delete_order',array($ord->cust_id, $ord->id))}}" class="btn btn-danger"><i class="fa fa-trash" style="color:white"></i></a>  
            </div>



          </div>
        @endif
      
      @endforeach
    
    </div>
    <div align="right">
      TOTAL: <b> <font size="5px">P</font>{{ number_format($total, 2) }}</b>
    </div>
    
    
    <br><br>

    <h2>Add Item</h2>
    <div class="table" style="">
    <div class="thead">
    <div class="tr" style="">
      <div class="td_product">Product</div>
      <div class="td">Quantity</div>
      <div class="td">Action</div>
      

    </div>
  </div>
    <form class="tr" action="{{ url('create_order') }}" method="post">

      <div class="td">
          <select name="prod_id" id="product" class="form-control">
            <option value="" selected="" disabled hidden>Select Product</option>
               
                @foreach($products as $prod)
                @if($prod->admin_id == Auth::user()->id)
                <option value="{!!$prod->id!!}" {{old('id') == $prod->id ? 'selected' : ''}}><b>{!!$prod->prod_name!!}</b> (Sale Price: {!!$prod->price_for_sale!!})</option>
                @endif
                @endforeach
                
            </select>
      </div>
      <div class="td" hidden=""><input type="hidden" name="admin_id" class="form-control" value="{{Auth::user()->id}}"></div>
      <div class="td" hidden><input type="hidden" name="price" class="form-control" value="{!!$prod->price_for_sale!!}"></div>
      <div class="td" hidden><input type="hidden" name="cust_id" class="form-control" value="{!!$customer->id!!}" />{!!$customer->id!!}</div>
      <div class="td"><input type="number" name="qty" class="form-control" value="{{old('qty')}}" /></div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <div class="td"><input type="submit" name="send" id="send" value="ADD" class="btn btn-success" ></div>
    </form>
  </div>
</div>

      </div>
      
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>
 {{-- @include('admin.search.about') --}}
 {{-- <script src="{{ asset("../js/editsave.js")}}" type="text/javascript" ></script> --}}
@endsection