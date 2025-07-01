@extends('backend.master')

@section('content')
<main class="Rightside">
    <x-alert />
    <section class="inner">
        <div class="page-title">
            <h1 class="f-32 c-dark f-w-5 freedoka">Blogs</h1>
        </div>
    
        <section class="filter-tab">
            
        <span id="statusCounts">
        <x-backend.status-filter :count="$count" />
        </span>

        <div class="rightside">
            <a href="{{ route('admin.createNewBlog') }}" class="button add-new  f-18 c-dark f-w-5 freedoka b-orange br-5"><svg width="18" height="18"
                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1.5 9C1.5 4.85775 4.85775 1.5 9 1.5C13.1422 1.5 16.5 4.85775 16.5 9C16.5 13.1422 13.1422 16.5 9 16.5C4.85775 16.5 1.5 13.1422 1.5 9ZM9 3C7.4087 3 5.88258 3.63214 4.75736 4.75736C3.63214 5.88258 3 7.4087 3 9C3 10.5913 3.63214 12.1174 4.75736 13.2426C5.88258 14.3679 7.4087 15 9 15C10.5913 15 12.1174 14.3679 13.2426 13.2426C14.3679 12.1174 15 10.5913 15 9C15 7.4087 14.3679 5.88258 13.2426 4.75736C12.1174 3.63214 10.5913 3 9 3Z"
                    fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M9.75 5.25C9.75 5.05109 9.67098 4.86032 9.53033 4.71967C9.38968 4.57902 9.19891 4.5 9 4.5C8.80109 4.5 8.61032 4.57902 8.46967 4.71967C8.32902 4.86032 8.25 5.05109 8.25 5.25V8.25H5.25C5.05109 8.25 4.86032 8.32902 4.71967 8.46967C4.57902 8.61032 4.5 8.80109 4.5 9C4.5 9.19891 4.57902 9.38968 4.71967 9.53033C4.86032 9.67098 5.05109 9.75 5.25 9.75H8.25V12.75C8.25 12.9489 8.32902 13.1397 8.46967 13.2803C8.61032 13.421 8.80109 13.5 9 13.5C9.19891 13.5 9.38968 13.421 9.53033 13.2803C9.67098 13.1397 9.75 12.9489 9.75 12.75V9.75H12.75C12.9489 9.75 13.1397 9.67098 13.2803 9.53033C13.421 9.38968 13.5 9.19891 13.5 9C13.5 8.80109 13.421 8.61032 13.2803 8.46967C13.1397 8.32902 12.9489 8.25 12.75 8.25H9.75V5.25Z"
                    fill="currentColor" />
            </svg>Add New Blog </a>
            <div class="search-container b-orange br-5 ">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="moduleSearchInput" data-url="search-blog" placeholder="Search blogs....">
            </div>
        </div>
        </section>
       
        <form id="bulkActionForm" action="{{route('admin.blogBulkAction')}}" method="POST">
        <div class="select-wrapper b-orange br-5">
                @csrf
                <select name="bulk_action" id="bulkActionSelect" class="c-dark f-16 f-w-5 freedoka">
                    <option value="">Bulk Action</option>
                    <option value="delete">Delete</option>
                    <option value="publish">Change to Published</option>
                    <option value="draft">Change to Draft</option>
                </select>
        </div>    

        <span id="tableResults">
             @include('backend.blog.blog_table',['blogs' => $blogs])
        </span>   
        </form>

    </main>


    @push('scripts')

    <script src="{{asset('js/tableSearchPagination.js')}}"></script>

    @endpush

@endsection
