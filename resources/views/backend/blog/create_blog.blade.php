@extends('backend.master')
@section('title', 'Create Blog')
@section('content')
<main class="Rightside">
    <x-alert />
    <section class="add-new-blog">
        <div class="page-title">
            <h1 class="f-32 c-dark f-w-5 freedoka">Add New Blog</h1>
        </div>
        <form action="{{route('admin.saveBlogData')}}" method="POST" id="blogForm" enctype="multipart/form-data">
            @csrf
            <div class="">
                <div class="row">
                    <div class="col-lg-6">

                        <h3 class="page-details f-22 c-dark f-w-5 freedoka">Blog Details</h3>
                        <div class="form-group">
                            <label for="title"> Title: </label>
                            <input type="text" class="" name="title" id="title" required placeholder="Enter title..."
                                value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="slug"> URL Slug </label>
                            <input type="text" class="" name="slug" id="slug" placeholder="Enter url...."
                                value="{{ old('slug') }}">
                        </div>

                        <div class="form-group">
                            <label for=""> Status: </label>
                            <ul class="radio-card">
                                <li>
                                    <label class="radio-container">Published
                                        <input type="radio" value="0" checked name="status" {{ old('status')==='0' ? 'checked'
                                            : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="radio-container">Draft
                                        <input type="radio" value="1" name="status" {{ old('status')==='1' ? 'checked'
                                            : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group choose-image">
                            <div class="upload-container">
                                <label for="fileInput">Featured Image: <span
                                        class="f-12 c-light f-w-4 freedoka">(*)</span>
                                    <div class="upload-box" id="uploadBox">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14 2.8125C17.97 2.8125 19.97 2.8125 21.36 4.2025C22.75 5.5925 22.75 7.5825 22.75 11.5625V13.5625C22.75 17.5325 22.75 19.5325 21.36 20.9225C19.97 22.3125 17.97 22.3125 14 22.3125H10C6.03 22.3125 4.03 22.3125 2.64 20.9225C1.25 19.5325 1.25 17.5425 1.25 13.5625V11.5625C1.25 7.5925 1.25 5.5925 2.64 4.2025C4.03 2.8125 6.03 2.8125 10 2.8125H14ZM3.7 5.2625C2.75 6.2125 2.75 8.0025 2.75 11.5625H2.74V13.5625C2.74 15.0025 2.75 16.1525 2.81 17.0725L5.59 13.9525C6.28 13.1625 7.63 13.1225 8.37 13.8725L10 15.5025L14.13 11.3725C14.86 10.6425 16.18 10.6625 16.9 11.4325L21.23 16.1525C21.25 15.4125 21.25 14.5625 21.25 13.5625V11.5625C21.25 8.0025 21.25 6.2125 20.3 5.2625C19.35 4.3125 17.56 4.3125 14 4.3125H10C6.44 4.3125 4.65 4.3125 3.7 5.2625ZM10 20.8125H14V20.8025C17.56 20.8025 19.35 20.8025 20.3 19.8525C20.7 19.4625 20.93 18.9025 21.06 18.1425L20.95 18.0625L15.8 12.4425C15.64 12.2725 15.35 12.2625 15.19 12.4225L10.53 17.0825C10.25 17.3625 9.75 17.3625 9.47 17.0825L7.31 14.9225C7.27017 14.8847 7.2232 14.8551 7.17183 14.8356C7.12046 14.8161 7.06572 14.807 7.01081 14.8089C6.95589 14.8107 6.9019 14.8235 6.85197 14.8464C6.80204 14.8694 6.75718 14.902 6.72 14.9425L3.15 18.9625C3.28 19.3225 3.46 19.6225 3.7 19.8625C4.65 20.8125 6.44 20.8125 10 20.8125ZM10.75 9.0625C10.75 10.3025 9.74 11.3125 8.5 11.3125C7.26 11.3125 6.25 10.3025 6.25 9.0625C6.25 7.8225 7.26 6.8125 8.5 6.8125C9.74 6.8125 10.75 7.8225 10.75 9.0625ZM9.25 9.0625C9.25 8.6525 8.91 8.3125 8.5 8.3125C8.09 8.3125 7.75 8.6525 7.75 9.0625C7.75 9.4725 8.09 9.8125 8.5 9.8125C8.91 9.8125 9.25 9.4725 9.25 9.0625Z"
                                                fill="#566369" />
                                        </svg>
                                        <p class="f-14 c-light f-w-5 freedoka">Drag & drop an image here, or <span
                                                class="c-skyblue">browse file</span></p>
                                </label>
                                <input type="file" id="fileInput" name="image" class="file-input" accept="image/*">
                            </div>

                        </div>

                        <ul class="image-container" id="imagePreviewContainer"></ul>

                    </div>
                    <div class="form-group">
                        <label for="Summary"> Excerpt/Summary: <span
                                class="f-12 c-light f-w-4 freedoka">(Optional)</span> </label>
                        <textarea id="Summary" name="summary"
                            placeholder="Enter excerpt/summary">{{ old('summary') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="Content"> Content:</label>
                        <textarea name="content" id="Content"
                            placeholder="Enter content">{{ old('content') }}</textarea>
                    </div>

                </div>
            </div>
            </div>
            <div class="bottom-buttons">
                <button type="button" onclick="clearFormData(this.form.id)" class="cancel f-18 c-light f-w-5 freedoka b-light">Clear</button>
                {{-- <button class="save-draft f-18 c-orange f-w-5 freedoka b-orange">Save Draft</button> --}}
                <button class="publish f-18 c-parrot-green f-w-5 freedoka b-parrot-green" type="submit">Save</button>
            </div>
        </form>
    </section>
</main>

@push('scripts')


<script src="{{asset('js/ckEditor.js')}}"></script>
<script src="{{asset('js/blog.js')}}"></script>
<script src="{{asset('js/gallery.js')}}"></script>



@endpush

@endsection