@extends("layouts.admin_layout.admin_layout")
@section('title','Stock List')
  @section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menage Stock</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Stock</h3>
                @if(Session::get('admiDetails')['type'] == "Super Admin" || Session::get('admiDetails')['type'] == "Manager")
                <a href="{{url('admin/add-purchase')}}" style="float: right;"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Stock</button></a>
                <a href="{{url('admin/expire-medicine')}}" style="float: right; margin-right:5px;"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-pills"></i> Expire Medicine</button></a>
                <a href="{{url('admin/upcomming-stockout')}}" style="float: right; margin-right:5px;"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-pills"></i> Upcomming Expire Medicine</button></a>

                @endif
              </div>
              @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="purchases" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th width="5%">SL.</th>
                    <th>Purchase No</th>
                    <th>Purchase Date</th>
                    <th>Supplier</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Genaric</th>
                    <th>Medicine</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Purchase Price</th>
                    @if(Session::get('admiDetails')['type'] == "Super Admin" || Session::get('admiDetails')['type'] == "Manager")
                    <th>Status</th>
                    <th width="5%">Action</th>
                    @endif
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($purchases as $key => $purchase)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$purchase['purchase_no']}}</td>
                    <td>{{date('d-M-Y',strtotime($purchase['created_at']))}}</td>
                    <td>{{$purchase['supplier']['name']}}</td>
                    <td>{{$purchase['company']['name']}}</td>
                    <td>{{$purchase['category']['name']}}</td>
                    <td>{{$purchase['brand']['brand_name']}}</td>
                    <td>{{$purchase['product']['product_name']}}</td>
                    <td>{{$purchase['buying_qty']}}-{{$purchase['product']['unit']['name']}}</td>
                    <td>{{$purchase['unit_price']}}</td>
                    <td>{{$purchase['buying_price']}}</td>
                    @if(Session::get('admiDetails')['type'] == "Super Admin" || Session::get('admiDetails')['type'] == "Manager")
                    <td>
                    @if($purchase['status']==1)
                      <button class="btn btn-success btn-sm">Approved</button>
                    @else
                    <button class="btn btn-warning btn-sm">Pandding</button>
                    @endif
                    </td>
                    <td>
                    @if($purchase['status']==0)
                     <a class="confirmDelete" record="purchase" recoedid="{{$purchase['id']}}" href="javascript:void('0')"><i style="color:red;" class="fa fa-trash"></i></a>
                     @endif 
                    
                     </td>
                     @endif
                    
                  </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection