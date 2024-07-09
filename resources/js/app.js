import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor';

document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
});
