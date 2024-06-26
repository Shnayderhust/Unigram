addEventListener("click", (event) => {
  if (event.target.matches(".reglink")) {
    window.location.href = "../Registration/signup.php";
  } else if (event.target.matches(".mlogin")) {
    window.location.href = "/Registration/login.php";
  } else if (event.target.matches(".mlogo")) {
    window.location.href = "../index.php";
  } else if (event.target.matches("#gochat")) {
    window.location.href = "../Chat/chat.php";
  } else if (event.target.matches(".myprofpic")) {
    document.getElementById("newchat").style.left = "-100%";
    document.getElementById("settings").style.left = "-100%";
    document.getElementById("profile").style.left = "0";
  } else if (event.target.matches(".creatchat")) {
    document.getElementById("profile").style.left = "-100%";
    document.getElementById("settings").style.left = "-100%";
    document.getElementById("newchat").style.left = "0";
  } else if (event.target.matches("#chatlist")) {
    document.getElementById("newchat").style.left = "-100%";
    document.getElementById("newchat").style.transition = "2s";
    document.getElementById("settings").style.left = "-100%";
    document.getElementById("settings").style.transition = "2s";
    document.getElementById("profile").style.left = "-100%";
    document.getElementById("profile").style.transition = "2s";
  } else if (event.target.matches(".settings")) {
    document.getElementById("settings").style.left = "0";
    document.getElementById("unorderd").style.display = "none";
  } else if (event.target.matches(".logoutform")) {
    document.getElementById("logoutform").style.display = "flex";
  } else if (event.target.matches("#yeslogout")) {
    window.location.href = "../Registration/login.php";
  } else if (event.target.matches("#nostay")) {
    document.getElementById("unorderd").style.display = "none";
    document.getElementById("logoutform").style.display = "none";
  } else if (event.target.matches("#finishreg")) {
    document.getElementById("topprof").style.display = "flex";
    console.log("clicked");
  } else if (event.target.matches("#return")) {
    document.getElementById("topprof").style.display = "none";
  } else if (event.target.matches("#returnfromfilepreview")) {
    document.getElementById("filepreview").style.display = "none";
  } else if (event.target.matches("#submitfile")) {
    document.getElementById("filepreview").style.display = "none";
  } else if (event.target.matches("#friendsearch")) {
    document.getElementById("friendsearchresult").style.display = "block";
  } else if (event.target.matches("#fsearchreturn")) {
    document.getElementById("friendsearchresult").style.display = "none";
  } else if (!event.target.matches("#friendsearch")) {
    document.getElementById("friendsearchresult").style.display = "none";
  } else if (event.target.matches(".addfriend")) {
    document.getElementById("noactivechat").style.display = "none";
    document.getElementById("activechat").style.display = "flex";
    document.getElementById("friendrequests").style.right = "0%";
  }
});

addEventListener("click", (event) => {
  if (event.target.matches("#ul")) {
    document.getElementById("unorderd").style.display = "flex";
  } else if (!event.target.matches("#ul")) {
    document.getElementById("unorderd").style.display = "none";
  }
});

addEventListener("click", (event) => {
  if (event.target.matches("#fileuploader")) {
    document.getElementById("filepreview").style.display = "flex";
  } else if (!event.target.matches("#fileuploader")) {
    document.getElementById("filepreview").style.display = "none";
  }
});

// const rootVariables = document.documentElement;

// const colormode = document.getElementById("changemode");

// let darkmode = false;
// colormode.addEventListener("click", () => {
//   if (!darkmode) {
//     rootVariables.style.setProperty(
//       "--lightmode-background-color",
//       "#1919199d"
//     );
//     rootVariables.style.setProperty("--lightmode-color", "#fff");
//     darkmode = true;
//   } else {
//     rootVariables.style.setProperty("--lightmode-background-color", "#fff");
//     rootVariables.style.setProperty("--lightmode-color", "#000");
//     darkmode = false;
//   }
// });
