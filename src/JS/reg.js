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