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