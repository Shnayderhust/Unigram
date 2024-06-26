const Friends = document.querySelectorAll(".onefriend");
const friendsearch = document.getElementById("friendsearch");
const userfriendlist = document.getElementById("userfriendlist");
const addFriends = document.getElementsByClassName("addfriend");
const removebutts = document.getElementsByClassName("remove");

document.addEventListener("DOMContentLoaded", function () {
  onpageloaddisplayfriends();

  friendAdder();

  friendSearch();
});

function friendSearch() {
  friendsearch.addEventListener("input", function () {
    const searchTerm = friendsearch.value.toLowerCase();

    Friends.forEach(function (friend) {
      const username = friend.getAttribute("data-username").toLowerCase();
      if (username.includes(searchTerm)) {
        friend.style.display = "flex";
      } else {
        friend.style.display = "none";
      }
    });
  });
}

function friendAdder() {
  for (const addFriend of addFriends) {
    addFriend.addEventListener("click", function (event) {
      const getUserId = event.target.getAttribute("data-user-id");

      fetch("../Chat/friends.inc.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ getUserId }),
      })
        .then(function (response) {
          if (response.status === 200) {
            console.log("user added successfully");
            return response.json().then(function (data) {
              userfriendlist.innerHTML = "";
              if (userfriendlist) {
                for (let userfrienddata of data) {
                  userfriendlist.innerHTML += displayfriends(userfrienddata);
                }
                console.log("friend added successfully");
              }
            });
          } else {
            console.log("user adding failed");
          }
        })
        .catch(function (error) {
          console.log("Error fetching user data:", error);
        });
    });
  }
}

function onpageloaddisplayfriends() {
  fetch("../Chat/friends.inc.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ getUserId: "initial_load" }),
  })
    .then(function (response) {
      if (response.status === 200) {
        return response.json().then(function (data) {
          userfriendlist.innerHTML = "";
          if (userfriendlist) {
            for (let userfrienddata of data) {
              userfriendlist.innerHTML += displayfriends(userfrienddata);
            }
            // console.log('after reload friends displayed successfully')
          }
        });
      } else {
        console.log("friends displaying failed");
      }
    })
    .catch(function (error) {
      console.log("Error fetching user data:", error);
    });
}

function displayfriends(userfrienddata) {
  const userfriend = document.createElement("div");
  userfriend.classList.add("userfriend");
  userfriend.setAttribute("data-username", userfrienddata["username"]);

  // Left Content
  const leftprof = document.createElement("div");
  leftprof.classList.add("leftprof");

  const profpic = document.createElement("img");
  profpic.src = userfrienddata["profile_pic_id"];
  profpic.classList.add("profpic");

  const details = document.createElement("div");
  details.classList.add("details");

  const jina = document.createElement("h3");
  jina.classList.add("jina");
  jina.textContent = userfrienddata["username"];

  const friendbio = document.createElement("p");
  friendbio.classList.add("friendbio");
  friendbio.textContent = userfrienddata["bio"];

  // Right Content
  const rightprof = document.createElement("div");
  rightprof.classList.add("leftprof");

  const chat = document.createElement("button");
  chat.classList.add("chat");
  chat.type = "button";
  chat.setAttribute("data-user-id", userfrienddata["user_id"]);
  chat.textContent = "Chat";

  const removefriend = document.createElement("button");
  removefriend.classList.add("remove");
  removefriend.setAttribute("data-user-id", userfrienddata["user_id"]);
  removefriend.textContent = "Remove";

  // Appendment
  details.appendChild(jina);
  details.appendChild(friendbio);

  leftprof.appendChild(profpic);
  leftprof.appendChild(details);

  rightprof.appendChild(chat);
  rightprof.appendChild(removefriend);

  userfriend.appendChild(leftprof);
  userfriend.appendChild(rightprof);

  return userfriend.outerHTML;
}

addEventListener("click", (event) => {
  if (event.target.matches("#requestlist")) {
    document.getElementById("friendrequests").style.right = "-100%";
  } else if (event.target.matches(".addfriend")) {
    document.getElementById("friendrequests").style.right = "0";
  }
});

addEventListener("click", function (event) {
  if (event.target.matches(".remove")) {
    const userId = event.target.getAttribute("data-user-id");
    removeUser(userId);
  }
});

function removeUser(userId) {
  let getUserId = {
    userId: userId,
    removeFlag: "removeFriend",
  };

  fetch("../Chat/removefriend.inc.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ getUserId }),
  }).then(function (response) {
    if (response.status === 200) {
      console.log("user added successfully");
    }
  });
}
