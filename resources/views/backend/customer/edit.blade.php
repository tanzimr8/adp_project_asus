
@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
@include('backend.partials.navbar')
@include('backend.partials.sidebar')
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="text-uppercase card-title">Activate WEP for your device</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('wepcustomerdata.update',$wepCustomerData->id)}}" method="post" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="customerName">Name</label>
                    <input type="text" name="name" class="form-control" id="customerName" value="{{$wepCustomerData->name}}">
                  </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$wepCustomerData->email}}">
                  </div>
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter your Mobile Number" value="{{$wepCustomerData->mobile}}">
                  </div>
                  @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="model">Product Model</label>
                    <input type="text" name="model" class="form-control" id="model" placeholder="Enter your Product Model" value="{{$wepCustomerData->model}}">
                  </div>
                  @error('model')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="serial">Serial Number</label>
                    <input type="text" name="serial" class="form-control" id="serial" placeholder="Enter your Product Serial Number" value="{{$wepCustomerData->serial}}">
                  </div>
                  @error('serial')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                  <label>Retailer Name</label>
                    <select class="form-control select2" style="width: 100%;" name="retailer">
                      <option>Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                    </select>
                  </div>
                  @error('retailer')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="shop">Shop Location</label>
                    <input type="text" name="shop" class="form-control" id="shop" placeholder="Shop Location" value="{{$wepCustomerData->shop}}">
                  </div>
                  @error('shop')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <!-- date -->
                  <div class="form-group">
                    <label for="purchase_date">Date of Purchase</label>
                    <input type="date" name="purchase_date" class="form-control" id="purchase_date" placeholder="Date of Purchase" value="{{$wepCustomerData->purchase_date}}">
                  </div>
                  @error('purchase_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="invoice">Invoice Number</label>
                    <input type="text" name="invoice" class="form-control" id="invoice" placeholder="Invoice Number" value="{{$wepCustomerData->invoice}}">
                  </div>
                  @error('invoice')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Invoice</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img_invoice" class="custom-file-input" id="exampleInputFile" value="{{$wepCustomerData->img_invoice}}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  @error('img_invoice')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-check">
                    <input type="checkbox" name="accept_terms" class="form-check-input" id="exampleCheck1" checked>
                    <label class="form-check-label" for="exampleCheck1">I Have Read And Accept the <a href="#">Terms & Conditions</a></label>
                  </div>
                </div>
                @error('accept_terms')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">UPDATE INFORMATION</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
            </div>
            <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://asusbangladesh.com">ASUS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection


