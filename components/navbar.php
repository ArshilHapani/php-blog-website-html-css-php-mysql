<style>
    @import url("https:fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

    * {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        margin-bottom: 80px;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 80px;
        background-color: rgba(237, 246, 249, 0.8);
        padding: 20px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-sizing: 0 15px 15px rgba(0, 0, 0, 0.05);
        backdrop-filter: blur(10px);
        z-index: 1000000000000;
        box-shadow: 8px 2px 32px -2px rgba(0, 0, 0, 0.25);
    }

    .logo {
        color: #333;
        text-decoration: none;
        font-size: 1.5em;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    .group {
        display: flex;
        align-items: center;
    }

    header ul {
        position: relative;
        display: flex;
        gap: 30px;
    }

    header ul li {
        list-style: none;
    }

    header ul li a {
        position: relative;
        text-decoration: none;
        font-size: 1em;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 0.2em;
    }

    header ul li a::before {
        content: "";
        position: absolute;
        bottom: -2px;
        width: 100%;
        height: 2px;
        background-color: #333;
        transform: scaleX(0);
        transition: transform 0.5s ease-in-out;
        -webkit-transition: transform 0.5s ease-in-out;
        -moz-transition: transform 0.5s ease-in-out;
        -ms-transition: transform 0.5s ease-in-out;
        -o-transition: transform 0.5s ease-in-out;
        transform-origin: right;
        -webkit-transform: scaleX(0);
        -moz-transform: scaleX(0);
        -ms-transform: scaleX(0);
        -o-transform: scaleX(0);
    }

    header ul li a:hover::before {
        transform: scaleX(1);
        -webkit-transform: scaleX(1);
        -moz-transform: scaleX(1);
        -ms-transform: scaleX(1);
        -o-transform: scaleX(1);
        transform-origin: left;
    }

    header .search {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5em;
        z-index: 10;
        cursor: pointer;
    }

    .searchBox {
        position: absolute;
        right: -100%;
        width: 100%;
        height: 100%;
        display: flex;
        background-color: #fff;
        align-items: center;
        padding: 0 30px;
        transition: 0.5s ease-in-out;
        -webkit-transition: 0.5s ease-in-out;
        -moz-transition: 0.5s ease-in-out;
        -ms-transition: 0.5s ease-in-out;
        -o-transition: 0.5s ease-in-out;
    }

    .searchBox.active {
        right: 0;
    }

    .searchBox input {
        width: 100%;
        border: none;
        outline: none;
        height: 50px;
        font-size: 1.25em;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.5);
        color: #333;
    }

    #search-btn {
        position: relative;
        left: 30px;
        top: 2.5px;
        transition: 0.5s ease-in-out;
        -webkit-transition: 0.5s ease-in-out;
        -moz-transition: 0.5s ease-in-out;
        -ms-transition: 0.5s ease-in-out;
        -o-transition: 0.5s ease-in-out;
    }

    #search-btn.active {
        left: 0;
    }

    #close-btn {
        opacity: 0;
        visibility: hidden;
        scale: 0;
        transition: 0.5s;
        -webkit-transition: 0.5s;
        -moz-transition: 0.5s;
        -ms-transition: 0.5s;
        -o-transition: 0.5s;
    }

    #close-btn.active {
        opacity: 1;
        scale: 1;
        visibility: visible;
        transition: 0.5s;
        -webkit-transition: 0.5s;
        -moz-transition: 0.5s;
        -ms-transition: 0.5s;
        -o-transition: 0.5s;
    }

    .menu-toggle {
        position: relative;
        display: none;
    }

    @media (max-width: 768px) {
        #search-btn {
            left: 0;
        }

        .menu-toggle {
            position: absolute;
            display: block;
            font-size: 2em;
            cursor: pointer;
            z-index: 10;
            transform: translateX(30px);
            -webkit-transform: translateX(30px);
            -moz-transform: translateX(30px);
            -ms-transform: translateX(30px);
            -o-transform: translateX(30px);
        }

        header .navigation {
            position: absolute;
            opacity: 0;
            visibility: hidden;
            left: 100%;
        }

        header.open .navigation {
            opacity: 1;
            visibility: visible;
            left: 0;
            display: flex;
            flex-direction: column;
            background-color: #fff;
            width: 100%;
            height: calc(100vh - 80px);
            top: 80px;
            padding: 40px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        header.open .navigation li a {
            font-size: 1.25em;
        }

        .hide {
            display: none;
        }
    }
</style>
<header>
    <a href="http://localhost/PHP_3361603_Sem_6/blog_website/index.php" class="logo">Blog Express</a>
    <div class="group">
        <ul class="navigation">
            <li><a href="http://localhost/PHP_3361603_Sem_6/blog_website/index.php">Home</a></li>
            <li><a href="http://localhost/PHP_3361603_Sem_6/blog_website/containers/about.php">About</a></li>
            <li><a href="http://localhost/PHP_3361603_Sem_6/blog_website/containers/user.php">Account</a></li>
        </ul>
        <div class="search">
            <span class="icon">
                <ion-icon name="search-outline" id="search-btn"></ion-icon>
                <ion-icon name="close-outline" id="close-btn"></ion-icon>
            </span>
        </div>
        <ion-icon name="menu-outline" class="menu-toggle"></ion-icon>
    </div>
    <div class="searchBox">
        <form action="http://localhost/PHP_3361603_Sem_6/blog_website/containers/searchBlogs.php" method="get">
            <input type="text" placeholder="Search here..." name="searchQuery">
        </form>
    </div>
</header>
<script>
    let menuToggle = document.querySelector('.menu-toggle');
    let navigation = document.querySelector('.navigation');
    let header = document.querySelector('header');

    menuToggle.onclick = () => {
        header.classList.toggle('open');
        searchBox.classList.remove('active');
        closeBtn.classList.remove('active');
        searchBtn.classList.remove('active');
    }

    let searchBtn = document.getElementById('search-btn');
    let closeBtn = document.getElementById('close-btn');
    let searchBox = document.querySelector('.searchBox');
    searchBtn.onclick = () => {
        searchBox.classList.add('active');
        closeBtn.classList.add('active');
        searchBtn.classList.add('active');
        menuToggle.classList.add('hide');
        header.classList.remove('open');
    }
    closeBtn.onclick = () => {
        searchBox.classList.remove('active');
        closeBtn.classList.remove('active');
        searchBtn.classList.remove('active');
        menuToggle.classList.remove('hide');
    }
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>