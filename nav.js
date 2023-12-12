addEventListener('click', (event) => {
    if (event.target.matches('.reglink')) {
        window.location.href = "signup.php";
    }
    else if (event.target.matches('.mlogin')) {
        window.location.href = "login.php";
    }
    else if (event.target.matches('.mlogo')) {
        window.location.href = "index.php";
    }
    else if (event.target.matches('#gochat')) {
        window.location.href = "chat.php";
    }
    else if (event.target.matches('.myprofpic')) {
        document.getElementById('newchat').style.left = "-100%";
        document.getElementById('settings').style.left = "-100%";
        document.getElementById('profile').style.left = "0";
    }
    else if (event.target.matches('.creatchat')) {
        document.getElementById('profile').style.left = "-100%";
        document.getElementById('settings').style.left = "-100%";
        document.getElementById('newchat').style.left = "0";
    }
    else if (event.target.matches('#chatlist')) {
        document.getElementById('newchat').style.left = "-100%";
        document.getElementById('newchat').style.transition = "2s";
        document.getElementById('settings').style.left = "-100%";
        document.getElementById('settings').style.transition = "2s";
        document.getElementById('profile').style.left = "-100%";
        document.getElementById('profile').style.transition = "2s";
    }
    else if (event.target.matches('.settings')) {
        document.getElementById('settings').style.left = "0";
        document.getElementById('unorderd').style.display = "none";
    }
    else if (event.target.matches('.logoutform')) {
        document.getElementById('logoutform').style.display = "flex";
    }
    else if (event.target.matches('#yeslogout')) {
        window.location.href = "login.php";
    } else if (event.target.matches('#finishreg')) {
        document.getElementById('topprof').style.display = "flex";
        console.log('clicked')
    } else if (event.target.matches('#fsearchreturn')) {
        document.getElementById('friendsearchresult').style.display = "none";
    } else if (!event.target.matches('#friendsearch')) {
        document.getElementById('friendsearchresult').style.display = "none";
    }
});




addEventListener('click', (event) => {
    if (event.target.matches('#fileuploader')) {
        document.getElementById('filepreview').style.display = "flex";
    } else if (!event.target.matches('#fileuploader')) {
        document.getElementById('filepreview').style.display = "none";

    }
})

// const tumaDocument = document.getElementById('uploadyourdocument');
// const uploadyourphoto = document.getElementById('uploadyourphoto');

// tumaDocument.addEventListener('click', () => {
//     document.querySelector('documentfilepreview').style.display = "flex";
// })

// uploadyourphoto.addEventListener('click', () => {
//     document.querySelector('photofilepreview').style.display = "flex";
// })







