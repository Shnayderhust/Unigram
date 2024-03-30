<<<<<<< HEAD
const Friends = document.querySelectorAll('.onefriend');
const friendsearch = document.getElementById('friendsearch');
const userfriendlist = document.getElementById('userfriendlist');
const addFriends = document.getElementsByClassName('addfriend');
const removebutts = document.getElementsByClassName('remove');

document.addEventListener('DOMContentLoaded', function () {

    onpageloaddisplayfriends()

    friendAdder()

    friendSearch()

})


function friendSearch() {
    // This block is used for searching through users
    friendsearch.addEventListener('input', function () {
        const searchTerm = friendsearch.value.toLowerCase();

        Friends.forEach(function (friend) {
            const username = friend.getAttribute('data-username').toLowerCase();
            if (username.includes(searchTerm)) {
                friend.style.display = 'flex';
            } else {
                friend.style.display = 'none';
            }
        })
    })
}


function friendAdder() {
    // fetch for adding new friends

    for (const addFriend of addFriends) {

        addFriend.addEventListener('click', function (event) {
            const getUserId = event.target.getAttribute('data-user-id');

            fetch('friends.inc.php', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ getUserId })

            })
                .then(function (response) {
                    if (response.status === 200) {
                        console.log('user added successfully')
                        return response.json().then(function (data) {

                            userfriendlist.innerHTML = "";
                            if (userfriendlist) {
                                for (let userfrienddata of data) {
                                    userfriendlist.innerHTML += displayfriends(userfrienddata);
                                }
                                console.log('friend added successfully');

                            }
                        })

                    } else {
                        console.log('user adding failed')
                    }
                })
                .catch(function (error) {
                    console.log("Error fetching user data:", error);
                })
        })
    }
}


function onpageloaddisplayfriends() {

    // fetch for displaying friends who already exist in database
    fetch('friends.inc.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ getUserId: 'initial_load' })

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
                })
            } else {
                console.log('friends displaying failed')
            }
        })
        .catch(function (error) {
            console.log("Error fetching user data:", error);
        })
}


function displayfriends(userfrienddata) {
    const userfriend = document.createElement('div');
    userfriend.classList.add('userfriend')
    userfriend.setAttribute('data-username', userfrienddata["username"]);

    // Left Content
    const leftprof = document.createElement('div');
    leftprof.classList.add('leftprof')

    const profpic = document.createElement('img');
    profpic.src = userfrienddata["profile_pic_id"];
    profpic.classList.add('profpic');

    const details = document.createElement('div');
    details.classList.add('details');

    const jina = document.createElement('h3');
    jina.classList.add('jina')
    jina.textContent = userfrienddata["username"];

    const friendbio = document.createElement('p');
    friendbio.classList.add('friendbio')
    friendbio.textContent = userfrienddata["bio"];

    // Right Content
    const rightprof = document.createElement('div');
    rightprof.classList.add('leftprof')

    const chat = document.createElement('button');
    chat.classList.add('chat');
    chat.type = 'button';
    chat.setAttribute('data-user-id', userfrienddata["user_id"]);
    chat.textContent = "Chat";

    const removefriend = document.createElement('button');
    removefriend.classList.add('remove');
    removefriend.setAttribute('data-user-id', userfrienddata["user_id"]);
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

addEventListener('click', (event) => {
    if (event.target.matches('#requestlist')) {
        document.getElementById('friendrequests').style.right = "-100%";
    } else if (event.target.matches('.addfriend')) {
        document.getElementById('friendrequests').style.right = "0";
    }
})

addEventListener('click', function (event) {
    if (event.target.matches('.remove')) {
        const userId = event.target.getAttribute('data-user-id')
        removeUser(userId);
    }
})

function removeUser(userId) {


    let getUserId = {
        "userId": userId,
        "removeFlag": 'removeFriend'
    }

    fetch('removefriend.inc.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ getUserId })

    })
        .then(function (response) {
            if (response.status === 200) {
                console.log('user added successfully')
            }
        })
}









const rootVariables = document.documentElement;


const colormode = document.getElementById('changemode')

let darkmode = false;

colormode.addEventListener('click', () => {

    if (!darkmode) {
        rootVariables.style.setProperty('--lightmode-background-color', '#1919199d')
        rootVariables.style.setProperty('--lightmode-color', '#fff')
        darkmode = true;
    } else {
        rootVariables.style.setProperty('--lightmode-background-color', '#fff')
        rootVariables.style.setProperty('--lightmode-color', '#000')
        darkmode = false;
    }

})

