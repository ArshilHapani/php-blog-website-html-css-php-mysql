<?php include_once "../components/navbar.php"; ?>
<link rel="stylesheet" href="./styles/homePageStyle.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Amarante&family=Arya&display=swap');

    .all-blogs-parent-wrapper {
        padding-top: 70px;
    }

    .home-container-heading-text {
        font-size: 10vh;
        text-align: center;
        margin-top: 3rem;
        font-family: 'Amarante', cursive;
    }

    .card-container-home-page {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: space-evenly;
        width: 100%;
    }

    .card-container-home-page .custom-blog-container-card-infos {
        display: flex;
        flex-direction: column;
        width: 25rem;
        margin: 15px 0;
        background-color: #fff;
    }

    .card-container-home-page .custom-blog-container-card-infos img {
        width: 25rem;
        height: 16rem;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .card-container-home-page .custom-blog-container-card-infos a {
        transition: .2s ease-in;
    }

    .content-container-card-blog {
        display: flex;
        flex-direction: column;
        gap: 3px;
        padding: 14px;
    }

    .content-container-card-blog>p {
        font-size: 16px;
        font-weight: 500;
        font-family: 'Arya', sans-serif;
    }


    .content-container-card-blog-sub-content {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin: 10px 0;
    }

    .content-container-card-blog-sub-content>p {
        font-size: 10px;
        width: 60%;
    }

    .content-container-card-blog-sub-content .date-text-p {
        width: 25%;
    }

    .blog-by-section-container {
        display: flex;
        border-top: 1px lightgray solid;
        align-items: center;
        padding: 10px 20px;

    }


    .custom-blog-container-card-infos {
        border-radius: 10px;
        transition: .2s ease-in;
    }

    .custom-blog-container-card-infos:hover {
        box-shadow: 8px 2px 32px -2px rgba(0, 0, 0, 0.25);
    }

    .card-container-home-page .custom-blog-container-card-infos img:hover {
        filter: blur(2px);
    }

    .anchor-container-overlay:hover {
        backdrop-filter: blur(2px);
    }

    .anchor-container-overlay {
        position: relative;
    }

    .anchor-container-overlay .content:hover {
        opacity: 1;
    }

    .anchor-container-overlay .content {
        transition: all .2s ease;
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.5);
        color: #f1f1f1;
        width: 100%;
        padding: 20px;
        opacity: 0;
    }

    .anchor-container-overlay .content a:link {
        text-decoration: none !important;
    }

    .anchor-container-overlay .content button {
        background-color: transparent;
        border-style: none;
        cursor: pointer;
        color: #fff;
    }
</style>
<?php
$username = $_COOKIE["blog_user"];
if (sha1($username) !== $_COOKIE["blog_hash"]) {
    header("location:../forms/signUp.php?verify_flag=false");
    return;
} else {
    $searchQuery = $_GET["searchQuery"];
    $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
    $query = mysqli_query($conn, "select * from blogs where blogTitle 
    or blogDescription LIKE '%$searchQuery%';");
    $searchCountTerm = mysqli_num_rows($query);
}
?>
<section class="all-blogs-parent-wrapper">
    <div>
        <h1 class="home-container-heading-text"><?php echo  "$searchCountTerm result found for search query $searchQuery " ?></h1>
    </div>
    <div class="card-container-home-page">
        <!-- custom card container -->
        <?php
        while ($row = mysqli_fetch_array($query)) {
            $image = "data:image/jpeg;base64," . base64_encode($row["image_thumbnail"]);
        ?>
            <div class="custom-blog-container-card-infos">
                <!-- Card content container -->
                <div href="#" class="anchor-container-overlay">
                    <img class="image-overlay-bg-effect" src="<?php echo $image ?>" alt="sample test">
                    <form action="./readBlog.php" method="post">
                        <div class="content">
                            <input type="hidden" name="blogTitle" value="<?php echo $row["blogTitle"]; ?>">
                            <input type="hidden" name="blogDescription" value="<?php echo $row["blogDescription"]; ?>">
                            <button type="submit">
                                <h1>Read blog</h1>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="content-container-card-blog">
                    <p>
                        <?php
                        if (strlen(urldecode($row["blogTitle"])) > 25) {
                            echo shorten_string($row["blogTitle"], 25);
                        } else {
                            echo $row["blogTitle"];
                        }
                        ?>
                    </p>
                    <div class="content-container-card-blog-sub-content">
                        <p>
                            <?php
                            if (strlen($row["blogDescription"]) > 60) {
                                echo shorten_string(urldecode($row["blogDescription"]), 60);
                            } else {
                                echo $row["blogDescription"];
                            }
                            ?>
                        </p>
                        <p class="date-text-p"><?php echo $row["published_at"]; ?></p>
                    </div>
                </div>
                <div class="blog-by-section-container">
                    <p style="font-size: 12px;font-family: 'Amarante', cursive;">By <b><?php echo $row["_username"]; ?></b></p>
                </div>
            </div>
        <?php  }
        ?>
    </div>
</section>



<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php
function shorten_string($string, $max_length = 35, $suffix = '...')
{
    if (strlen($string) > $max_length) {
        $string = substr($string, 0, $max_length - strlen($suffix)) . $suffix;
    }
    return $string;
}
?>