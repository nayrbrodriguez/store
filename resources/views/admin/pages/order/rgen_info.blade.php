@extends('admin.admin_template')

@section('title')
	View orders
@endsection
@section('content')


<div class="row">
    <div class="col-md-3">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">
                  {{-- <a href="{{url('add_order')}}" class="btn btn-primary ">Add Order</a> --}}
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
                        <th>List of  Customers</th>
                        

                      </tr>
                    </thead>
                    <tbody>
          @foreach($customers as $key => $gen)
                      <tr>

            @if($gen->id == $customer->id)
              <td class="table-selected"><a href="{{url('/orders',array($gen->id))}}?page={{$customers->currentPage()}}" style="color: white;">{!!$gen->name!!}</a></td>
            @else
              {{-- <td><a href="{{url('/orders', array($gen->id,$customers->currentPage()))}}" >{!!$gen->name!!}</a></td> --}}
              <td><a href="{{url('/orders',array($gen->id))}}?page={{$customers->currentPage()}}" >{!!$gen->name!!}</a></td>
            @endif
            
           
                      </tr>
                    @endforeach

                    </tbody>
                    
                  </table>
                  <p>{{$customers->links()}}</p>
                  
      </div>

    </div>
   
  </div>
    </div>
    <div class="col-md-9">

    <div class="panel-group">
    <div class="panel panel-default">
      
      <div class="panel-heading" ><h1>{!!$customer->name!!}'s Utang <span class="tip-warning pull-right" style="font-size: 19px;"><a style="color:white" href="{{url('view_customer',array($customer->id))}}?page={{$customers->currentPage()}}">To view profile</a></span></h1></div>

      <div class="panel-body">
      
      <h3></h3> 
      <h2>Add Item</h2>
    <div class="table">
    <div class="thead">
    <div class="tr">
      <div class="td_product">Product</div>
      <div class="td">Quantity</div>
      <div class="td">Date <i>(optional)</i></div>
      <div class="td">Action</div>
      
    </div>
  </div>
    <form class="tr" action="{{ url('create_order') }}" method="post">
      <input type="text" name="currentPage" value="{{$customers->currentPage()}}" hidden />
      <div class="td">
          <select name="prod_id" id="product" class="form-control">
            <option value="" selected="" disabled hidden>Select Product</option>
              @foreach($products as $prod)
              <option value="{!!$prod->id!!}" {{old('id') == $prod->id ? 'selected' : ''}}><b>{!!$prod->prod_name!!}</b> (Sale Price: {!!$prod->price_for_sale!!})</option>
              @endforeach
          </select>
      </div>

      <div class="td" hidden><input type="hidden" name="cust_id" class="form-control" value="{!!$customer->id!!}" />{!!$customer->id!!}</div>
      <div class="td"><input type="number" name="qty" class="form-control" value="{{old('qty')}}" /></div>
      <div class="td"><input type="date" name="created_at" class="form-control" value="{{old('created_at')}}" /></div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <div class="td"><input type="submit" name="send" id="send" value="ADD" class="btn btn-success" ></div>
    </form>
  </div>
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
          @if (count($orders)===0)
            <div class="tr">
              <div class="no-result">ADD Items to listing here</div>
              
            </div>
          @else
            @foreach($orders as $ord)
              <div class="tr">
                <div class="td" hidden>{!!$ord->id!!}</div>
                <div class="td">{!!$ord->prod_name!!}</div>
                <div class="td">{!!$ord->price!!}</div>
                <div class="td">{!!$ord->qty!!}</div>
                <div class="td" align="right">{{number_format($ord->total_amt, 2)}}</div>
                <div class="td">
                  @if($ord->status == 'pending')
                    Pending
                  @else
                    Paid
                  @endif
                </div>
                <div class="td">{!!date('M d, Y', strtotime($ord->created_at))!!}</div>
                <div class="td_action">
                        @if($ord->status == 'pending')
                          <a type="button" href="{{url('edit_order',array($ord->cust_id, $ord->id))}}?page={{$customers->currentPage()}}" class="btn btn-primary"><i class="fa fa-edit" style="color:white"></i></a>
                        @else
                        <a type="button" disabled style="background:#dddddd;" href="{{url('edit_order',array($ord->cust_id, $ord->id))}}?page={{$customers->currentPage()}}" class="btn btn-primary"><i class="fa fa-edit" style="color:black"></i></a>

                        @endif

                        @if($ord->status == 'pending')
                          <a onclick="return confirm(`Are you sure you want to mark this as Paid?`)" href="{{url('change_status', array($ord->cust_id, $ord->id, $customers->currentPage()))}}" type="button" class="btn btn-info"><i class="fa fa-thumbs-up"></i></a>
                        @else
                          <a onclick="return confirm(`Are you sure you want to mark this as Pending?`)" href="{{url('change_status', array($ord->cust_id, $ord->id,$customers->currentPage()))}}" type="button" class="btn btn-info"><i class="fa fa-thumbs-down" style="color: white;"></i></a>
                        @endif
                          <a onclick="return confirm(`Are you sure you want to delete {!!$ord->prod_name!!}?`)" href="{{url('delete_order',array($ord->cust_id, $ord->id, $customers->currentPage()))}}" class="btn btn-danger"><i class="fa fa-trash" style="color:white;"></i></a>
                      </div>

              </div>
            @endforeach
          @endif
          
          </div>
    <div class="tr" align="right">
      TOTAL: 
      <div class="td" style="border: none"></div>
      <div class="td" style="border: none"></div>
      <div></div>
      <div></div>
      <div><b><font size="5px">P</font>{{ number_format($total, 2) }}</b></div>
    </div>

    <br><br>

    

  <h2>Payments</h2>
    <div class="table">
    <div class="thead">
    <div class="tr">
      <div class="td">Amount</div>
      <div class="td">Date</div>
      <div class="td">Action</div>
      
    </div>
  </div>
    <form class="tr" action="{{ url('payment',array($customer->id)) }}" method="post">
      <input type="text" name="currentPage" value="{{$customers->currentPage()}}" hidden />
      

      <div class="td" hidden><input type="hidden" name="cust_id" class="form-control" value="{!!$customer->id!!}" />{!!$customer->id!!}</div>
      <div class="td"><input type="number" name="total_amount" class="form-control" value="{{old('total_amount')}}" /></div>
      <div class="td"><input type="date" name="date_of_payment" class="form-control" value="{{old('date_of_payment')}}" /></div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <div class="td"><input type="submit" name="send" id="send" value="ADD" class="btn btn-success" ></div>
    </form>
  </div>
