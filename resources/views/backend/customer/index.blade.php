
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
              <div class="col-lg-12">
                <!-- small box -->
                <div class="small-box {{$user->date_of_approval== false ?'bg-danger' : 'bg-success' }}">
                  <div class="inner text-center">
                    <h3>{{$user->wep_status}}</h3>
                    <p>Your ADP Status</p>
                  </div>
                  <div class="icon">
                    <i class=" {{$user->date_of_approval== false ?'far fa-pause-circle' : 'fas fa-check' }} "></i>
                  </div>
                  <a href="{{$user->date_of_approval== true ? route('wepcustomerdata.show',$user->wepcustomer->id) : '#' }}" class="small-box-footer">{{$user->wep_status== 'None' ? 'Apply Below' : 'View Profile'}} <i class="{{$user->date_of_approval== true ? 'fas fa-arrow-circle-right' : 'fas fa-arrow-circle-down' }}"></i></a>
                </div>
              </div>
              <!-- ./col -->
                <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            @if($user->wep_status == 'None') 
            <div class="card card-success">
              <div class="card-header">
                <h3 class="text-uppercase card-title">Activate ADP for your device</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('wepcustomerdata.store')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="customerName">Name</label>
                    <input type="text" name="name" class="form-control" id="customerName" value="{{Auth::user()->name}}">
                  </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->email}}">
                  </div>
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="mobile">Mobile Number (Must be atleast 11 Digit)</label>
                    <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter your 11 Digit Mobile Number" value="{{old('mobile')}}">
                  </div>
                  @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="model">Product Model</label>
                    <input type="text" name="model" class="form-control" id="model" placeholder="Enter your Product Model" value="{{old('model')}}">
                  </div>
                  @error('model')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="serial">Serial Number (Must be 15 Digit) <span style="font-size:13px;font-weight:400"><a href="https://www.asus.com/us/support/article/566/" target="_blank">How to find serial number?</a></span></label>
                    <input type="text" name="serial" class="form-control" id="serial" placeholder="Enter your 15 digit Product Serial Number" value="{{old('serial')}}">
                  </div>
                  @error('serial')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Region</label>
                      <select class="form-control select2" style="width: 100%;" name="region" id="select_region" onchange="selectRetailerName()">
                        <option disabled selected>Select Region</option>
                        <option>Dhaka</option>
                        <option>Barisal</option>
                        <option>Chattogram</option>
                        <option>Khulna</option>
                        <option>Mymensing</option>
                        <option>Rajshahi</option>
                        <option>Rangpur</option>
                        <option>Sylhet</option>
                      </select>
                  </div>
                  <div class="form-group" id="retailer_div">
                  <label>Retailer Name</label>
                    <select class="form-control select2" id="retailer" style="width: 100%;" name="retailer" id="retailer">
                    </select>
                  </div>
                  @error('retailer')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="shop">Shop Address</label>
                    <input type="text" name="shop" class="form-control" id="shop" placeholder="Shop Address" value="{{old('shop')}}">
                  </div>
                  @error('shop')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <!-- date -->
                  <div class="form-group">
                    <label for="purchase_date">Date of Purchase</label> 
                    <input type='text' name="purchase_date" class="form-control" id='datepicker' placeholder='Select Date' >
                  </div>
                  @error('purchase_date') 
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="invoice">Invoice Number</label>
                    <input type="text" name="invoice" class="form-control" id="invoice" placeholder="Invoice Number" value="{{old('invoice')}}">
                  </div>
                  @error('invoice')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Invoice <span style="font-size:13px;font-weight:400">(Acceptable format: JPG, JPEG,PNG, PDF | Maximum Size 5MB)</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img_invoice" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      {{-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> --}}
                    </div>
                  </div>
                  @error('img_invoice')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-check">
                    <input type="checkbox" name="accept_terms" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I Have Read And Accept the <a href="#">Terms & Conditions</a></label>
                  </div>
                </div>
                @error('accept_terms')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">APPLY FOR ADP ACTIVATION</button>
                </div>
              </form>
            </div>
            
            @elseif($user->wep_status == 'Pending for Approval')
            <div class="card card-info">
              <div class="card-header">
                <h3 class="text-uppercase card-title">Your ADP STATUS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p>Your ADP application is pending for approval.
                <p>Your application will be approved within next 24 hours. You will be notified and can download the ADP certificate when it is approved.</p> 
              </div>
              <div class="card-footer">
                  <h3 class="card-title"><a style="z-index: 100;" href="tel:0167122212">Call us</a> if your application is pending for too long.</h3><br>
                  <a href="{{route('wepcustomerdata.show',$user->wepcustomer->id)}}" class="mt-2 right btn btn-info">VIEW YOUR PROFILE</a>
              </div>
            </div>
                @else
                <canvas id="my-canvas"></canvas>
                <div class="card card-success">
              <div class="card-header">
                <h3 class="text-uppercase card-title">Your ADP STATUS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p> <span class="text-red">CONGRATULATIONS!</span> Your ADP Application has been Approved!</P>
                {{-- <p>You have 1 year additional Waranty Extension with your regular Waranty </p>  --}}
                <a target="_blank" style="z-index: 100;" href="{{route('wepcustomerdata.getcard',$user->wepCustomerData_id)}}" class="mt-2 right btn btn-success">DOWNLOAD YOUR EXTENDED WARRANTY CARD</a>
              </div>
              <div class="card-footer">
                  <h3 class="card-title"> You have 1 year additional Waranty Extension with your regular Waranty</h3><br>
                  
                  <a style="z-index: 101;" href="{{route('wepcustomerdata.show',$user->wepCustomerData_id)}}" class="mt-2 right btn btn-primary">VIEW YOUR PROFILE</a>
                  
              </div>
            </div>
                @endif
            <!-- /.card -->
          </div>
          <div class="col-md-5">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-dark">
              <span class="info-box-icon"><i class="fas fa-calendar-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">DATE OF ACTIVATION</span>
                <span class="info-box-number">
                  @if($user->date_of_approval)
                  {{$user->date_of_approval}}
                  @else
                  Not available yet
                  @endif
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-dark">
              <span class="info-box-icon"><i class="fas fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">DURATION</span> 
                {{-- countdown/days/DOP+1094days --}}
                <span class="info-box-number">@if($user->date_of_approval)
                  1 Year
                  @else
                  Not available yet
                  @endif</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-dark">
              <span class="info-box-icon"><i class="fas fa-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Add Product <span class="text-warning">(Not Available at this moment)</span>
                <span class="info-box-number">Add a new Device</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!--/.col (left) -->
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
</div>
<!-- ./wrapper -->
@endsection


