@extends("layouts.admin_layout.admin_layout")
@section('title','Product Expire Date List')
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
                <h3 class="card-title">Stocks</h3>
                <a href="{{url('admin/expire-date-pdf')}}" target="_black" style="float: right;"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Download Pdf</button></a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="stocks" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">Id</th>
                    <th>Supplier</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Genaric</th>
                    <th>Medicine</th>
                    <th>Expire Date</th>
                    <th>Stock</th>
                    <th>Strength</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($products as $key => $exProduct)
                   <tr>
                   <td>{{$key+1}}</td>
                    <td>{{$exProduct['supplier']['name']}}</td>
                    <td>{{$exProduct['company']['name']}}</td>
                    <td>{{$exProduct['category']['name']}}</td>
                    <td>{{$exProduct['brand']['brand_name']}}</td>
                    <td>{{$exProduct['product']['product_name']}}</td>
                    <td>{{date('d-M-Y',strtotime($exProduct['ex_date']))}}</td>
                    <td>{{$exProduct['product']['quantity']}}</td>
                    <td>{{$exProduct['product']['unit']['name']}}</td>
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