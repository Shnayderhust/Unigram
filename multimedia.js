function goToPreviewPage() {
    const filepreview = document.getElementById('filepreview');
    const photoInput = document.getElementById('uploadphoto');
    const imagePreview = document.getElementById('imagePreview');

    filepreview.style.display = "flex";
    if (photoInput.files && photoInput.files[0]) {
        const filereader = new FileReader();
        console.log('wrer')
        filereader.onload = function (e) {
            imagePreview.src = e.target.result;
        }

        filereader.readAsDataURL(photoInput.files[0]);
    }


}