@push('js')
<script>
// retailer_div
document.querySelector('#retailer_div').style.display = 'none';

function selectRetailerName(){
  DhakaRetailers = ['ASUS Exclusive Shop (AES)','Ryans IT Ltd (IDB)','Star Tech & Engineering Ltd','Netstar Pvt. Ltd','ONESTOP SERVICE & SOLUTION','COMPUTER SOURCE LTD','COMPUTER VILLAGE (IDB)','COMPUTER VILLAGE (Elephent Road)','DOLPHIN COMPUTER','BUSINESS LINK','RS Computers System','Technology Park','Daffodil Computers Ltd','Computer Archives IT Service & Solution','SMART VIEW COMPUTERS & ELECTRONICS','COMTRADE','TECHNO PALACE','TCS COMPUTER SERVICES LTD','TECHLAND','SOFTECH SYSTEMS & NETWORKS','CDS IT LTD','INFORMATICS LTD','Techno Care Computers Ltd','R-one Computers','THREE STAR TRADING','SYS COMPUTER','Fastrack Solutions','Laptop care and Technology','BASIC TECHNOLOGIES','CREATUS COMPUTER','MASTER IT SOLUTION','THREE STAR COMPUTER','ORANGE COMPUTER','MASHNOONS COMPUTER','ELECTRONIC CONCEPT','INSPIRE COMPUTER & TECHNOLOGY','BEACON COMPUTER DOT COM','Tech Republic','COMPUTER LAND','LYCEUM COMPUTERS','Navigation Service Solution','Ryans_Banani','Ryans_Uttara','Ryans_Elephant Road','Ryans_Shantinagar','Star Tech & Engineering Ltd. Pragati Sharani Branch','Star Tech & Engineering Ltd. Gazipur Branch','Star Tech & Engineering Ltd. Multiplan Branch','Star Tech & Engineering Ltd. IDB Branch','Star Tech & Engineering Ltd. Uttara Branch','Star Tech & Engineering Ltd. Multiplan Branch - 2','Navigation Service Solution','Fastrack Solution','ONE STOP Service @Solution','DOLPHIN COMPUTER LTD','RS Computer System','Daffodil Computer','COMTRADE','TCS COMPUTER SERVICE LTD','CDS IT','NETSTAR','Eastern IT','Sys Computer Ltd','NS Computer & Engineering','Four Star IT','National Computer','MONARCH IT LIMITED','INDEX IT LIMITED','NEXUS'];
  BarisalRetailers = ['Ark Computer Systems','RYANS IT LTD(BARISAL)','Apple computer System','FAMOUS COMPUTER','Unique Computer','Nexus Computer','Computer Expert','Smart Computer','TechSmart'];
  ChattogramRetailers = ['Computer Village_AGB','Ryans IT Ltd (Chattogram)','COMPUTER VILLAGE (Chattogram)','JANANI COMPUTERS','Hossain Electronics & Computer','Nano Compute','IT PALACE','POWER LINE COMPUTER','Ananda Computers','Pc Point Computers','CREATIVE COMPUTER','Nyta Computer & Technologies','Global Touch','Success Computers','Aditya Multimedia','COMPUTER LAND','Dynamic Computers & Technology','Royal Computer','G TECH-FENI Retail Store','Ryans_CTG_Agrabad','Computer Village_GEC','Janani Computers_Agrabad','Janani Computers_GEC','Star Tech & Engineering Ltd','Hossain Electronics & Computer','IT Palace','GLOBL COMPUTER BD.'	,'TECHNOLOGY TODAY','IMAGINE COMPUTER','G Tech','Ananda Computers','Jahan Computer'	,'Comuter Care Technology','IT Village','PC Net Computers']	;
  CumillaRetailers = ['Hossain Electronics & Computer','JAHAN COMPUTER'];
  KhulnaRetailers = ['M.A Computer','Arpanet-jSR','Ashu Computer-Jsr','Power Point Computer','Satkhira Net Service','Trust Computer'];
  MymensingRetailers = ['Kona Computer','SUCCESS COMPUTER & ENGINEERS','PALASH COMPUTERS','Ryans_MYMENSINGH','REGENCY TECHNOLOGIES (BD)'];
  RajshahiRetailers = ['RYANS IT LIMITED (BOGRA)','RYANS IT LIMITED (Rajshahi)','KHAN COMPUTERS','JAZZ TECH COMPUTER','Imagine Computer & Solution','Tasnuva Computer','COBITE COMPUTER','CELL COMPUTER-Rajshahi','PIXELS PVT. LTD','NEW COMDEX SYSTEM SOLUTION','Rony Electronics & Computer','SR LAPTOP SHOWROOM','Laptop City-Rajshahi','Blueridge Technologies','COMPUTER FAIR','PIXELS PVT. LTD-Rajshahi','Laptop City-Rajshahi','Jazz Tech Computer','Cobite Computer','CELL COMPUTER','Imagine Computer & Solution','Takeplus Computers','WAVE TEK-BOGRA','SH Computer - Bogra','LYCEUM COMPUTERS-Rajshahi','Digicom Technologies - Pabna'];
  RangpurRetailers = ['Solmons Computer Sales & Service','RYANS IT LIMITED (Rangpur)','SILICON COMPUTERS','SEEGATE TECHNOLOGY','SOLMONS COMPUTER','Star Tech & Engineering Ltd. Rangpur Branch','SEEGATE TECHNOLOGY-RANGPUR','Silicon Computer','Trust Computer-Rangpur'];
  SylhetRetailers = ['HIFI COMPUTER - SYLHET','CHIEF TECHNOLOGY-SYLHET','CHIEF TECHNOLOGY','HIFI COMPUTER','SKY LINK COMPUTERS','HI TECH COMPUTER-SYLHET','GENIUS TECHNOLOGY','PERFECT COMPUTER','MILLENIUM COMPUTER','Chief Technology','Unique computer','HI TECH COMPUTER-SYLHET'];
  document.querySelector('#retailer_div').style.display = 'block';
  
  let selectedRegion = document.querySelector('#select_region').value;
  
  // #retailer
  let retailer = document.querySelector('#retailer');
  

  if(selectedRegion === 'Dhaka'){
      removeOldOptions();
      for(let i=0;i<DhakaRetailers.length;i++){
        opt = document.createElement("option");
        opt.textContent = DhakaRetailers[i];
        retailer.appendChild(opt);  
      }
  }
  if(selectedRegion === 'Barisal'){
      removeOldOptions();
      for(let i=0;i<BarisalRetailers.length;i++){
        opt = document.createElement("option");
        opt.textContent = BarisalRetailers[i];
        retailer.appendChild(opt);  
      }
  }
  if(selectedRegion === 'Chattogram'){
      removeOldOptions();
      for(let i=0;i<ChattogramRetailers.length;i++){
        opt = document.createElement("option");
        opt.textContent = ChattogramRetailers[i];
        retailer.appendChild(opt);  
      }
  }
  if(selectedRegion === 'Khulna'){
      removeOldOptions();
      for(let i=0;i<KhulnaRetailers.length;i++){
        opt = document.createElement("option");
        opt.textContent = KhulnaRetailers[i];
        retailer.appendChild(opt);  
      }
  }
  if(selectedRegion === 'Mymensing'){
      removeOldOptions();
      for(let i=0;i<MymensingRetailers.length;i++){
        opt = document.createElement("option");
        opt.textContent = MymensingRetailers[i];
        retailer.appendChild(opt);  
      }
  }
  if(selectedRegion === 'Rajshahi'){
      removeOldOptions();
      for(let i=0;i<RajshahiRetailers.length;i++){
        opt = document.createElement("option");
        opt.textContent = RajshahiRetailers[i];
        retailer.appendChild(opt);  
      }
  }
  if(selectedRegion === 'Rangpur'){
      removeOldOptions();
      for(let i=0;i<RangpurRetailers.length;i++){
        opt = document.createElement("option");
        opt.textContent = RangpurRetailers[i];
        retailer.appendChild(opt);  
      }
  }
  if(selectedRegion === 'Sylhet'){
      removeOldOptions();
      for(let i=0;i<SylhetRetailers.length;i++){
        opt = document.createElement("option");
        opt.textContent = SylhetRetailers [i];
        retailer.appendChild(opt);  
      }
  }

  function removeOldOptions(){
    var options = document.querySelectorAll('#retailer option');
    options.forEach(o => o.remove());
  }
}
</script>
<script type="text/javascript">
  var d = new Date();
  d.setMonth(d.getMonth() - 1);
  console.log(d.toLocaleDateString());
  $(document).ready(function(){
    $('#datepicker').datepicker({
      format: "yyyy-mm-dd",
      startDate: d,
      endDate: new Date()
    });
  });
  </script>
  <!-- Confetti -->
<script src="{{asset('backend/dist/js/confetti.min.js')}}"></script>
<script>
  var confettiSettings = {
     target: 'my-canvas',
     max:80
     };
  var confetti = new ConfettiGenerator(confettiSettings);
  confetti.render();
</script>
@endpush