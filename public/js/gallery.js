const fileInput = document.getElementById('fileInput');
const imagePreviewContainer = document.getElementById('imagePreviewContainer');
const uploadBox = document.getElementById('uploadBox');

// Store file list in a DataTransfer object to manage removals
const dataTransfer = new DataTransfer();

// Handle file selection
// fileInput.addEventListener('change', function (event) {
//     const files = Array.from(event.target.files);

//     files.forEach((file) => {
//         if (!file.type.startsWith('image/')) return;

//         const reader = new FileReader();
//         reader.onload = function (e) {
//             const listItem = document.createElement('li');

//             const fileIndex = dataTransfer.items.length;
//             dataTransfer.items.add(file); // Add file to DataTransfer object

//             listItem.innerHTML = `
//                 <div class="image-card">
//                     <img src="${e.target.result}" alt="">
//                 </div>
//                 <a href="#" data-index="${fileIndex}" class="remove-image">
//                     <i class="fa-solid fa-xmark"></i>
//                 </a>
//                 <p class="f-10 c-dark f-w-5 freedoka">${file.name}</p>
//             `;

//             imagePreviewContainer.appendChild(listItem);
//             fileInput.files = dataTransfer.files; // Update input files
//         };

//         reader.readAsDataURL(file);
//     });

//     // Don't reset file input — keep it intact
// });

fileInput.addEventListener('change', function (event) {
    const files = Array.from(event.target.files);

    // If input does not allow multiple, only process the first image and clear existing previews
    const isMultiple = fileInput.hasAttribute('multiple');

    if (!isMultiple) {
        imagePreviewContainer.innerHTML = ''; // Clear previous previews
        dataTransfer.items.clear();           // Clear previous files
    }

    files.forEach((file, i) => {
        if (!file.type.startsWith('image/')) return;

        // If not multiple and more than one file is selected, skip additional files
        if (!isMultiple && i > 0) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            const listItem = document.createElement('li');

            const fileIndex = dataTransfer.items.length;
            dataTransfer.items.add(file); // Add to DataTransfer

            listItem.innerHTML = `
                <div class="image-card">
                    <img src="${e.target.result}" alt="">
                </div>
                <a href="#" data-index="${fileIndex}" class="remove-image">
                    <i class="fa-solid fa-xmark"></i>
                </a>
                <p class="f-10 c-dark f-w-5 freedoka">${file.name}</p>
            `;

            imagePreviewContainer.appendChild(listItem);
            fileInput.files = dataTransfer.files; // Update the input files
        };

        reader.readAsDataURL(file);
    });
});


// Remove image from preview and DataTransfer list
imagePreviewContainer.addEventListener('click', function (e) {
    if (e.target.closest('.remove-image')) {
        e.preventDefault();
        const removeBtn = e.target.closest('.remove-image');
        const indexToRemove = parseInt(removeBtn.getAttribute('data-index'));

        // Remove from DataTransfer
        const newDataTransfer = new DataTransfer();
        Array.from(dataTransfer.files).forEach((file, i) => {
            if (i !== indexToRemove) {
                newDataTransfer.items.add(file);
            }
        });

        dataTransfer.items.clear();
        Array.from(newDataTransfer.files).forEach(file => {
            dataTransfer.items.add(file);
        });

        fileInput.files = dataTransfer.files;

        // Remove the preview item
        removeBtn.closest('li').remove();

        // Reset all preview indexes
        Array.from(imagePreviewContainer.querySelectorAll('.remove-image')).forEach((el, newIndex) => {
            el.setAttribute('data-index', newIndex);
        });
    }
});

// Drag-and-drop support
['dragenter', 'dragover'].forEach(eventName => {
    uploadBox.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
        uploadBox.classList.add('dragover');
    });
});

['dragleave', 'drop'].forEach(eventName => {
    uploadBox.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
        uploadBox.classList.remove('dragover');
    });
});

uploadBox.addEventListener('drop', function (e) {
    const files = e.dataTransfer.files;
    fileInput.files = files;
    fileInput.dispatchEvent(new Event('change'));
});
