<section class="for-navbar">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{route('homepage')}}"><img src="{{asset('images/pawquote-logo.png')}}" alt="PaqQuote"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('blog')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{route('fan')}}">Fan</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a class=" get-quote orange-btn " href="{{route('getQuote')}}" type="button">Get A Quote</a>
                </form>
            </div>
        </div>
    </nav>

</section>
