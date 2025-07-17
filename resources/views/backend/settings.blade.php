@extends('backend.master')
@section('title', 'Setting')
@section('content')
<main class="Rightside settings">

    <x-alert />

    {{-- @dd($user) --}}

    <section class="inner">
        <div class="page-title">
            <h1 class="f-32 c-dark f-w-5 freedoka">Settings</h1>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <form 
                    action="{{ route('admin.updateSetting', ['user' => $user->id]) }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <h3 class="f-22 c-dark f-w-5 freedoka">Update your account settings.</h3>
                        
                        <label for="full-name">Full Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            class="form-control" 
                            id="full-name" 
                            placeholder="Enter full name..." 
                            value="{{ old('name', $user->name ?? '') }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address (Not Editable)</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            value="{{ $user->email }}" 
                            disabled
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control" 
                            id="password" 
                            placeholder="Enter new password..."
                        >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            class="form-control" 
                            id="password_confirmation" 
                            placeholder="Re-enter new password..."
                        >
                    </div>

                    <div class="profile-container mt-4">
                        <h3 class="f-18 c-dark f-w-5 freedoka">Profile Picture</h3>
                        <div class="profile">
                            <img 
                                id="profile-preview" 
                                src="{{ $user->image_url ? $user->image_url : asset('images/default-profile.png') }}" 
                                alt="Profile Picture" 
                                width="100"
                            >
                        </div>
                        <div class="profile-bottom mt-2">
                            <label for="profile-image-upload" class="custom-file-upload f-14 c-orange f-w-5 b-orange br-5">
                                Upload New
                            </label>
                            <input id="profile-image-upload" type="file" name="profile_picture" accept="image/*" style="display: none;" />
                            <button type="button" class="remove f-14 c-light f-w-5 freedoka b-light" onclick="resetImage()">Remove</button>
                        </div>
                    </div>

                    <div class="bottom-buttons mt-4">
                        <button type="submit" class="save-Changes f-18 c-orange f-w-5 freedoka b-orange">Save Changes</button>
                        {{-- <a href="{{ url()->previous() }}" class="cancel f-18 c-light f-w-5 freedoka b-light">Cancel</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

@push('scripts')
<script>
    const fileUpload = document.getElementById('profile-image-upload');
    const profilePreview = document.getElementById('profile-preview');
    const defaultImage = "{{ asset('images/default-profile.png') }}";

    // Only preview image — no uploading via JS
    fileUpload.addEventListener('change', function (event) {
        const reader = new FileReader();
        reader.onload = function (e) {
            profilePreview.src = e.target.result;
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });

    function resetImage() {
        profilePreview.src = defaultImage;
        fileUpload.value = '';
    }
</script>
@endpush
@endsection


