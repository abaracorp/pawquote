@extends('backend.master')
@section('title', 'Edit Story')
@section('content')
<main class="Rightside Add-new-story">
    <x-alert />
    <section class="add-new-blog">
        <div class="page-title">
            <h1 class="f-32 c-dark f-w-5 freedoka">Edit Story</h1>
        </div>

        <form action="{{ route('admin.updateFan', $fan->id) }}" id="editFanStoriesForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="post-title"> Post Title: </label>
                            <input type="text" class="" name="title" id="post-title" required=""
                                placeholder="Enter title..." value="{{ old('title', $fan->title) }}">
                        </div>

                        <div class="form-group">
                            <label for="Description"> Description: </label>
                            <textarea name="content" id="Content" placeholder="Enter Description....">{{ old('content', $fan->content) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Label"> Label: </label>
                            <input type="text" class="" name="label" id="Label" required=""
                                placeholder="Enter label..." value="{{ old('label', $fan->label) }}">
                        </div>

                        <div class="form-group choose-image">
                            <div class="upload-container">
                                <label for="fileInput">Featured Image: <span class="f-12 c-light f-w-4 freedoka">(*)</span>
                                    <div class="upload-box" id="uploadBox">
                                        <svg width="24" height="24" ...> <!-- Your SVG Icon --> </svg>
                                        <p class="f-14 c-light f-w-5 freedoka">Drag &amp; drop an image here, or <span class="c-skyblue">browse file</span></p>

                                        <input type="file" id="fileInput" name="image" class="file-input" accept="image/*">
                                    </div>
                                </label>
                            </div>

                            <ul id="imagePreviewContainer" class="image-container">
                                @if($fan->image_url)
                                    <li>
                                        <div class="image-card">
                                            <img src="{{ $fan->image_url }}" alt="Preview" style="width: 100px; height: auto;">
                                        </div>
                                        <a href="javascript:void(0);" class="remove-image"><i class="fa-solid fa-xmark"></i></a>
                                        <p class="f-10 c-dark f-w-5 freedoka">{{ $fan->image_name }}</p>
                                    </li>
                                @endif
                            </ul>
                           
                        </div>

                    </div>
                </div>
            </div>

            <div class="bottom-buttons">
                <button class="Save f-18 c-orange f-w-5 freedoka b-orange " type="submit">Update</button>
                <button class="Clear f-18 c-light f-w-5 freedoka b-light" type="button" onclick="clearFormData(this.form.id)">Clear</button>
            </div>
        </form>
    </section>
</main>

@push('scripts')
    <script src="{{ asset('js/ckEditor.js') }}"></script>
    <script src="{{ asset('js/gallery.js') }}"></script>
@endpush

@endsection
