document.addEventListener("DOMContentLoaded", function () {
  const Regform = document.getElementById("regform");
  const profile = document.getElementById("topprof");
  const errorcontainer = document.getElementById("errorcontainer");

  Regform.addEventListener("submit", function (event) {
    event.preventDefault();

    let formData = new FormData(Regform);

    fetch("../Registration/signup.inc.php", {
      method: "POST",
      body: formData,
    }).then((response) => {
      if (response.status === 200) {
        errorcontainer.style.display = "none";
        profile.style.display = "flex";
      } else if (response.status === 400) {
        return response.json().then((data) => {
          errorcontainer.style.display = "flex";
          errorcontainer.innerHTML = "";

          for (let error in data) {
            errorcontainer.innerHTML +=
              '<p class="errormessage"> ' + data[error] + " </p>";
          }
        });
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const profform = document.getElementById("bigcontainer");
  const profile = document.getElementById("topprof");
  const proferrorcontainer = document.getElementById("proferrorcontainer");
  const signupsuccess = document.getElementById("signupsuccess");

  profform.addEventListener("submit", function (event) {
    event.preventDefault();

    let formData = new FormData(profform);

    fetch("../Customization/profileUpload.php", {
      method: "POST",
      body: formData,
    }).then(function (response) {
      if (response.status === 200) {
        window.location.href = "./login.php";
        return response.text();
      } else if (response.status === 400) {
        return response.json().then(function (data) {
          proferrorcontainer.style.display = "flex";

          if (proferrorcontainer) {
            proferrorcontainer.innerHTML = "";
            for (let kosa in data) {
              proferrorcontainer.innerHTML +=
                '<p class="errormessage"> ' + data[kosa] + " </p>";
            }
          }
        });
      }
    });
  });
});

function displaySelectedImage() {
  const image = document.getElementById("chosingprof");
  const input = document.getElementById("chooseprof");

  if (input.files && input.files[0]) {
    const filereader = new FileReader();

    filereader.onload = function (e) {
      image.src = e.target.result;
    };

    filereader.readAsDataURL(input.files[0]);
  }
}