addEventListener('click', (event) => {

    if (event.target.matches('#friendsearch')) {
        document.getElementById('friendsearchresult').style.display = "block";
    } else if (event.target.matches('#nostay')) {
        document.getElementById('unorderd').style.display = "none";
        document.getElementById('logoutform').style.display = "none";
    } else if (event.target.matches('#returnfromfilepreview')) {
        document.getElementById('filepreview').style.display = "none";
    } else if (event.target.matches('.addfriend')) {
        document.getElementById('noactivechat').style.display = "none";
        document.getElementById('activechat').style.display = "flex";
        document.getElementById('friendrequests').style.right = "0%";
    }
})

=======
const Friends = document.querySelectorAll('.onefriend');
const friendsearch = document.getElementById('friendsearch');
const userfriendlist = document.getElementById('userfriendlist');
const addFriends = document.getElementsByClassName('addfriend');
const removebutts = document.getElementsByClassName('remove');

document.addEventListener('DOMContentLoaded', function () {

    onpageloaddisplayfriends()

    friendAdder()

    friendSearch()

})


function friendSearch() {
    // This block is used for searching through users
    friendsearch.addEventListener('input', function () {
        const searchTerm = friendsearch.value.toLowerCase();

        Friends.forEach(function (friend) {
            const username = friend.getAttribute('data-username').toLowerCase();
            if (username.includes(searchTerm)) {
                friend.style.display = 'flex';
            } else {
                friend.style.display = 'none';
            }
        })
    })
}


function friendAdder() {
    // fetch for adding new friends

    for (const addFriend of addFriends) {

        addFriend.addEventListener('click', function (event) {
            const getUserId = event.target.getAttribute('data-user-id');

            fetch('friends.inc.php', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ getUserId })

            })
                .then(function (response) {
                    if (response.status === 200) {
                        console.log('user added successfully')
                        return response.json().then(function (data) {

                            userfriendlist.innerHTML = "";
                            if (userfriendlist) {
                                for (let userfrienddata of data) {
                                    userfriendlist.innerHTML += displayfriends(userfrienddata);
                                }
                                console.log('friend added successfully');

                            }
                        })

                    } else {
                        console.log('user adding failed')
                    }
                })
                .catch(function (error) {
                    console.log("Error fetching user data:", error);
                })
        })
    }
}


function onpageloaddisplayfriends() {

    // fetch for displaying friends who already exist in database
    fetch('friends.inc.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ getUserId: 'initial_load' })

    })
        .then(function (response) {
            if (response.status === 200) {

                return response.json().then(function (data) {

                    userfriendlist.innerHTML = "";
                    if (userfriendlist) {
                        for (let userfrienddata of data) {
                            userfriendlist.innerHTML += displayfriends(userfrienddata);

                        }
                        console.log('after reload friends displayed successfully')

                    }
                })
            } else {
                console.log('friends displaying failed')
            }
        })
        .catch(function (error) {
            console.log("Error fetching user data:", error);
        })
}


function displayfriends(userfrienddata) {
    const userfriend = document.createElement('div');
    userfriend.classList.add('userfriend')
    userfriend.setAttribute('data-username', userfrienddata["username"]);

    // Left Content
    const leftprof = document.createElement('div');
    leftprof.classList.add('leftprof')

    const profpic = document.createElement('img');
    profpic.src = userfrienddata["profile_pic_id"];
    profpic.classList.add('profpic');

    const details = document.createElement('div');
    details.classList.add('details');

    const jina = document.createElement('h3');
    jina.classList.add('jina')
    jina.textContent = userfrienddata["username"];

    const friendbio = document.createElement('p');
    friendbio.classList.add('friendbio')
    friendbio.textContent = userfrienddata["bio"];

    // Right Content
    const rightprof = document.createElement('div');
    rightprof.classList.add('leftprof')

    const chat = document.createElement('button');
    chat.classList.add('chat');
    chat.type = 'button';
    chat.setAttribute('data-user-id', userfrienddata["user_id"]);
    chat.textContent = "Chat";

    const removefriend = document.createElement('button');
    removefriend.classList.add('remove');
    removefriend.setAttribute('data-user-id', userfrienddata["user_id"]);
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

addEventListener('click', (event) => {
    if (event.target.matches('#requestlist')) {
        document.getElementById('friendrequests').style.right = "-100%";
    } else if (event.target.matches('.addfriend')) {
        document.getElementById('friendrequests').style.right = "0";
    }
})

addEventListener('click', function (event) {
    if (event.target.matches('.remove')) {
        const userId = event.target.getAttribute('data-user-id')
        removeUser(userId);
    }
})

function removeUser(userId) {


    let getUserId = {
        "userId": userId,
        "removeFlag": 'removeFriend'
    }

    fetch('removefriend.inc.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ getUserId })

    })
        .then(function (response) {
            if (response.status === 200) {
                console.log('user added successfully')
            }
        })
}

>>>>>>> 3529bbc (Refactor: Addition of old code)
