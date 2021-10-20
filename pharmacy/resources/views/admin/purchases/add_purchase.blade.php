@extends("layouts.admin_layout.admin_layout")
@section('title','Add Stock')
  @section("content")
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Stock</h1>
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
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Stocks</h3>
            <a href="{{url('admin/purchases')}}" style="float:right;"><button class="btn btn-success btn-sm"><i class="fas fa-list"></i> Stock List</button></a>
          </div>
          <div class="card-body">

              @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

	            <div class="row">
	              <div class="col-md-3">
                  <div class="form-group">
	                    <label>Purchase Date</label>
	                    <input type="text" name="purchase_date[]" class="form-control" id="pur_datepicker" readonly placeholder="MM/DD/YYYY">
	                </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
	                    <label>MPG Date</label>
	                    <input type="text" name="date[]" class="form-control" id="datepicker" readonly placeholder="MM/DD/YYYY">
	                </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
	                    <label>Expire Date</label>
	                    <input type="text" name="ex_date[]" class="form-control" id="exdatepicker" readonly placeholder="MM/DD/YYYY">
	                </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
	                    <label>Purchase No</label>
	                    <input type="text" name="purchase_no[]" class="form-control" id="purchase_no" placeholder="purchase no">
	                </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
	                  <label>Supplier</label>
	                  <select name="supplier_id[]" id="supplier_id" class="form-control suppliers" style="width: 100%;">
	                    <option value="0">Select</option>
                      @foreach($suppliers as $supplier)
							            <option value="{{$supplier['id']}}">{{$supplier['name']}}</option>
	                    @endforeach
	                  </select>
	                </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
	                  <label>Company</label>
	                  <select name="company_id[]" id="company_id" class="form-control company" style="width: 100%;">
	                    <option value="0">Select</option>
	                  </select>
	                </div>
	              </div>
                <div class="col-md-3">
                  <div class="form-group">
	                  <label>Category</label>
	                  <select name="category_id[]" id="category_id" class="form-control category" style="width: 100%;">
	                    <option value="0">Select</option>
	                  </select>
	                </div>
	              </div>
                <div class="col-md-3">
                  <div class="form-group">
	                  <label>Genaric</label>
	                  <select name="brand_id[]" id="brand_id" class="form-control brand" style="width: 100%;">
	                    <option value="0">Select</option>
	                  </select>
	                </div>
	              </div>
                  <div class="col-md-4">
                  <div class="form-group">
	                  <label>Medicine</label>
	                  <select name="product_id[]" id="product_id" class="form-control products" style="width: 100%;">
	                    <option value="0">Select</option>
                      
	                  </select>
	                </div>
                </div>


                <div class="card-footer" style="padding-top:30px;">
	                  <button type="submit" class="btn btn-success btn-sm addeventmore"><i class="fas fa-plus"></i> Add Item</button>
	                </div>
	              <!-- /.col -->
	            </div>
            <!-- /.row -->
          </div>
          <div class="card-body">
                <form method="post" action="{{url('admin/add-purchase')}}" id="purchasesStoreForm">
                @csrf
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Pic</th>
                    <th>Unit Price</th>
                    <th>Description</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="addrow" class="addrow">

                  </tbody>
                  <tbody>
                    <tr>
                    <td colspan="4"></td>
                    <td>
                      <input type="text" name="estamited_amount" id="estamited_amount" value="0" class="form-control form-control-sm text-right estamited_amount" readonly>
                    </td>
                    <td></td>
                    </tr>
                  </tbody>
                </table>
                <div class="card-footer" style="padding-top:30px;">
	                  <button type="submit" class="btn btn-success btn-sm" id="storeButton">Stock Store</button>
	                </div>
                </form>
              </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script id="document-template" type="text/x-handlebars-template">
      <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="purchase_date[]"  value="@{{purchase_date}}">
        <input type="hidden" name="date[]"  value="@{{date}}">
        <input type="hidden" name="ex_date[]"  value="@{{ex_date}}">
        <input type="hidden" name="purchase_no[]"  value="@{{purchase_no}}">
        <input type="hidden" name="supplier_id[]"  value="@{{supplier_id}}">
        <input type="hidden" name="company_id[]"  value="@{{company_id}}">
        <input type="hidden" name="category_id[]"  value="@{{category_id}}">
        <input type="hidden" name="brand_id[]"  value="@{{brand_id}}">
       
        <td>
          <input type="hidden" name="product_id[]"  value="@{{product_id}}">
          @{{product_name}}
        </td>

        <td>
          <input type="number" min="1" name="buying_qty[]" class="form-control form-control-sm text-right buying_qty" value="1">
        </td>
        <td>
          <input type="number" min="1" name="unit_price[]" class="form-control form-control-sm text-right unit_price" value="">
        </td>

        <td>
          <input type="text" name="description[]"class="form-control form-control-sm">
        </td>
        <td>
          <input type="number" min="1" name="buying_price[]" readonly class="form-control form-control-sm text-right buying_price" value="0">
        </td>
        <td>
          <i class="fa fa-times-circle btn btn-danger removeeventmore"></i>
        </td>
      </tr>
    </script>

  @endsection
