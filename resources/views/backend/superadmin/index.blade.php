
@extends('backend.layouts.app')
@push('css')
@endpush
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
               <div class="col-md-12">
               <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Approved Customer ADP Data</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Mobile Number</th>
                              <th>Product Model</th>
                              <th>Serial Number</th>
                              <th>Retailer Name</th>
                              <th>Shop Address</th>
                              <th>Invoice Number</th>
                              <th>Date of Purchase</th>
                              <th>WEP Status</th>
                              <th>Profile</th>
                              <th>Customer Email</th>
                              <th>Picture of Invoice</th>
                              {{-- Make new col for delete --}}
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($WepCustomerData as $data)
                              <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->mobile}}</td>
                                <td>{{$data->model}}</td>
                                <td>{{$data->serial}}</td>
                                <td>{{$data->retailer}}</td>
                                <td>{{$data->shop}}</td>
                                <td>{{$data->invoice}}</td>
                                <td>{{$data->purchase_date}}</td>
                                <td class='{{$data->status=="Approved" ? "text-success": "text-danger"}}'>{{$data->status}}</td>
                                <td class="project-actions">
                                    <a class="btn btn-primary btn-sm" href="{{route('wepcustomerdata.show',$data->id)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                    </a>
                                </td>
                                
                                <td>{{$data->email}}</td>
                                <td><a href="{{asset('storage/'.$data->img_invoice)}}" target="_blank">View Invoice</a></td>
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




