
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
            <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$wepCustomerData->name}}'s ADP Profile</h3><br>
                {{-- <p>Your unique customer code: 
                  <input type="text" value="{{$ucid}}" id="myInput">
                  <button class="btn btn-zero" id="copyMsg" onclick="myFunction()">Click to Copy</button>
                </p>
                <button onclick="makeCopy();"><i class="far fa-copy c-icon-copy"></i></button>
                <p class="text-danger" id="usethis">Use this as your 'BKash referance number' for payment </p> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <table class="table table-bordered table-sm">
                    <tbody>
                      <tr>
                        <td>Email</td>
                        <td>{{$wepCustomerData->email}}</td>
                      </tr> 
                      <tr> 
                        <td>Mobile</td>
                        <td>{{$wepCustomerData->mobile}}</td>
                      </tr>
                      <tr>
                        <td>Product Model</td>
                        <td>{{$wepCustomerData->model}}</td>
                      </tr>
                      <tr>
                        <td>Serial Number</td>
                        <td>{{$wepCustomerData->serial}}</td>
                      </tr>
                      <tr>
                        <td>Retailer Name</td>
                        <td>{{$wepCustomerData->retailer}}</td>
                      </tr>
                      <tr>
                        <td>Shop Address</td>
                        <td>{{$wepCustomerData->shop}}</td>
                      </tr>
                        <td>Date of Purchase</td>
                        <td>{{$wepCustomerData->purchase_date}}</td>
                      </tr>
                      <tr>
                        <td>Invoice Number</td>
                        <td>{{$wepCustomerData->invoice}}</td>
                      </tr>
                      <tr>
                        <td>Image of Invoice</td>
                        <td><a target="_blank" href="{{asset('storage/'.$wepCustomerData->img_invoice)}}">Download Invoice</a></td>
                      </tr>
                      <tr>
                        <td>ADP Status</td>
                        <td><span class="text-uppercase {{$wepCustomerData->status == 'Approved' ? 'text-success' : 'text-danger'}}">{{$wepCustomerData->status}}</span></td>
                      </tr>
                    </tbody>
                  </table>
                  {{-- <div class="col-3">
                    <p class="profile-title">Email</p>
                    <p class="profile-title">Mobile</p>
                    <p class="profile-title">Product Model</p>
                    <p class="profile-title">Serial Number</p>
                    <p class="profile-title">Retailer Name</p>
                    <p class="profile-title">Shop Address</p>
                    <p class="profile-title">Date of Purchase</p>
                    <p class="profile-title">Invoice Number</p>
                    <p class="profile-title">WEP Status</p>
       
                  </div>
                  <div class="col-4 pl-3">
                    <p class="profile-info">{{$wepCustomerData->email}}</p>
                    <p class="profile-info">{{$wepCustomerData->mobile}}</p>
                    <p class="profile-info">{{$wepCustomerData->model}}</p>
                    <p class="profile-info">{{$wepCustomerData->serial}}</p>
                    <p class="profile-info">{{$wepCustomerData->retailer}}</p>
                    <p class="profile-info">{{$wepCustomerData->shop}}</p>
                    <p class="profile-info">{{$wepCustomerData->purchase_date}}</p>
                    <p class="profile-info">{{$wepCustomerData->invoice}}</p>
                     --}}
                    {{-- ADD IMAGE PREVIEW --}}
                    {{-- <p class="profile-info "><span class="text-uppercase {{$wepCustomerData->status == 'Approved' ? 'text-success' : 'text-danger'}}">{{$wepCustomerData->status}}</span></p> --}}
                  </div>
                  <div class="col-5 pl-3 d-flex justify-content-center align-items-center">
                    <a href="{{asset('storage/'.$wepCustomerData->img_invoice)}}"><img src="{{asset('storage/'.$wepCustomerData->img_invoice)}}" alt="" class="img-thumbnail"></a>
                  </div>    
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                @if(Auth::user()->role->id == 1)
                  @if($wepCustomerData->status == 'Pending')
                    <button type="button" class="btn btn-success btn-sm" onclick="approveData({{$wepCustomerData->id}});">
                      APPROVE
                    </button>
                  <form id="approve-data-{{$wepCustomerData->id}}" action="{{route('wepcustomerdata.approve',$wepCustomerData->id)}}" method="post" style="display:none">
                    @csrf
                    @method('PUT')
                  </form>
                  @else
                  <button data-toggle="tooltip" title="Already Approvedx" type="button" class="btn btn-success btn-sm disabled">
                      Already Approved
                  </button>
                  @endif
                  <a class="btn btn-info btn-sm" href="{{route('wepcustomerdata.edit',$wepCustomerData->id)}}">
                    EDIT
                  </a>
                  <button class="btn btn-danger btn-sm" type="button" onclick="deleteData({{$wepCustomerData->id}});">
                    REJECT
                    </i>
                  </button>
                  <form id="delete-data-{{$wepCustomerData->id}}" action="{{route('wepcustomerdata.destroy',$wepCustomerData->id)}}" method="post" style="display:none">
                  @csrf
                  @method('DELETE')
                  </form>
                @endif
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
  function deleteData(id){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure you want to delete this WEP Data?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    event.preventDefault();
    document.getElementById('delete-data-'+id).submit();
    // swalWithBootstrapButtons.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'The Data Was not Deleted :)',
      'error'
    )
  }
})
  }
</script>

<script>
function approveData(id){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You want to Approve this WEP Data?",
  icon: 'success',
  showCancelButton: true,
  confirmButtonText: 'Yes, Approve it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    event.preventDefault();
    document.getElementById('approve-data-'+id).submit();
    // swalWithBootstrapButtons.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Not Approved',
      'The Data has not been Approved :)',
      'error'
    )
  }
})
  }
</script>
{{-- clickToCopy --}}
<script>
function myFunction(){
  let copyMsg = document.querySelector('#copyMsg');
  let copyText = document.querySelector("#myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  copyMsg.innerHTML= 'Your Unique Code is copied to clipboard';
}
</script>
@endpush  

