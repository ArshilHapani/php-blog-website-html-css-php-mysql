<<<<<<< Updated upstream
<?php include_once "../components/navbar.php";
if (isset($_COOKIE["blog_user"]) && isset($_COOKIE["blog_hash"])) {
    if (sha1($_COOKIE['blog_user']) !== $_COOKIE["blog_hash"]) {
        header("location:./forms/signUp.php?verify_flag=false");
        return;
    } else {
        $username = $_COOKIE['blog_user'];
        $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
        $query = mysqli_query($conn, "select * from user where username = '$username';");
        $row = mysqli_fetch_array($query);
    }
} else {
    header("location:./forms/signUp.php?verify_flag=false");
}

if (isset($_GET["emailUpdateFlag"])) {
    echo "<script>alert('Email updated!')</script>";
}
if (isset($_GET["blogFlag"])) {
    echo "<script>alert('Blog uploaded!')</script>";
}
?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

    .profile-cards {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 50px;
        margin: 30px;
    }

    .profile-cards .card {
        margin-top: 20vh;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 700px;
        height: 350px;
        position: relative;
        color: #2d2d2d;
        flex-wrap: wrap;
        background-color: #fff;
        letter-spacing: 1px;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .profile-cards .card .card-description {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        gap: 20px;
        padding: 40px;
        width: auto;
        height: 100%;
    }

    .profile-cards .card .card-description .card-description-title {
        color: black;
        font-size: 18px;
    }

    .profile-cards .card .card-description .card-description-profession {
        display: block;
        font-size: 16px;
    }

    .profile-cards .card .card-description .card-description-company {
        display: block;
        font-size: 14px;
        cursor: pointer;
    }

    .profile-cards .card .card-description .card-description-company:hover {
        text-decoration: underline;
    }

    .profile-cards .card .card-description .card-description-social {
        position: absolute;
        bottom: 40px;
    }

    .profile-cards .card .card-description .card-description-social button,
    .btn-black-primary {
        padding: 8px 10px;
        background-color: white;
        border: 1px solid black;
        border-radius: 8px;
        transition: 0.2s ease-in;
        cursor: pointer;
    }

    .profile-cards .card .card-description .card-description-social button:hover,
    .btn-black-primary:hover {
        background-color: black;
        color: white;
    }

    .profile-cards .card .card-description .card-description-social .card-description-social-follow {
        display: block;
        margin-bottom: 8px;
        color: #555572;
        font-size: 14px;
    }

    .profile-cards .card .card-description .card-description-social ul {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .profile-cards .card .card-description .card-description-social ul li {
        list-style-type: none;
    }

    .profile-cards .card .card-description .card-description-social ul li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        color: #121212;
        border-radius: 50%;
        box-shadow: 6px 6px 12px #97c3c4, -6px -6px 12px #cdffff;
        transition: all 0.4s;
    }

    .profile-cards .card .card-description .card-description-social ul li a:hover {
        color: white;
        transform: translate(0, -7px);
    }

    .profile-cards .card .card-description .card-description-social ul li a svg {
        width: calc(100% - 15px);
        height: calc(100% - 15px);
    }

    .profile-cards .card .card-description .card-description-social ul li:nth-child(1) a:hover {
        background-color: #1da1f2;
    }

    .profile-cards .card .card-description .card-description-social ul li:nth-child(2) a:hover {
        background-color: #3f729b;
    }

    .profile-cards .card .card-description .card-description-social ul li:nth-child(3) a:hover {
        background-color: #00405d;
    }

    .profile-cards .card .card-description .card-description-social ul li:nth-child(4) a:hover {
        background-color: #0a66c2;
    }

    .profile-cards .card .card-image {
        width: 250px;
        height: 100%;
        object-fit: cover;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        border-radius: 10px;
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 10px;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s;
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0;
        }

        to {
            top: 0;
            opacity: 1;
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0;
        }

        to {
            top: 0;
            opacity: 1;
        }
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        border-radius: 10px;
        background-color: #fff;
        color: #0a66c2;
    }

    .modal-body {
        padding: 2px 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin: 30px 0;
    }

    .modal-body input[type="text"],
    .modal-body .textarea {
        padding: 10px 7px;
        border-radius: 8px;
        border: 1px solid black;
        resize: none;
    }

    .modal-body input[type="text"]:focus,
    .modal-body .textarea:focus {
        outline: 1px #0a66c2 solid;
    }
