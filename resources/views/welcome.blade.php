@extends('frontend.layouts.app')
@section('content')
        <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
                
            @endif
        </div> -->
        @auth
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img class="mx-5 laptop-service-img" src="{{asset('frontend/images/asus-logo-dark.png')}}" alt="ASUS DARK LOGO"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href={{route('home')}}>Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/wep/{{Auth::user()->role->slug}}/dashboard">Dashboard</a>
                    <a class="dropdown-item" href="#">Profile</a>
                    <hr>
                    <form method="POST" action="{{ route('logout') }}">@csrf <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">{{ __('LOGOUT') }}</x-dropdown-link></form>
                    </div>
                </li>
             
                </ul>
            </div>
        </nav>
        @endauth
        <div class="homepage-wrapper h-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h2 class="text-center text-uppercase py-3">Asus Accidental Damage Protection<br>(ASUS ADP)</h2>
                </div>
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h3>What is ASUS Accidental Damage Protection (ADP)?</h3>
                        </div> 
                        <div class="card-body">
                            <p class="what-is-wep-text my-4 text-justify">You can’t prevent surges, drops, and spills at work or at home, but you can recover from mishaps fast with Asus Accidental Damage Protection (ASUS ADP).<br><br>
                                Our Accidental Damage Service is a great choice at home, too. Whether your Notebook screen gets cracked in your bag or a drink is spilled on your laptop, you can count on Accidental Damage Protection to keep your device up and running. Coverage for drops, spills, power surges and broken LCD/LED screens makes it easy to get your device repaired.</p>
                        </div>
                        <div class="card-footer">
                            <a href={{route('terms')}} class="btn btn-info text-uppercase btn-custom">Terms & conditions</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    {{-- <img class="mx-5 laptop-service-img" src="{{asset('frontend/images/asus-logo-dark.png')}}" alt="ASUS DARK LOGO"> --}}
                    @auth
                    <div class="card">
                        <div class="card-header">
                        {{-- <img class="mx-5 laptop-service-img" src="{{asset('frontend/images/asus-adp.png')}}" alt="ASUS DARK LOGO"> --}}
                            <h3>How to activate ADP?</h3>
                        </div> 
                        <div class="card-body">
                            <ul>
                                <li>Step 1: Go to the address www.asusbangladesh.com/ADP  </li>
                                <li>Step 2: Sign up by filling up the form with your name, email id, laptop serial no., retailer name, location, and other necessary information.</li>
                                <li>Step 3: Set a password for your ADP account.</li>
                                <li>Step 4: Click on “Activate ADP” button</li>
                                <li>Step 5: Ask the retailer (salesperson) to contact with ASUS BD (by contacting with the given number on the screen) for ADP activation approval.</li>
                                <li>Step 6: Once your ADP activation is approved, you will get a confirmation email containing your ADP Certificate”. Download the certificate and keep a printed copy for warranty claim.  You can also download the ADP Certificate” by logging in to your account in www.asusbangladesh.com/ADP portal.</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="/wep/{{Auth::user()->role->slug}}/dashboard" class="btn btn-success text-uppercase btn-custom">Activate ADP</a>
                            {{-- <a href={{route('dashboard')}} class="btn btn-success text-uppercase btn-custom">Activate ADP</a> --}}
                            
                        </div>
                    </div>
                    @else
                    <div>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4 alert alert-danger alert-dismissible" :errors="$errors" />
                    </div>
                    <div class="card">
                        <!-- Session Status -->
                        <div class="card-header">
                            <h3 class="signup-text">Signup</h3>
                        </div>
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Your name:</label>
                                <input type="text" name="name" :value="old('name')" required autofocus class="form-control" placeholder="Enter your name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" name="email" :value="old('email')" required autofocus class="form-control" placeholder="Enter email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" :value="old('password')" required autocomplete="new-password" class="form-control" placeholder="Enter password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" name="password_confirmation" :value="old('password')" required class="form-control" placeholder="Confirm password" id="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-dark btn-custom">SIGN UP</button> 
                        </form>
                        </div>
                        <div class="card-footer">
                            <p>ALREADY A MEMBER? <a class="signup-text-link" href={{route('login')}}>SIGN IN HERE</a></p>
                        </div>
                    </div>
                    @endauth
                </div>
                </div>
            </div>      
@endsection