</div>

<hr>
      <div class="table">
        <div class="thead">
          <div class="tr">

            <div class="td">Amount</div>
            <div class="td">Date of Payment</div>
            <div class="td">Actions</div>
            
          </div>
        </div>
        <div class="tbody">
          @if (count($orders)===0)
            <div class="tr">
              <div class="no-result">ADD Payments to listing here</div>
              
            </div>
          @else
            @foreach($deductionLogs as $deductionLog)
              <div class="tr">
                <div class="td" hidden>{!!$deductionLog->id!!}</div>
                <div class="td">{{number_format($deductionLog->total_amount, 2)}}</div>
               
                <div class="td">{!!date('M d, Y', strtotime($deductionLog->date_of_payment))!!}</div>
                <div class="td_action">
                         <a type="button" href="{{url('edit_orderer',array($ord->cust_id, $ord->id))}}?page={{$customers->currentPage()}}" class="btn btn-primary"><i class="fa fa-edit" style="color:white"></i></a>

                          <a onclick="return confirm(`Are you sure you want to delete {!!$ord->prod_name!!}?`)" href="{{url('delete_order',array($ord->cust_id, $ord->id, $customers->currentPage()))}}" class="btn btn-danger"><i class="fa fa-trash" style="color:white;"></i></a>
              </div>

              </div>
            @endforeach
          @endif
          
          </div>

      </div>
      
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>
@endsection