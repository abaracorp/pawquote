<section class="for-navbar">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{route('frontend.homepage')}}"><img src="{{asset('images/pawquote-logo.png')}}" alt="PaqQuote"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute(['frontend.homepage']) }}" aria-current="page" href="{{route('frontend.homepage')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute(['about']) }}" aria-current="page" href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute(['frontend.blog']) }}" aria-current="page" href="{{route('frontend.blog')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute(['frontend.fan']) }}" aria-current="page" href="{{route('frontend.fan')}}">Fan</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a class=" get-quote orange-btn {{ isActiveRoute(['getQuote']) }}" href="{{route('getQuote')}}" type="button">Get A Quote</a>
                </form>
            </div>
        </div>
    </nav>

</section>
