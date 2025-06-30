@extends('backend.master')
@section('content')

<main class="Rightside settings">
    <section class="inner">
        <div class="page-title">
            <h1 class="f-32 c-dark f-w-5 freedoka">Settings</h1>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <form action="">
                    <div class="form-group">
                        <h3 class="f-22 c-dark f-w-5 freedoka">Connect your account with third-party
                            services. </h3>
                        <label for="full-name">Full Name</label>
                        <input type="text" class="" id="full-name" placeholder="Enter full name...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="" id="email" placeholder="Enter email address...">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="" id="password" placeholder="Enter your password....">
                    </div>
                </form>
                <div class="profile-container">
                    <h3 class="f-18 c-dark f-w-5 freedoka">Profile Picture</h3>
                    <div class="profile">
                        <img src="images/" alt="">
                    </div>
                    <div class="profile-bottom">
                        <label for="file-upload" class="custom-file-upload f-14 c-orange f-w-5 b-orange br-5">
                            Upload New
                        </label>
                        <input id="file-upload" type="file" />
                        <button class="remove f-14 c-light f-w-5 freedoka b-light">Remove</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-buttons">
            <button class="save-Changes f-18 c-orange f-w-5 freedoka b-orange">Save Changes</button>
            <button class="cancel f-18 c-light f-w-5 freedoka b-light">cancel</button>
        </div>
    </section>
</main>

@endsection