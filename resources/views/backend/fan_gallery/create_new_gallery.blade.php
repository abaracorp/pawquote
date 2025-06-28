@extends('backend.master')

@section('content')
    <main class="Rightside">
        <section class="add-new-blog">
            <div class="page-title">
                <h1 class="f-32 c-dark f-w-5 freedoka">Add New Gallery</h1>
            </div>
        </section>
        <section class="">
            <div class="row">
                <div class="col-lg-6">
                    <form action="">
                        <div class="form-group">
                            <label for="gallery-name"> Gallery Name </label>
                            <input type="text" class="" id="gallery-name" placeholder="Enter gallery name...">
                        </div>
                        <div class="form-group">
                            <label for="Description">Description </label>
                            <textarea name="" id="Description" placeholder="Enter gallery description...."></textarea>
                        </div>
                        <div class="form-group choose-image">
                            <div class="upload-container">
                                <label for="">Featured Image: <span
                                        class="f-12 c-light f-w-4 freedoka">(Optional)</span></label>
                                <div class="upload-box" id="uploadBox">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14 2.8125C17.97 2.8125 19.97 2.8125 21.36 4.2025C22.75 5.5925 22.75 7.5825 22.75 11.5625V13.5625C22.75 17.5325 22.75 19.5325 21.36 20.9225C19.97 22.3125 17.97 22.3125 14 22.3125H10C6.03 22.3125 4.03 22.3125 2.64 20.9225C1.25 19.5325 1.25 17.5425 1.25 13.5625V11.5625C1.25 7.5925 1.25 5.5925 2.64 4.2025C4.03 2.8125 6.03 2.8125 10 2.8125H14ZM3.7 5.2625C2.75 6.2125 2.75 8.0025 2.75 11.5625H2.74V13.5625C2.74 15.0025 2.75 16.1525 2.81 17.0725L5.59 13.9525C6.28 13.1625 7.63 13.1225 8.37 13.8725L10 15.5025L14.13 11.3725C14.86 10.6425 16.18 10.6625 16.9 11.4325L21.23 16.1525C21.25 15.4125 21.25 14.5625 21.25 13.5625V11.5625C21.25 8.0025 21.25 6.2125 20.3 5.2625C19.35 4.3125 17.56 4.3125 14 4.3125H10C6.44 4.3125 4.65 4.3125 3.7 5.2625ZM10 20.8125H14V20.8025C17.56 20.8025 19.35 20.8025 20.3 19.8525C20.7 19.4625 20.93 18.9025 21.06 18.1425L20.95 18.0625L15.8 12.4425C15.64 12.2725 15.35 12.2625 15.19 12.4225L10.53 17.0825C10.25 17.3625 9.75 17.3625 9.47 17.0825L7.31 14.9225C7.27017 14.8847 7.2232 14.8551 7.17183 14.8356C7.12046 14.8161 7.06572 14.807 7.01081 14.8089C6.95589 14.8107 6.9019 14.8235 6.85197 14.8464C6.80204 14.8694 6.75718 14.902 6.72 14.9425L3.15 18.9625C3.28 19.3225 3.46 19.6225 3.7 19.8625C4.65 20.8125 6.44 20.8125 10 20.8125ZM10.75 9.0625C10.75 10.3025 9.74 11.3125 8.5 11.3125C7.26 11.3125 6.25 10.3025 6.25 9.0625C6.25 7.8225 7.26 6.8125 8.5 6.8125C9.74 6.8125 10.75 7.8225 10.75 9.0625ZM9.25 9.0625C9.25 8.6525 8.91 8.3125 8.5 8.3125C8.09 8.3125 7.75 8.6525 7.75 9.0625C7.75 9.4725 8.09 9.8125 8.5 9.8125C8.91 9.8125 9.25 9.4725 9.25 9.0625Z"
                                            fill="#566369" />
                                    </svg>
                                    <p class="f-14 c-light f-w-5 freedoka">Drag & drop an image here, or <span
                                            class="c-skyblue">browse file</span></p>
                                </div>
                                <input type="file" id="fileInput" class="file-input" accept="image/*">
                                <!-- <ul class="image-preview-container">
                                               <li>
                                                 <div class="image-card"><img id="imagePreview" class="image-preview" src="#" alt="Image Preview"></div>
                                                <p id="imageFilename" class="image-filename f-10 c-dark f-w-5 freedoka"></p>
                                                 <a href=""><i class="fa-solid fa-xmark"></i></a>
                                               </li>
                                            </ul> -->
                            </div>
                            <ul class="image-container">
                                <li>
                                    <div class="image-card"><img src="images/profile.png" alt=""></div>
                                    <a href=""><i class="fa-solid fa-xmark"></i></a>
                                    <p class="f-10 c-dark f-w-5 freedoka">dog-play.png</p>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="bottom-buttons">
            <button class="save-gallery f-18 c-orange f-w-5 freedoka b-orange">Save Gallery</button>
            <button class="cancel f-18 c-light f-w-5 freedoka b-light">cancel</button>
        </section>
    </main>


    <script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadBox = document.getElementById('uploadBox');
            const fileInput = document.getElementById('fileInput');
            const imagePreview = document.getElementById('imagePreview');
            const imageFilename = document.getElementById('imageFilename');

            // When the custom upload box is clicked, trigger the hidden file input
            uploadBox.addEventListener('click', function() {
                fileInput.click();
            });

            // Handle file selection when a file is chosen through the input
            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0]; // Get the first selected file

                if (file) {
                    // Check if the selected file is an image
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            // Set the source of the image preview
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block'; // Show the image preview
                            imageFilename.textContent = file.name; // Display the filename
                        };

                        // Read the file as a Data URL
                        reader.readAsDataURL(file);
                    } else {
                        // If not an image, clear preview and show an error (optional)
                        imagePreview.style.display = 'none';
                        imagePreview.src = '#';
                        imageFilename.textContent = 'Please select an image file.';
                        console.error('Selected file is not an image.');
                    }
                } else {
                    // No file selected, hide preview
                    imagePreview.style.display = 'none';
                    imagePreview.src = '#';
                    imageFilename.textContent = '';
                }
            });

            // Optional: Handle drag and drop functionality
            uploadBox.addEventListener('dragover', (e) => {
                e.preventDefault();
                e.stopPropagation();
                uploadBox.style.borderColor = '#0d6efd'; /* Highlight on drag over */
            });

            uploadBox.addEventListener('dragleave', (e) => {
                e.preventDefault();
                e.stopPropagation();
                uploadBox.style.borderColor = '#ced4da'; /* Reset border on drag leave */
            });

            uploadBox.addEventListener('drop', (e) => {
                e.preventDefault();
                e.stopPropagation();
                uploadBox.style.borderColor = '#ced4da'; /* Reset border on drop */

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files; // Assign dropped files to the input
                    const changeEvent = new Event('change');
                    fileInput.dispatchEvent(changeEvent); // Trigger change event
                }
            });
        });
    </script>
    </script>

@endsection
