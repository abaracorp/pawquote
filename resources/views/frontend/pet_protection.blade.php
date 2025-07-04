@extends('frontend.master')

@section('content')

    <main id="pet-protection">
        <section class="banner">
            
            <div class="hero">
                <div class="container">
                    <div class="inner">
                        <div class="heading">
                            <h1 class="f-63 c-dark l-h-85 f-w-6 freedoka">Your <span class="c-orange">Pet's
                                    Protection</span> Starts Here.</h1>
                            <p class="f-26 c-light l-h-37 f-w-4 montserrat">We've found the best insurance options for
                                your pet based on your information.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="recomented">
                    <a href="" class="active">Recommended</a>
                    <a href="" class="">Lowest Price</a>
                    <a href="" class="">Best Coverage</a>
                </div>
            </div>
        </section>
        <section class="insurance">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <span class="pet-image"><img src="{{asset('/Admin/images/pets-best.svg')}}" alt=""></span>
                            <div class="rating">
                                <span class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <h3 class="f-22 c-light f-w-5 montserrat">4.5/5</h3>
                            </div>
                            <div class="plan-details">
                                <h3 class="f-20 c-dark f-w-5 freedoka">Affordable Plan to Fit Your Budget</h3>
                                <ul>
                                    <li class="f-18 c-light f-w-4 freedoka"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12.0008L10.243 16.2438L18.727 7.75781" stroke="#03CF1B"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        10% Discount For Multi-Pet
                                    </li>
                                    <li class="f-18 c-light f-w-4 freedoka"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12.0008L10.243 16.2438L18.727 7.75781" stroke="#03CF1B"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Money Back Guarantee For 30 Days
                                    </li>
                                </ul>
                            </div>
                            <button class="view-plan bg-orange f-w-5 montserrat br-10"> <a href="{{route('paymentPlan')}}">View Plan</a></button>
                            <div class="batch f-18 c-dark f-w-6 montserrat">1</div>
                        </div>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="card">
                            <span class="pet-image"><img src="{{asset('/Admin/images/lemonade2.svg')}}" alt=""></span>
                            <div class="rating">
                                <span class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </span>
                                <h3 class="f-22 c-light f-w-5 montserrat">4.3/5</h3>
                            </div>
                            <div class="plan-details">
                                <h3 class="f-20 c-dark f-w-5 freedoka">Top-Rated Pet Insurance Plan </h3>
                                <ul>
                                    <li class="f-18 c-light f-w-4 freedoka"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12.0008L10.243 16.2438L18.727 7.75781" stroke="#03CF1B"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        No Maximum Annual or Lifetime Payouts
                                    </li>
                                    <li class="f-18 c-light f-w-4 freedoka"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12.0008L10.243 16.2438L18.727 7.75781" stroke="#03CF1B"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Use any Licensed Veterinarian in the U.S. or Canada
                                    </li>
                                </ul>
                            </div>
                            <button class="view-plan bg-orange f-w-5 montserrat br-10">View Plan </button>
                            <div class="batch f-18 c-dark f-w-6 montserrat">2</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <span class="pet-image"><img src="{{asset('images/pawprotect.png')}}" alt=""></span>
                            <div class="rating">
                                <span class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </span>
                                <h3 class="f-22 c-light f-w-5 montserrat">4.1/5</h3>
                            </div>
                            <div class="plan-details">
                                <h3 class="f-20 c-dark f-w-5 freedoka">Flexible Plans </h3>
                                <ul>
                                    <li class="f-18 c-light f-w-4 freedoka"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12.0008L10.243 16.2438L18.727 7.75781" stroke="#03CF1B"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Get 5% Multi Pet-Discount
                                    </li>
                                    <li class="f-18 c-light f-w-4 freedoka"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12.0008L10.243 16.2438L18.727 7.75781" stroke="#03CF1B"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Reduce Vet Expenses By Up To 90%
                                    </li>
                                </ul>
                            </div>
                            <button class="view-plan bg-orange f-w-5 montserrat br-10">View Plan </button>
                            <div class="batch f-18 c-dark f-w-6 montserrat">3</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <span class="pet-image"><img src="{{asset('/Admin/images/embrace.svg')}}" alt=""></span>
                            <div class="rating">
                                <span class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </span>
                                <h3 class="f-22 c-light f-w-5 montserrat">4.1/5</h3>
                            </div>
                            <div class="plan-details">
                                <h3 class="f-20 c-dark f-w-5 freedoka">Customize Your Price To Fit Tour Budget </h3>
                                <ul>
                                    <li class="f-18 c-light f-w-4 freedoka"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12.0008L10.243 16.2438L18.727 7.75781" stroke="#03CF1B"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Get 5% Multi Pet-Discount
                                    </li>
                                    <li class="f-18 c-light f-w-4 freedoka"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12.0008L10.243 16.2438L18.727 7.75781" stroke="#03CF1B"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Reduce Vet Expenses By Up To 90%
                                    </li>
                                </ul>
                            </div>
                            <button class="view-plan bg-orange f-w-5 montserrat br-10">View Plan </button>
                            <div class="batch f-18 c-dark f-w-6 montserrat">4</div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        
    </main>

    @push('scripts')

    <script>
    // Prevent going back to /quote by replacing history
    history.replaceState(null, '', location.href); // current page becomes "first"

    // Push a dummy state so user can "go back"
    history.pushState({ isRedirect: true }, '');

    console.log('eventevent');

    // Listen for back button
    window.addEventListener('popstate', function (event) {

        console.log(event,'eventevent');
        

        if (event.state && event.state.isRedirect) {
            // User pressed back → redirect to home
            window.location.href = '/';
        }
    });
</script>
        
    @endpush

@endsection