</style>
<div style="overflow-x: hidden;">
    <div class="profile-cards">

        <div class="card card-1">

            <div class="card-description">

                <h2 class="card-description-title"><?php echo isset($row["username"]) ? $row["username"]  : "Unverified user"  ?></h2>

                <span class="card-description-profession"><?php echo isset($row["email"]) ? $row["email"]  : "Unverified user"  ?></span>

                <div class="card-description-social">
                    <button title="Create Blog" id="myBtn">Create Blog</button>
                    <button id="myBtn1">Edit email</button>
                    <a href="http://localhost/PHP_3361603_Sem_6/blog_website/containers/myBlogs.php"><button>My Blogs</button></a>
                    <form action="../functions/handleSignOut.php" method="get">
                        <button type="submit" style="margin-top: 10px;">Sign Out</button>
                    </form>
                </div>

            </div>

            <img src="https://source.unsplash.com/random/1250x760?blogs" class="card-image">

        </div>

    </div>

</div>

<!-- Add Blog Modal -->
<div id="myModal" class="modal">
    <!-- The Modal -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Add Blog</h2>
        </div>
        <form action="../functions/addBlog.php" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                <input type="text" name="blog_title" placeholder="Enter Blog Title" required> <br>
                <textarea class="textarea" name="blog_description" placeholder="Enter Blog Description" required rows="10" cols="10"></textarea>
                <input type="file" accept="image/*" name="blog_image" class="btn-black-primary" required />
                <button type="submit" class="btn-black-primary">Add</button>
            </div>
        </form>
    </div>
</div>
<!-- Edit profile modal -->
<div id="myModal1" class="modal">
    <!-- The Modal -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Edit Email</h2>
        </div>
        <form action="../functions/editEmail.php" method="post">
            <div class="modal-body">
                <input type="text" name="email" placeholder="Enter email" value="<?php echo $row["email"] ?>"> <br>
                <input type="hidden" name="user" value="<?php echo $_COOKIE["blog_user"]; ?>"> <br>
                <button class="btn-black-primary" type="submit">Update email</button>
            </div>
        </form>
    </div>
</div>
<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var modal1 = document.getElementById("myModal1");
    var btn1 = document.getElementById("myBtn1");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
    btn1.onclick = function() {
        modal1.style.display = "block";
    }
=======
<?php include_once "../components/navbar.php";
if (isset($_COOKIE["blog_user"]) && isset($_COOKIE["blog_hash"])) {
    if (sha1($_COOKIE['blog_user']) !== $_COOKIE["blog_hash"]) {
        header("location:./forms/signUp.php?verify_flag=false");
        return;
    } else {
        $username = $_COOKIE['blog_user'];
        $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
        $query = mysqli_query($conn, "select * from user where username = '$username';");
        $row = mysqli_fetch_array($query);
    }
} else {
    header("location:./forms/signUp.php?verify_flag=false");
}

