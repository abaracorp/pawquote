@extends('backend.master')

@section('content')
    <main class="Rightside">

        <x-alert />

        <section class="add-new-blog">
            <div class="page-title">
                <h1 class="f-32 c-dark f-w-5 freedoka">Edit Blog</h1>
            </div>
        </section>

        <form action="{{ route('admin.updateBlog', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section class="">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="page-details f-22 c-dark f-w-5 freedoka">Blog Details</h3>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" required placeholder="Enter title..."
                                value="{{ old('title', $blog->title) }}">
                        </div>

                        <div class="form-group">
                            <label for="slug">URL Slug:</label>
                            <input type="text" name="slug" id="slug" placeholder="Enter url..."
                                value="{{ old('slug', $blog->slug) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Status:</label>
                            <ul class="radio-card">
                                <li>
                                    <label class="radio-container">Published
                                        <input type="radio" value="0" name="status" {{ old('status', $blog->status) == 0 ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="radio-container">Draft
                                        <input type="radio" value="1" name="status" {{ old('status', $blog->status) == 1 ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group choose-image">
                            <div class="upload-container">
                                <label for="fileInput">Featured Image:
                                    <span class="f-12 c-light f-w-4 freedoka">(*)</span>
                                    <div class="upload-box" id="uploadBox">
                                        <!-- SVG icon omitted for brevity -->
                                        <p class="f-14 c-light f-w-5 freedoka">
                                            Drag & drop an image here, or <span class="c-skyblue">browse file</span>
                                        </p>
                                    </div>
                                    <input type="file" id="fileInput" name="image" class="file-input" accept="image/*">
                                </label>
                            </div>

                            <ul id="imageList" class="image-container">
                                <li id="imageItem" style="{{ $blog->image_url ? '' : 'display: none;' }}">
                                    <div class="image-card">
                                        <img id="viewImage" src="{{ $blog->image_url ? $blog->image_url : asset('images/profile.png') }}"
                                            alt="Preview" style="width: 100px; height: auto;">
                                    </div>
                                    <a href="javascript:void(0);" id="removeImage"><i class="fa-solid fa-xmark"></i></a>
                                    <p class="f-10 c-dark f-w-5 freedoka" id="fileName">{{ $blog->image_name ? ($blog->image_name) : '' }}</p>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="Summary">Excerpt/Summary:</label>
                            <textarea id="Summary" name="summary" placeholder="Enter excerpt/summary">{{ old('summary', $blog->summary) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Content">Content:</label>
                            <textarea name="content" id="Content" placeholder="Enter content">{{ old('content', $blog->content) }}</textarea>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bottom-buttons">
                <button class="cancel f-18 c-light f-w-5 freedoka b-light"><a href="{{route('admin.blogs')}}">Cancel</a></button>
                <button class="publish f-18 c-parrot-green f-w-5 freedoka b-parrot-green" type="submit">Update</button>
            </section>
        </form>
    </main>

    @push('scripts')
        <script>
            ClassicEditor
                .create(document.getElementById('Content'), {
                    removePlugins: [
                        'Image',
                        'ImageToolbar',
                        'ImageCaption',
                        'ImageStyle',
                        'ImageUpload',
                        'MediaEmbed',
                        'EasyImage',
                        'CKFinder'
                    ]
                })
                .then(editor => {
                    console.log('Editor was initialized', editor);
                })
                .catch(error => {
                    console.error('Error during initialization of the editor', error);
                });

            function generateSlug(text) {
                return text
                    .toString()
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }

            document.getElementById('title').addEventListener('input', function () {
                const titleValue = this.value;
                const slug = generateSlug(titleValue);
                document.getElementById('slug').value = slug;
            });

            const fileInput = document.getElementById('fileInput');
            const viewImage = document.getElementById('viewImage');
            const imageItem = document.getElementById('imageItem');
            const fileName = document.getElementById('fileName');
            const removeImage = document.getElementById('removeImage');

            fileInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        viewImage.src = event.target.result;
                        fileName.textContent = file.name;
                        imageItem.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });

            removeImage.addEventListener('click', function (e) {
                e.preventDefault();
                fileInput.value = '';
                viewImage.src = '{{ asset('images/profile.png') }}';
                fileName.textContent = '';
                imageItem.style.display = 'none';
            });
        </script>
    @endpush
@endsection
