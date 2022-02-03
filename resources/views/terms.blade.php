@extends('frontend.layouts.app')
@section('content')
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
                @auth
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
                @endauth
                </ul>
            </div>
        </nav>
        <div class="terms-wrapper py-5" style="background:#f5f5f5;">
            <div class="container">
                <div class="terms-content p-5" style="background:#fff;">
                    <h2>Accidental Damage Protection (ADP)</h2>
                    <p>You can't prevent surges, drops, and spills at work or at home, but you can recover from mishaps fast with Asus
                        Accidental Damage Protection (ASUS ADP).<br><br>
                        Whether your device is used in a classroom, a hospital, on the road or in an office, accidents are inevitable. You’ll have
                        peace of mind knowing you can avail replacement for any accidental damage to your device. That makes it an ideal
                        option for systems that are routinely exposed to high-risk conditions, including devices like thin and lightweight
                        and those used in medical, retail, classroom, police, and military settings.<br><br>
                        
                        Our Accidental Damage Service is a great choice at home, too. Whether your Notebook screen gets cracked in your bag
                        or a drink is spilled on your laptop, you can count on Accidental Damage Protection to keep your device up and running.
                        Coverage for drops, spills, power surges and broken LCD/LED screens makes it easy to get your device repaired.
                    </p>
                    <h3>What's Covered?</h3>
                    <ul>
                        <li>Liquid spilled on or in unit</li>
                        <li>Drops, falls, and other collisions</li>
                        <li>Electrical surge</li>
                        <li>Damaged or broken LCD/LED due to a drop or fall</li>
                    </ul>
                    <h3>What's Not Covered?</h3>
                    <ul>
                        <li>Damage due to fire</li>
                        <li>Intentional damage (such as hammer marks)</li>
                        <li> Normal wear Cosmetic damage</li>
                        <li> Theft</li>
                    </ul>
                    <h3>How to Avail ADP?</h3>
                    <p>In the event that one of your covered devices is accidentally damaged, you simply contact ASUS Official service center
                        directly. After we identify the cause and extent of damage, we provide the repair services or replacement of parts needed to get your equipment back in working order.<br><br>
                        If it is determined that the loss/damage of the laptop is the result of the customer’s failure to comply with Asus's laptop security guidelines, failure of the Customer to take reasonable effort to secure the laptop, or because of the Customer's intentional act, the Customer assumes full financial responsibility.</p>
                </div>
            </div>
        </div>
@endsection

