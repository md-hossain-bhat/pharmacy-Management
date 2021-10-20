@extends("layouts.admin_layout.admin_layout")
@section('title',$title)
  @section("content")
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Genaric</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Genarics</li>
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
            <h3 class="card-title">{{ $title }}</h3>
            <a href="{{url('admin/brands')}}" style="float:right;"><button class="btn btn-success btn-sm"><i class="fas fa-list"></i> Genaric List</button></a>
          </div>
          <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif

          	<form name="brandForm" id="brandForm" @if(empty($branddata['id'])) action="{{url('admin/add-edit-brand')}}" @else   action="{{url('admin/add-edit-brand/'.$branddata['id'] )}}" @endif method="post">
          		@csrf
	            <div class="row">
	              <div class="col-md-6">
                <div class="form-group">
	                  <label>Category Name</label>
	                  <select name="category_id" id="category_id" class="form-control category" style="width: 100%;">
	                    <option value="0">Select</option>
	                     @foreach($categories as $category)
							       <option value="{{$category['id']}}" @if(!empty($branddata['category_id']) && $branddata['category_id'] == $category['id']) selected @endif>{{$category['name']}}</option>
	                    @endforeach
	                  </select>
	                </div>
	              	<div class="form-group">
	                    <label for="brand_name">Genaric Name</label>
	                    <input type="text" name="brand_name" class="form-control" id="brand_name" placeholder="Enter Genaric  Name" @if(!empty($branddata['brand_name'])) value="{{$branddata['brand_name']}}" @else value="{{ old('brand_name')}}" @endif>
	                 </div>
	                 <div class="card-footer">
                   @if(empty($branddata['id'])) 
                    <button type="submit" class="btn btn-primary">Create</button>
                    @else   
                    <button type="submit" class="btn btn-primary">Update</button>
                    @endif
	                </div>
	              </div>

	              <!-- /.col -->
	            </div>
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
