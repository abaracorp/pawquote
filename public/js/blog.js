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


// const fileInput = document.getElementById('fileInput');
// const viewImage = document.getElementById('viewImage');
// const imageItem = document.getElementById('imageItem');
// const fileName = document.getElementById('fileName');
// const removeImage = document.getElementById('removeImage');

// fileInput.addEventListener('change', function (e) {
//     const file = e.target.files[0];
//     if (file) {
//         const reader = new FileReader();
//         reader.onload = function (event) {
//             viewImage.src = event.target.result;
//             fileName.textContent = file.name;
//             imageItem.style.display = 'block';
//         };
//         reader.readAsDataURL(file);
//     }
// });

// removeImage.addEventListener('click', function (e) {
//     e.preventDefault();
//     fileInput.value = '';
//     viewImage.src = 'images/profile.png';
//     fileName.textContent = '';
//     imageItem.style.display = 'none';
// });