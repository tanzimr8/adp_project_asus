
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
               <div class="col-md-12">
               <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Customer WEP Data</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Serial Number</th>
                              <th>Invoice</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($pending as $data)
                              <tr>
                                <td>{{$data->serial}}</td>
                                <td>{{$data->invoice}}</td>
                                <td class="project-actions">
                                    <a class="btn btn-primary btn-sm" href="{{route('wepcustomerdata.show',$data->id)}}">
                                        VIEW PROFILE
                                        </i>
                                    </a>
                                    {{-- <a class="btn btn-info btn-sm" href="{{route('wepcustomerdata.edit',$data->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        
                                    </a>
                                    <button class="btn btn-danger btn-sm mt-1" type="button" onclick="deleteData({{$data->id}});">
                                        <i class="fas fa-trash">
                                        </i>
                                    </button>
                                    <form id="delete-data-{{$data->id}}" action="{{route('wepcustomerdata.destroy',$data->id)}}" method="post" style="display:none">
                                      @csrf
                                      @method('DELETE')
                                    </form>

                                    <button type="button" class="btn btn-success btn-sm mt-1" onclick="approveData({{$data->id}});">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <form id="approve-data-{{$data->id}}" action="{{route('wepcustomerdata.approve',$data->id)}}" method="post" style="display:none">
                                      @csrf
                                      @method('PUT')
                                    </form> --}}
                                </td>
                               
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


@push('js')
@endpush

