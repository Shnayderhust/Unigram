document.addEventListener("DOMContentLoaded", function () {
  const changeprof = document.getElementById("changeprof");
  const topprofdiv = document.getElementById("topprofdiv");
  const kusanya = document.getElementById("kusanya");
  const topprof = document.getElementById("topprof");

  const changeusername = document.getElementById("changeusername");
  const changeyourusername = document.getElementById("changeyourusername");
  const name = document.getElementById("name");
  const kusanyausername = document.getElementById("kusanyausername");
  const usernametopprof = document.getElementById("usernametopprof");

  const changeuserbio = document.getElementById("changeuserbio");
  const changeyourbio = document.getElementById("changeyourbio");
  const kusanyabio = document.getElementById("kusanyabio");
  const bio = document.getElementById("bio");
  const biotopprof = document.getElementById("biotopprof");

  topprofdiv.addEventListener("click", () => {
    topprof.style.display = "flex";
  });
  kusanya.addEventListener("click", () => {
    topprof.style.display = "none";
  });
  //
  //
  //
  changeyourusername.addEventListener("click", () => {
    usernametopprof.style.display = "flex";
  });
  name.addEventListener("click", () => {
    usernametopprof.style.display = "flex";
  });
  kusanyausername.addEventListener("click", () => {
    usernametopprof.style.display = "none";
  });
  //
  //
  //
  changeyourbio.addEventListener("click", () => {
    biotopprof.style.display = "flex";
  });
  bio.addEventListener("click", () => {
    biotopprof.style.display = "flex";
  });
  kusanyabio.addEventListener("click", () => {
    biotopprof.style.display = "none";
  });

  changeprof.addEventListener("submit", function (event) {
    event.preventDefault();

    let formData = new FormData(changeprof);

    fetch("../Customization/customizeProf.php", {
      method: "POST",
      body: formData,
    }).then(function (response) {
      if (response.status === 200) {
        return response.text();
      } else if (response.status === 400) {
        return response.json().then(function (data) {
          proferrorcontainer.style.display = "flex";
          topprof.style.display = "none";
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

  changeusername.addEventListener("submit", function (event) {
    event.preventDefault();

    let formData = new FormData(changeusername);

    fetch("../Customization/customizeUsername.php", {
      method: "POST",
      body: formData,
    }).then(function (response) {
      if (response.status === 200) {
        return response.text();
      } else if (response.status === 400) {
        return response.json().then(function (data) {
          proferrorcontainer.style.display = "flex";
          topprof.style.display = "none";
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

  changeuserbio.addEventListener("submit", function (event) {
    event.preventDefault();

    let formData = new FormData(changeuserbio);

    fetch("../Customization/customizeBio.php", {
      method: "POST",
      body: formData,
    }).then(function (response) {
      if (response.status === 200) {
        return response.text();
      } else if (response.status === 400) {
        return response.json().then(function (data) {
          proferrorcontainer.style.display = "flex";
          topprof.style.display = "none";
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

addEventListener("click", function (event) {
  if (event.target.matches("#rudi")) {
    document.getElementById("topprof").style.display = "none";
  }
});
