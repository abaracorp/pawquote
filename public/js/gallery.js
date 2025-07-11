const fileInput = document.getElementById('fileInput');
const imagePreviewContainer = document.getElementById('imagePreviewContainer');
const uploadBox = document.getElementById('uploadBox');


const dataTransfer = new DataTransfer();


fileInput.addEventListener('change', function (event) {
    const files = Array.from(event.target.files);

    
    const isMultiple = fileInput.hasAttribute('multiple');

    if (!isMultiple) {
        imagePreviewContainer.innerHTML = ''; 
        dataTransfer.items.clear();           
    }

    files.forEach((file, i) => {
        if (!file.type.startsWith('image/')) return;

       
        if (!isMultiple && i > 0) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            const listItem = document.createElement('li');

            const fileIndex = dataTransfer.items.length;
            dataTransfer.items.add(file); 

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
            fileInput.files = dataTransfer.files; 
        };

        reader.readAsDataURL(file);
    });
});



imagePreviewContainer.addEventListener('click', function (e) {
    if (e.target.closest('.remove-image')) {
        e.preventDefault();
        const removeBtn = e.target.closest('.remove-image');
        const indexToRemove = parseInt(removeBtn.getAttribute('data-index'));

        
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

        
        removeBtn.closest('li').remove();

       
        Array.from(imagePreviewContainer.querySelectorAll('.remove-image')).forEach((el, newIndex) => {
            el.setAttribute('data-index', newIndex);
        });
    }
});

 
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
