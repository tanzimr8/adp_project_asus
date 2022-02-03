
@extends('backend.layouts.app')
@push('css')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
@endpush
@section('content')
<div class="wrapper">
{{-- @include('backend.partials.navbar') --}}
 <!-- Content Wrapper. Contains page content -->

        <!-- Main content -->
        <section class="content content-certificate">
          <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
            <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title cert-title-text">{{$wepCustomerData->name}}'s WEP Certificate</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="container"></div>
                  <div class="col-12">
                    <div class="warranty-card text-center" id="warrantyCard">
                        <img src="{{asset('backend/dist/img/cert-border-3.png')}}" alt="" class="img-cert">
                        <img src="{{asset('frontend/images/asus-logo-dark.png')}}" class="mb-5" />
                        <p id="w-card-subtitle"> ASUS Accidental Damage Protection (ADP)<br> Certificate<p>
                        <p id="w-card-content">This certificate ensures 1-year Accidental Damage Protection according to ASUS ADP
                          policy for the model <span class="text-blue">{{$wepCustomerData->model}}</span>. This ADP will be activated from the date of purchase
                          according to the invoice and S/N. The replacement of the faulty or broken unit/part will
                          be at our discretion according to ASUS ADP Policy.<p>
                        <div class="d-flex justify-content-center">
                            <p class="w-card-text">S/N:<br><span class="text-blue">{{$wepCustomerData->serial}}</span></p>
                            <p class="w-card-text">ADP Case No:<br><span class="text-blue">D{{$wepCustomerData->id}}</span></p>                          
                            <p class="w-card-text">Date of purchase:<br><span class="text-blue">{{$wepCustomerData->purchase_date}}</span></p>
                        </div>
                        {{-- <h3  id="w-card-name">Name: <span>{{$warrantyHolder->name}}</span></h3>    
                        <h3 id="w-card-data">Date of Purchase: <span>{{$wepCustomerData->purchase_date}}</span></h3>    
                        <p class="w-card-text">This Certificate extends the waraanty of the Product you bought ({{$wepCustomerData->model}}) for a period of <span class="text-bold">1 Year</span> in addition with your regular warranty period. </p>  --}}
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer footer-downloadWarranty clearfix">
                <button class="btn btn-danger btn-lg" id="downloadWarranty" type="button">DOWNLOAD CARD </button>
              </div>
            </div>
            <!-- /.card -->
           
          </div>
          <!-- /.col -->
        </div>
            <!-- /.row (main row) -->
        
      </div><!-- /.container-fluid -->
    </section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="cert-wrapper">
            <h3 class="saveimg-text my-3">Right Click and save the below image as your WEP certificate</h3>
            <div id="downloadAsimage"></div>
            <!-- <a href="{{route('customer.dashboard')}}" class="text-center btn btn-info mt-2">Back to Dashboard</a> -->
          </div>
        </div>
      </div>
    </div>
</div>
<!-- ./wrapper -->
@endsection


@push('js')
<!-- html2canvas -->
<script src="{{asset('backend/dist/js/html2canvas.min.js')}}"></script>
<script>
    window.addEventListener("load",function(e){
        e.preventDefault();
        window.scrollTo(0,0);
        html2canvas(document.querySelector("#warrantyCard")).then(canvas => {
            document.querySelector("#downloadAsimage").appendChild(canvas)
        });
        // document.querySelector('#downloadWarranty').classList.add("disabled");
        document.querySelector('.content-certificate').style.display='none';
        document.querySelector('#warrantyCard').style.display='none';
        document.querySelector('.cert-title-text').style.display='none';

        
        document.querySelector('.cert-wrapper').style.display= 'flex';
        document.querySelector('.saveimg-text').style.display= 'inline-block';
  });

</script>
@endpush  

