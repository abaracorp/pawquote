@extends('frontend.master')
@section('title', 'Blog Listing')
@section('content')
    <main id="blog">
        @if ($blogs->isNotEmpty())
            <section class="how-work">
                <div class="container">
                    <div class="top-title">
                         Blog</div>
                    <div class="heading t-center">
                        <h1 class="f-56 c-dark l-h-72 f-w-5 freedoka mb-0  ">Featured <span class="c-orange">Article</span>
                            </h1>
                        <p class="c-light f-26 l-h-37 f-w-4 montserrat mb-0">Real Blog</p>
                    </div>
                    <div class="card-container">
                        
                        
                        
                        <div class="row">
                           @if($blogs->isNotEmpty())

                        @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card b-blue br-18 overflow-hidden">
                                <div class="top-image">
                                    <img src="{{$blog->image_url}}" alt="Image" class="w-100">
                                </div>
                                <div class="card-body ">
                                    <div class="heading">
                                        <h2 class="f-22 c-dark l-h-27 f-w-5 freedoka ">{{$blog->title}}</h2>
                                    </div>
                                    <ul class="details">
                                        {{-- <li>
                                            <a href=""
                                                class="c-light f-14 f-w-5 montserrat d-flex align-items-baseline gap-2 "><svg
                                                    width="14" height="15" viewBox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_4_1489)">
                                                        <path
                                                            d="M7 5.88802C7.26812 5.88802 7.53361 5.83521 7.78131 5.73261C8.02902 5.63 8.25409 5.47962 8.44368 5.29003C8.63326 5.10044 8.78365 4.87537 8.88625 4.62767C8.98886 4.37996 9.04167 4.11447 9.04167 3.84635C9.04167 3.57824 8.98886 3.31275 8.88625 3.06504C8.78365 2.81734 8.63326 2.59226 8.44368 2.40268C8.25409 2.21309 8.02902 2.0627 7.78131 1.9601C7.53361 1.8575 7.26812 1.80469 7 1.80469C6.45852 1.80469 5.93921 2.01979 5.55632 2.40268C5.17344 2.78556 4.95833 3.30487 4.95833 3.84635C4.95833 4.38784 5.17344 4.90714 5.55632 5.29003C5.93921 5.67292 6.45852 5.88802 7 5.88802ZM1.75 11.9547V12.3047H12.25V11.9547C12.25 10.648 12.25 9.99469 11.9957 9.49535C11.772 9.05633 11.415 8.69939 10.976 8.47569C10.4767 8.22135 9.82333 8.22135 8.51667 8.22135H5.48333C4.17667 8.22135 3.52333 8.22135 3.024 8.47569C2.58497 8.69939 2.22803 9.05633 2.00433 9.49535C1.75 9.99469 1.75 10.648 1.75 11.9547Z"
                                                            stroke="#566369" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_4_1489">
                                                            <rect width="14" height="14" fill="white"
                                                                transform="translate(0 0.130859)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                Admin
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="" class="c-light f-14 f-w-5 d-flex align-items-center gap-1"><svg
                                                    width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.08398 6.41699H5.25065V7.58366H4.08398V6.41699ZM4.08398 8.75033H5.25065V9.91699H4.08398V8.75033ZM6.41732 6.41699H7.58398V7.58366H6.41732V6.41699ZM6.41732 8.75033H7.58398V9.91699H6.41732V8.75033ZM8.75065 6.41699H9.91732V7.58366H8.75065V6.41699ZM8.75065 8.75033H9.91732V9.91699H8.75065V8.75033Z"
                                                        fill="#566369" />
                                                    <path
                                                        d="M2.91667 12.8337H11.0833C11.7267 12.8337 12.25 12.3104 12.25 11.667V3.50033C12.25 2.85691 11.7267 2.33366 11.0833 2.33366H9.91667V1.16699H8.75V2.33366H5.25V1.16699H4.08333V2.33366H2.91667C2.27325 2.33366 1.75 2.85691 1.75 3.50033V11.667C1.75 12.3104 2.27325 12.8337 2.91667 12.8337ZM11.0833 4.66699L11.0839 11.667H2.91667V4.66699H11.0833Z"
                                                        fill="#566369" />
                                                </svg>


                                                {{optional($blog->created_at)->format('m-d-Y') ?? ''}}
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="bottom-link d-flex justify-content-between align-items-center">
                                        <span class="c-light f-14 f-w-5 montserrat">{{ Str::readTime($blog->content) }}
                                            min read</span>
                                        <a href="{{route('frontend.blogDeatil',['slug' => $blog->slug])}}"
                                            class="c-dark f-14 f-w-6 montserrat d-flex align-items-center gap-2">Read
                                            full Article<svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.6895 11.75H3.75C3.55109 11.75 3.36032 11.829 3.21967 11.9696C3.07902 12.1103 3 12.3011 3 12.5C3 12.6989 3.07902 12.8896 3.21967 13.0303C3.36032 13.171 3.55109 13.25 3.75 13.25H17.6895L12.219 18.719C12.0782 18.8598 11.9991 19.0508 11.9991 19.25C11.9991 19.4491 12.0782 19.6401 12.219 19.781C12.3598 19.9218 12.5508 20.0009 12.75 20.0009C12.9492 20.0009 13.1402 19.9218 13.281 19.781L20.031 13.031C20.1008 12.9613 20.1563 12.8785 20.1941 12.7874C20.2319 12.6963 20.2513 12.5986 20.2513 12.5C20.2513 12.4013 20.2319 12.3036 20.1941 12.2125C20.1563 12.1214 20.1008 12.0386 20.031 11.969L13.281 5.21897C13.1402 5.07814 12.9492 4.99902 12.75 4.99902C12.5508 4.99902 12.3598 5.07814 12.219 5.21897C12.0782 5.3598 11.9991 5.55081 11.9991 5.74997C11.9991 5.94913 12.0782 6.14014 12.219 6.28097L17.6895 11.75Z"
                                                    fill="#002133"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- <div class="card-title">Health</div> -->
                            </div>
                        </div>
                        @endforeach


                        @endif

                        </div>



                    </div>



                </div>



                <nav aria-label="Page navigation example">
                    <ul class="pagination custom-pagination">
                        <div class="d-flex justify-content-center">
                            {{ $blogs->links() }}
                        </div>
                    </ul>
                </nav>
            </section>
        @else

        <h5 class="text-center">No Blog Found</h5>

        @endif
    </main>
@endsection
