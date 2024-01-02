function previewImage() {
    const preview = document.getElementById('image_preview');
    const fileInput = document.getElementById('upload_image');

    preview.style.backgroundImage = 'none';

    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.style.backgroundImage = 'url(' + e.target.result + ')';
        };

        reader.readAsDataURL(file);
    } else {
        // If no file selected, use the default avatar image
        preview.style.backgroundImage = 'url(' + document.getElementById('image_preview').value + ')';
    }
}
