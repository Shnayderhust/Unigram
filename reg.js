<<<<<<< HEAD
document.getElementById('chooseprof').addEventListener('change', function () {
    const input = document.getElementById('chooseprof');
    const label = document.getElementById('fileLabel');

    if (input.files.length > 0) {
        label.textContent = "File Chosed";
    } else {
        label.textContent = 'Upload Photo';
    }
})

document.getElementById('kusanyalabel').addEventListener('change', function () {
    document.getElementById('kusanya').click();
})

addEventListener('click', (event) => {

    if (event.target.matches('#return')) {
        document.getElementById('topprof').style.display = "none";
    } else if (event.target.matches('#submitfile')) {
        document.getElementById('filepreview').style.display = "none";
    }
=======
document.getElementById('chooseprof').addEventListener('change', function () {
    const input = document.getElementById('chooseprof');
    const label = document.getElementById('fileLabel');

    if (input.files.length > 0) {
        label.textContent = "File Chosed";
    } else {
        label.textContent = 'Upload Photo';
    }
})

document.getElementById('kusanyalabel').addEventListener('change', function () {
    document.getElementById('kusanya').click();
>>>>>>> 3529bbc (Refactor: Addition of old code)
})