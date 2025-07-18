<header class="header">
    <div class="header-wrapper">
        <div class="leftside">
            @if (!Route::is('admin.dashboard'))
            <button onclick="history.back()" class="back f-18 c-dark f-w-5 freedoka"><svg width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.0002 11.0001V13.0001H8.00016L13.5002 18.5001L12.0802 19.9201L4.16016 12.0001L12.0802 4.08008L13.5002 5.50008L8.00016 11.0001H20.0002Z"
                        fill="black" />
                </svg>Back
            </button>
            @endif
        </div>
        <div class="rightside">
            <div class="profile">
                <span><img src="{{$user->image_url ? $user->image_url : asset('images/default-profile.png')}}" alt=""></span>
                <div class="content">
                    <h2 class="f-20 c-dark f-w-5 freedoka">{{$user->name ?? 'Admin'}}</h2>
                    <p class="f-12 c-light f-w-4 montserrat">{{$user->email ?? 'admin@gmail.com'}}</p>
                </div>
            </div>
        </div>
    </div>
</header>
