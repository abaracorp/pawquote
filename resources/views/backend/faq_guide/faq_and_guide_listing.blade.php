@extends('backend.master')
@section('content')
<main class="Rightside faq">

    <x-alert />

    <section class="inner">
        <div class="toggle-container">
            <a href="{{ route('admin.faqGuide', ['type' => 'faq']) }}"
            class="f-18 c-dark f-w-5 freedoka {{ $type === 'faq' ? 'active' : '' }}">
            FAQ
            </a>

            <a href="{{ route('admin.faqGuide', ['type' => 'guide']) }}"
            class="f-18 c-dark f-w-5 freedoka {{ $type === 'guide' ? 'active' : '' }}">
            Guide
            </a>

        </div>
        <div class="page-title">
            <h1 class="f-32 c-dark f-w-5 freedoka">{{$text}}</h1>
        </div>
        <div class="filter-tab">
            <div class="rightside">
                <div class="search-container b-orange br-5 ">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="moduleSearchInput" data-url="search-{{$type}}" placeholder="Search {{$type}}....">
            </div>
                <button class="filter b-orange">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.0003 19.5648C15.0337 19.8147 14.9503 20.0814 14.7587 20.2563C14.6816 20.3336 14.5901 20.3949 14.4893 20.4367C14.3885 20.4785 14.2804 20.5 14.1713 20.5C14.0622 20.5 13.9541 20.4785 13.8533 20.4367C13.7525 20.3949 13.6609 20.3336 13.5839 20.2563L10.2426 16.9151C10.1518 16.8262 10.0828 16.7176 10.0408 16.5976C9.99893 16.4777 9.9853 16.3496 10.001 16.2235V11.9575L6.00988 6.84982C5.87458 6.67612 5.81352 6.45592 5.84006 6.23734C5.8666 6.01876 5.97858 5.81958 6.15153 5.68331C6.30984 5.56666 6.48482 5.5 6.66813 5.5H18.3332C18.5165 5.5 18.6915 5.56666 18.8498 5.68331C19.0228 5.81958 19.1347 6.01876 19.1613 6.23734C19.1878 6.45592 19.1268 6.67612 18.9915 6.84982L15.0003 11.9575V19.5648ZM8.3679 7.16644L11.6674 11.3825V15.9819L13.3339 17.6484V11.3742L16.6334 7.16644H8.3679Z"
                            fill="currentColor"></path>
                    </svg>
                    Filter
                </button>
                {{-- <div class="select-wrapper b-orange br-5">
                    <select name="" id="" class="c-dark f-16 f-w-4 freedoka">
                        <option value="" class="c-light f-16 f-w-4 freedoka">Category 1</option>
                        <option value="" class="c-light f-16 f-w-4 freedoka">Category 2</option>
                        <option value="" class="c-light f-16 f-w-4 freedoka">Category 3</option>
                        <option value="" class="c-light f-16 f-w-4 freedoka">Category 4</option>
                    </select>
                </div> --}}
            </div>
        </div>
        <div class="filter-tab second">
            <span id="statusCounts">
            <x-backend.status-filter :count="$count" />
            </span>
            <a href="{{route('admin.createNewFaqGuide',['type' => $type])}}"
                class="button add-new  f-18 c-dark f-w-5 freedoka b-orange br-5"><svg width="18" height="18"
                    viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.5 9C1.5 4.85775 4.85775 1.5 9 1.5C13.1422 1.5 16.5 4.85775 16.5 9C16.5 13.1422 13.1422 16.5 9 16.5C4.85775 16.5 1.5 13.1422 1.5 9ZM9 3C7.4087 3 5.88258 3.63214 4.75736 4.75736C3.63214 5.88258 3 7.4087 3 9C3 10.5913 3.63214 12.1174 4.75736 13.2426C5.88258 14.3679 7.4087 15 9 15C10.5913 15 12.1174 14.3679 13.2426 13.2426C14.3679 12.1174 15 10.5913 15 9C15 7.4087 14.3679 5.88258 13.2426 4.75736C12.1174 3.63214 10.5913 3 9 3Z"
                        fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.75 5.25C9.75 5.05109 9.67098 4.86032 9.53033 4.71967C9.38968 4.57902 9.19891 4.5 9 4.5C8.80109 4.5 8.61032 4.57902 8.46967 4.71967C8.32902 4.86032 8.25 5.05109 8.25 5.25V8.25H5.25C5.05109 8.25 4.86032 8.32902 4.71967 8.46967C4.57902 8.61032 4.5 8.80109 4.5 9C4.5 9.19891 4.57902 9.38968 4.71967 9.53033C4.86032 9.67098 5.05109 9.75 5.25 9.75H8.25V12.75C8.25 12.9489 8.32902 13.1397 8.46967 13.2803C8.61032 13.421 8.80109 13.5 9 13.5C9.19891 13.5 9.38968 13.421 9.53033 13.2803C9.67098 13.1397 9.75 12.9489 9.75 12.75V9.75H12.75C12.9489 9.75 13.1397 9.67098 13.2803 9.53033C13.421 9.38968 13.5 9.19891 13.5 9C13.5 8.80109 13.421 8.61032 13.2803 8.46967C13.1397 8.32902 12.9489 8.25 12.75 8.25H9.75V5.25Z"
                        fill="currentColor" />
                </svg>Add New {{$text}}</a>
        </div>
 <div class="select-wrapper b-orange br-5">
                @csrf
                <select name="bulk_action" id="bulkActionSelect" class="c-dark f-16 f-w-5 freedoka">
                    <option value="">Bulk Action</option>
                    <option value="delete">Delete</option>
                    <option value="publish">Change to Published</option>
                    <option value="draft">Change to Draft</option>
                </select>
        </div>
        <form id="bulkActionForm" action="{{route('admin.faqGuideBulkAction')}}" method="POST">
         <span id="tableResults">
             @include('backend.faq_guide.faq_guide_table',['faqGuide' => $faqGuide])
        </span>  
        
        
    </section>
</main>

    @push('scripts')

    <script src="{{asset('js/tableSearchPagination.js')}}"></script>

    @endpush

@endsection