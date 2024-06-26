<?php
define("BASE_DIR", __DIR__);
require BASE_DIR . "chat_view.inc.php";
require BASE_DIR . "friends.inc.php";
require BASE_DIR . "../Includes/sessionconfig.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/picsandicons/favicon.png">
    <link rel="stylesheet" href="assets/chat.css">
    <title>Unigram | Chat</title>
</head>

<body>

    <div id="filepreview">

        <nav id="returnnav">
            <img src="./assets/picsandicons/cross-circle-svgrepo-com.svg" alt="" id="returnfromfilepreview">
        </nav>

        <section id="filepreviewbody">
            <div id="fileholder">
                <img src="./assets/UserPics/userDefaultProfile.png" alt="Photo Previewer" id="imagePreview">
            </div>
        </section>

        <form id="submitcontainer" enctype="multipart/form-data">
            <label for="uploadphoto" id="uploadphotobutton">Choose Photos</label>
            <input type="file" id="uploadphoto" name="photo" onchange="goToPreviewPage()" style="display: none;">

            <div id="next">
                <label for="tumapicha">
                    <img src="./assets/picsandicons/send-1-svgrepo-com.svg" alt="" id="submitfile">
                </label>
                <input type="submit" id="tumapicha" style="display: none;">
            </div>
        </form>

    </div>

    <div class="left">
        <nav id="nav">
            <img src="<?php if (isset($_SESSION["fileDestination"])) {
                            echo $_SESSION["fileDestination"];
                        } else {
                            echo './assets/UserPics/user.png';
                        } ?>" alt="" class="myprofpic">
            <div class="nextnav">
                <img src="assets/picsandicons/new message.svg" alt="new text" class="creatchat">
                <img src="assets/picsandicons/moon-sleep-svgrepo-com.svg" alt="new text" id="changemode">
                <!-- <img src="assets/picsandicons/sun-svgrepo-com.svg" alt="new text" id="changemodetolight" style="display: none;"> -->
                <i class="fa-solid fa-ellipsis-vertical" id="ul"></i>
            </div>
        </nav>
        <div id="search">
            <div id="innersearch">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" placeholder="Search A Chat" id="convosearch">
            </div>
        </div>
        <div id="chats">
            <div class="tempo">
                <p>Newly Created Chats will be displayed here</p>
                <h1></h1>
                <h2></h2>
                <h3></h3>
            </div>
            <div class="chatslist"></div>
        </div>
    </div>
    </div>

    <div class="right">

        <section id="activechat">


            <div id="activechatspace">

                <div class="chatnav">
                    <div class="chatnavheader">
                        <img src="./assets/UserPics/userDefaultProfile.png" alt="" class="friendprof">
                        <p class="friendname">Username</p>
                    </div>
                    <div class="nextchatnav">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </div>
                <div class="messagespace">

                    <!-- <div class="incomingmultmedia">
                        <div class="incomingmultimediacontainer">
                            <img class="actualincomingmultmedia" src="./assets/picsandicons/avatar.jpg">
                        </div>
                    </div>

                    <div class="outgoingmultmedia">
                        <div class="outgoingmultimediacontainer">
                            <img class="actualoutgoingmultmedia" src="./assets/picsandicons/UnigramTheme03.png">
                        </div>
                    </div> -->

                </div>

                <!-- <section>


                </section> -->

                <div class="chatspace">
                    <!-- <div id="fileuploaderdropdown"> -->
                    <!-- <form id="photoform" enctype="multipart/form-data" method="POST">
                            <label for="uploadphoto">Photos</label>
                            <input type="file" id="uploadphoto" name="photo" onchange="goToPreviewPage()" style="display: none;">
                        </form> -->

                    <!-- <form id="documentform" enctype="multipart/form-data">
                            <label for="uploaddocument">Document</label>
                            <input type="file" id="uploaddocument" name="document" style="display: none;">
                        </form>

                        <form id="videoform" enctype="multipart/form-data">
                            <label for="uploadvideo">Video</label>
                            <input type="file" id="uploadvideo" name="video" style="display: none;">
                        </form> -->
                    <!-- </div> -->

                    <img src="assets/picsandicons/smile-circle-svgrepo-com.svg" alt="emoji" class="receiverprof">
                    <img src="./assets/picsandicons/plus-svgrepo-com.svg" alt="" id="fileuploader">



                    <div id="sendtextcontainer">
                        <input type="text" placeholder="Type a message" id="textInput">
                        <label for="sendbuton"><img role="send message" src="./assets//picsandicons/send-1-svgrepo-com.svg" alt="sendicon" id="sendicon"></label>
                        <input type="submit" id="sendbuton">
                    </div>

                </div>
            </div>

            <div id="noactivechat">
                <div class="insidenoactive">
                    <img src="assets/picsandicons/favicon.png" alt="">
                    <h1>Unigram</h1>
                    <p>Unigram makes it easy and fun to stay close to your favorite people.</p>
                    <button type="button" class="creatchat">New Chat</button>

                </div>
            </div>



        </section>
        <!-- 
        <section id="friendrequests">
            <div id="requesthead">
                <h1>Requests</h1>
                <i class="fa-solid fa-arrow-right" id="requestlist"></i>
            </div>
            <div id="requesttype">
                <div id="sentRequests">
                    <div id="Requestsheader">
                        <h2>Sent/Pending Request</h2>
                    </div>
                    <div id="sentrequestlist">

                        <div class="friendcontainer" data-username="yasri">
                            <div class="requestprof">
                                <img src="assets/UserPics/6509596e919722.41231379.jpg" class="requestphoto">
                                <div class="req-details">
                                    <h3 class="req-jina">yasri</h3>
                                    <p class="req-friendbio">yasri</p>
                                </div>
                            </div>
                            <div class="req-leftprof">
                                <button class="req-cancel" data-user-id="2">Cancel Request</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="allfriendRequests">
                    <div id="Requestsheader">
                        <h2>Friend Requests</h2>
                    </div>
                    <div id="friendrequestlist">
                        <div class="friendcontainer" data-username="yasri">
                            <div class="requestprof">
                                <img src="assets/UserPics/6509596e919722.41231379.jpg" class="requestphoto">
                                <div class="req-details">
                                    <h3 class="req-jina">yasri</h3>
                                    <p class="req-friendbio">yasri</p>
                                </div>
                            </div>
                            <div class="req-leftprof">
                                <button class="req-accepts" data-user-id="2">Accept</button>
                                <button class="req-deny" data-user-id="2">Deny</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section> -->

    </div>




    <!-- ****************Small and medium containers for navigation and changes makins************************ -->
    <div id="newchat">

        <div id="header">
            <i class="fa-solid fa-arrow-left" id="chatlist"></i>
            <p>Create New Chat</p>
        </div>

        <div id="usernav">
            <div class="innerusernav">
                <i class="fa-solid fa-arrow-left" id="fsearchreturn"></i>
                <input type="search" placeholder="Search Friends" id="friendsearch">
            </div>
        </div>

        <div id="friendsearchresult">
            <?php displayuserprof($users) ?>
        </div>

        <div id="users">
            <h2>Your Friends</h2>
            <hr>
            <div id="userfriendlist">



            </div>
        </div>

    </div>


    <!-- Also this is by default not displayed untill an event occur which is caused when a user click the three dotes on the nav bar of left div -->
    <div id="unorderd">
        <ul>
            <li>New Group</li>
            <li>Select Chats</li>
            <li class="settings">Settings</li>
            <li class="logoutform">Log Out</li>
        </ul>
    </div>

    <!-- This is setting form that is displayed only when a user choose to go to settings form and click setting within unorder small form  -->
    <div id="settings">
        <div id="sethead">
            <i class="fa-solid fa-arrow-left" id="chatlist"></i>
            <h1>Settings</h1>
        </div>

        <div id="setnav">
            <div class="innersetnav">
                <i class="fa-solid fa-arrow-left"></i>
                <input type="search" placeholder="Search Settings">
            </div>
        </div>


        <div id="setlist">

            <div id="setprof">
                <img src="<?php if (isset($_SESSION["fileDestination"])) {
                                echo $_SESSION["fileDestination"];
                            } else {
                                echo './assets/UserPics/user.png';
                            } ?>" alt="" class="myprofpic">
                <div>
                    <h1 id="username"><?php displayusername() ?></h1>
                    <p id="bio"><?php displaybio() ?></p>
                </div>
            </div>


            <ul>
                <li>Notification</li>
                <li>Theme</li>
                <li>Wallpaper</li>
                <li>Request Account Info</li>
                <li>Help</li>
            </ul>

            <div id="buttdiv">
                <button type="button" class="logoutform">Log Out</button>
            </div>
        </div>
    </div>

    <!-- This is profile form that is displayed only when a user choose to go to profile  -->

    <div id="profile">

        <div id="profhead">
            <i class="fa-solid fa-arrow-left" id="chatlist"></i>
            <p>Profile</p>
        </div>

        <div id="profpicture">
            <div id="userprofile">
                <img src="<?php if (isset($_SESSION["fileDestination"])) {
                                echo $_SESSION["fileDestination"];
                            } else {
                                echo './assets/UserPics/user.png';
                            } ?>" alt="" id="userprofileimage">
                <div id="topprofdiv">
                    <i class="fa-solid fa-camera"></i>
                    <p>CHANGE <br> PROFILE PICTURE</p>
                </div>
            </div>

            <div id="topprof">
                <form enctype="multipart/form-data" id="changeprof">
                    <div id="kichwa">
                        <i class="fa-solid fa-arrow-left" id="return"></i>
                        <h2 id="title">Now Customize Your Profile</h2>
                    </div>
                    <div id="profcontainer">
                        <!-- <p class="explainingtext">In order to log in you need a unique username</p> -->
                        <div id="proferrorcontainer">

                        </div>
                        <!-- 
                        <section id="profname">
                            <label for="user name" id="biolabel">Biograph</label>
                            <input type="text" name="bio" placeholder="Write short bio bout yourself" autocomplete="off">
                        </section> -->

                        <section class="profcustom">
                            <div id="profpic"><img src="./assets/UserPics/userDefaultProfile.png" alt="" id="chosingprof"></div>
                            <div id="buttons">
                                <label for="chooseprof" id="fileLabel">Change Profile</label>
                                <input type="file" name="file" id="chooseprof" onchange="displaySelectedImage()">
                                <label for="kusanya" id="kusanyalabel">Next</label>
                                <input type="submit" name="kusanya" id="kusanya">
                            </div>
                        </section>
                    </div>


                </form>
            </div>

            <!--  -->
            <!--  -->
            <!--  -->
            <!--  -->
            <!--  -->
            <div id="usernametopprof">
                <form enctype="multipart/form-data" id="changeusername">
                    <div id="kichwa">
                        <i class="fa-solid fa-arrow-left" id="rudi"></i>
                        <h2 id="title">Now Customize Your Profile</h2>
                    </div>
                    <div id="profcontainer">
                        <div id="proferrorcontainer">

                        </div>
                        <section id="profname">
                            <label for="user name" id="usernamelabel">Change UserName</label>
                            <input type="text" name="customusername" placeholder="Choose a Unique username" autocomplete="off">
                        </section>

                        <div id="buttons">
                            <label for="kusanyausername" id="kusanyalabel">Next</label>
                            <input type="submit" name="kusanyausername" id="kusanyausername" style="display: none;">
                        </div>
                    </div>


                </form>
            </div>

            <div id="biotopprof">
                <form enctype="multipart/form-data" id="changeuserbio">
                    <div id="kichwa">
                        <i class="fa-solid fa-arrow-left" id="rudi"></i>
                        <h2 id="title">Now Customize Your Profile</h2>
                    </div>
                    <div id="profcontainer">
                        <div id="proferrorcontainer">

                        </div>
                        <section id="profname">
                            <label for="user name" id="biolabel">Change Biograph</label>
                            <input type="text" name="custombio" placeholder="Write short bio bout yourself" autocomplete="off">
                        </section>

                        <div id="buttons">
                            <label for="kusanyabio" id="kusanyalabel">Next</label>
                            <input type="submit" name="kusanyabio" id="kusanyabio" style="display: none;">
                        </div>

                    </div>


                </form>
            </div>
        </div>

        <div id="name-bio">
            <div id="name">
                <div>
                    <p>Your Username</p>
                    <h1><?php displayusername() ?></h1>
                </div>
                <i class="fa-solid fa-pen" id="changeyourusername"></i>
            </div>
            <div id="bio">
                <div>
                    <p>Your Bio</p>
                    <h1><?php displaybio() ?></h1>
                </div>
                <i class="fa-solid fa-pen" id="changeyourbio"></i>
            </div>
        </div>
    </div>

    <form action="login_view.inc.php" method="Post" id="logoutform">

        <div id="logoutdiv">
            <div id="diva">
                <h1>Unigram</h1>
                <p>Are You Sure You Want To Log Out?</p>
            </div>
            <div id="divb">
                <button type="button" name="logout">Yes<?php ?></button>
                <button type="button" id="nostay">No</button>
            </div>
        </div>

    </form>

    <script src="../JS/nav.js"></script>
    <script src="../JS/friends.js"></script>
    <script src="../JS/convo.js"></script>
    <script src="../JS/chat.js"></script>
    <script src="../JS//multimedia.js"></script>
    <script src="../JS/customProf.js"></script>
</body>

</html>