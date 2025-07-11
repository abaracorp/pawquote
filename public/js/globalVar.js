const baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


function clearFormData(formID) {
    const form = document.querySelector(`#${formID}`);

    if (form) {
        form.reset();
        const targetEl = document.getElementById('showCustomDate');
        if (targetEl) {
            targetEl.style.display = 'none';
        }

        const targetImage = document.getElementById('imagePreviewContainer');
        if (targetImage) {
            targetImage.innerHTML = "";
        }
      
        const domEditableElement = document.querySelector('.ck-editor__editable');
          
        if(domEditableElement){
        const editorInstance = domEditableElement.ckeditorInstance;
        editorInstance.setData('');
        }
       
    }
    
}
