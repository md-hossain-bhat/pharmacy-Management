@extends("layouts.admin_layout.admin_layout")
@section('title','Expire Stock List')
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
                <a href="{{url('admin/purchases')}}" style="float: right;"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-list"></i> Stock List</button></a>
                <a target="_blanck" href="{{url('admin/expire-medicine-pdf')}}" style="float: right;margin-right:5px;"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Download PDF</button></a>                
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
                    <th>Expire Date</th>
                    <th>Supplier</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Genaric</th>
                    <th>Medicine</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Purchase Price</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($purchases as $key => $purchase)
           
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$purchase['purchase_no']}}</td>
                    <td>{{date('d-M-Y',strtotime($purchase['ex_date']))}}</td>
                    <td>{{$purchase['supplier']['name']}}</td>
                    <td>{{$purchase['company']['name']}}</td>
                    <td>{{$purchase['category']['name']}}</td>
                    <td>{{$purchase['brand']['brand_name']}}</td>
                    <td>{{$purchase['product']['product_name']}}</td>
                    <td>{{$purchase['buying_qty']}}-{{$purchase['product']['unit']['name']}}</td>
                    <td>{{$purchase['unit_price']}}</td>
                    <td>{{$purchase['buying_price']}}</td>
                    
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