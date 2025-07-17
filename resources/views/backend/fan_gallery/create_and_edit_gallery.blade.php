@extends('backend.master')
@section('title', isset($gallery) ? 'Edit Gallery' : 'Add Gallery')
@section('content')



<main class="Rightside add-new-gallery">
    <x-alert />
    <section class="inner">
        <div class="page-title">
            <h1 class="f-32 c-dark f-w-5 freedoka">
                {{ isset($gallery) ? 'Edit Gallery' : 'Add New Gallery' }}
            </h1>
        </div>

        <form action="{{ isset($gallery) ? route('admin.updateGallery', $gallery) : route('admin.saveGalleryData') }}"
            method="POST" id="galleryFrom" enctype="multipart/form-data">
            @csrf
            @if(isset($gallery))
            @method('PUT')
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group choose-image">
                        <div class="upload-container">
                            <label for="fileInput">Gallery Image:
                                <div class="upload-box" id="uploadBox">
                                    <p class="f-18 c-light f-w-5 freedoka">
                                        Drag & drop or <span class="c-skyblue">browse</span>
                                    </p>
                                </div>

                                <input type="file" name="{{ isset($gallery) ? 'image' : 'images[]' }}" id="fileInput"
                                    class="file-input" accept="image/*" {{-- required --}} {{ isset($gallery) ? ''
                                    : 'multiple' }}>
                            </label>
                        </div>

                        <ul class="image-container" id="imagePreviewContainer">
                            @if(isset($gallery))

                            <li class="image-item">
                                <div class="image-card">
                                    <img src="{{ $gallery->image_url }}" alt="Image">
                                </div>
                                <a href="#" class="remove-image existing-image" data-id="{{ $gallery->id }}">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                                <p class="f-10 c-dark f-w-5 freedoka">
                                    {{ $gallery->image_name }}
                                </p>
                                <input type="hidden" name="existing_image_id" value="{{ $gallery->id }}">
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bottom-buttons">
                <button class="save-gallery f-18 c-orange f-w-5 freedoka b-orange">
                    {{ isset($gallery) ? 'Update Gallery' : 'Save Gallery' }}
                </button>
                <button type="button" onclick="clearFormData(this.form.id)" class="cancel f-18 c-light f-w-5 freedoka b-light">
                    clear
                </button>
                {{-- <a href="{{ route('admin.gallery') }}"
                    class="cancel f-18 c-light f-w-5 freedoka b-light">Cancel</a> --}}
            </div>
        </form>
    </section>
</main>

@push('scripts')
<script src="{{ asset('js/gallery.js') }}"></script>
@endpush
@endsection