if (isset($_GET["emailUpdateFlag"])) {
    echo "<script>alert('Email updated!')</script>";
}
if (isset($_GET["blogFlag"])) {
    echo "<script>alert('Blog uploaded!')</script>";
}
?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

    .profile-cards {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 50px;
        margin: 30px;
    }

    .profile-cards .card {
        margin-top: 20vh;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 700px;
        height: 350px;
        position: relative;
        color: #2d2d2d;
        flex-wrap: wrap;
        background-color: #fff;
        letter-spacing: 1px;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .profile-cards .card .card-description {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        gap: 20px;
        padding: 40px;
        width: auto;
        height: 100%;
    }

    .profile-cards .card .card-description .card-description-title {
        color: black;
        font-size: 18px;
    }

    .profile-cards .card .card-description .card-description-profession {
        display: block;
        font-size: 16px;
    }

    .profile-cards .card .card-description .card-description-company {
        display: block;
        font-size: 14px;
        cursor: pointer;
    }

    .profile-cards .card .card-description .card-description-company:hover {
        text-decoration: underline;
    }

    .profile-cards .card .card-description .card-description-social {
        position: absolute;
        bottom: 40px;
    }

    .profile-cards .card .card-description .card-description-social button,
    .btn-black-primary {
        padding: 8px 10px;
        background-color: white;
        border: 1px solid black;
        border-radius: 8px;
        transition: 0.2s ease-in;
        cursor: pointer;
    }

    .profile-cards .card .card-description .card-description-social button:hover,
    .btn-black-primary:hover {
        background-color: black;
        color: white;
    }

    .profile-cards .card .card-description .card-description-social .card-description-social-follow {
        display: block;
        margin-bottom: 8px;
        color: #555572;
        font-size: 14px;
    }

    .profile-cards .card .card-description .card-description-social ul {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .profile-cards .card .card-description .card-description-social ul li {
        list-style-type: none;
    }

    .profile-cards .card .card-description .card-description-social ul li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        color: #121212;
        border-radius: 50%;
        box-shadow: 6px 6px 12px #97c3c4, -6px -6px 12px #cdffff;
        transition: all 0.4s;
    }

    .profile-cards .card .card-description .card-description-social ul li a:hover {
        color: white;
        transform: translate(0, -7px);
    }

    .profile-cards .card .card-description .card-description-social ul li a svg {
        width: calc(100% - 15px);
        height: calc(100% - 15px);
    }

    .profile-cards .card .card-description .card-description-social ul li:nth-child(1) a:hover {
        background-color: #1da1f2;
    }

    .profile-cards .card .card-description .card-description-social ul li:nth-child(2) a:hover {
        background-color: #3f729b;
    }

    .profile-cards .card .card-description .card-description-social ul li:nth-child(3) a:hover {
        background-color: #00405d;
    }

    .profile-cards .card .card-description .card-description-social ul li:nth-child(4) a:hover {
        background-color: #0a66c2;
    }

    .profile-cards .card .card-image {
        width: 250px;
        height: 100%;
        object-fit: cover;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        border-radius: 10px;
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 10px;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s;
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0;
        }

        to {
            top: 0;
            opacity: 1;
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0;
        }

        to {
            top: 0;
            opacity: 1;
        }
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        border-radius: 10px;
        background-color: #fff;
        color: #0a66c2;
    }

    .modal-body {
        padding: 2px 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin: 30px 0;
    }

    .modal-body input[type="text"],
    .modal-body .textarea {
        padding: 10px 7px;
        border-radius: 8px;
        border: 1px solid black;
        resize: none;
    }

    .modal-body input[type="text"]:focus,
    .modal-body .textarea:focus {
        outline: 1px #0a66c2 solid;
    }
</style>
<div style="overflow-x: hidden;">
    <div class="profile-cards">

        <div class="card card-1">

            <div class="card-description">

                <h2 class="card-description-title"><?php echo isset($row["username"]) ? $row["username"]  : "Unverified user"  ?></h2>

                <span class="card-description-profession"><?php echo isset($row["email"]) ? $row["email"]  : "Unverified user"  ?></span>

                <div class="card-description-social">
                    <button title="Create Blog" id="myBtn">Create Blog</button>
                    <button id="myBtn1">Edit email</button>
                    <a href="http://localhost/PHP_3361603_Sem_6/blog_website/containers/myBlogs.php"><button>My Blogs</button></a>
                    <form action="../functions/handleSignOut.php" method="get">
                        <button type="submit" style="margin-top: 10px;">Sign Out</button>
                    </form>
                </div>

            </div>

            <img src="https://source.unsplash.com/random/1250x760?blogs" class="card-image">

        </div>

    </div>

</div>

<!-- Add Blog Modal -->
<div id="myModal" class="modal">
    <!-- The Modal -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Add Blog</h2>
        </div>
        <form action="../functions/addBlog.php" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                <input type="text" name="blog_title" placeholder="Enter Blog Title" required> <br>
                <textarea class="textarea" name="blog_description" placeholder="Enter Blog Description" required rows="10" cols="10"></textarea>
                <input type="file" accept="image/*" name="blog_image" class="btn-black-primary" required />
                <button type="submit" class="btn-black-primary">Add</button>
            </div>
        </form>
    </div>
</div>
<!-- Edit profile modal -->
<div id="myModal1" class="modal">
    <!-- The Modal -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Edit Email</h2>
        </div>
        <form action="../functions/editEmail.php" method="post">
            <div class="modal-body">
                <input type="text" name="email" placeholder="Enter email" value="<?php echo $row["email"] ?>"> <br>
                <input type="hidden" name="user" value="<?php echo $_COOKIE["blog_user"]; ?>"> <br>
                <button class="btn-black-primary" type="submit">Update email</button>
            </div>
        </form>
    </div>
</div>
<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var modal1 = document.getElementById("myModal1");
    var btn1 = document.getElementById("myBtn1");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
    btn1.onclick = function() {
        modal1.style.display = "block";
    }
>>>>>>> Stashed changes
</script>