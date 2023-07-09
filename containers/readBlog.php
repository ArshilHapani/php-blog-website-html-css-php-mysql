<?php include_once "../components/navbar.php"; ?>
<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700");
    @import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");

    .container-blog-reading-page {
        display: grid;
        grid-template-columns: 4rem 3fr 1fr 2rem;
        grid-column-gap: 2rem;
        padding-top: 18vh;
        background-color: rgba(237, 246, 249);
    }

    .header-blog-reading-page {
        grid-column: 2 / 5;
    }

    .heading-blog-reading-page {
        font-family: Montserrat, sans-serif;
        margin: 10px 0;
    }

    .header-blog-reading-page .subheading-blog-reading-page {
        text-transform: uppercase;
        letter-spacing: 0.1rem;
        font-size: smaller;
        color: #0a66c2;
    }

    .content-blog-reading-page {
        grid-column: 2 / 3;
        text-align: justify;
        font-size: 1.1rem;
        line-height: 1.4;
    }

    .content-blog-reading-page .poster-image {
        width: 100%;
        height: 40%;
        object-fit: cover;
        border-radius: 10px;
    }

    .aside .heading-blog-reading-page {
        margin: 0;
        font-weight: 600;
    }

    .footer {
        grid-column: 1 / 5;
        background-color: #0a66c2;
        padding: 0.7rem 1rem;
        margin-top: 3rem;
        text-align: right;
    }

    .footer .name-link {
        color: #FFFFFF;
        text-decoration: none;
    }

    @media only screen and (max-width: 600px) {
        .container-blog-reading-page {
            grid-template-columns: 2rem 3fr 1fr 2rem;
        }

        .content-blog-reading-page {
            grid-column: 2 / 4;
        }

        .aside {
            grid-column: 2 / 4;
        }
    }

    .card {
        height: 5rem;
        display: flex;
        align-items: center;
        text-transform: capitalize;
        margin: 1rem 0;
        cursor: pointer;
        background-color: transparent;
        border-style: none;
    }

    .card img {
        height: 100%;
        width: 40%;
        margin-right: 0.5rem;
        border-radius: 10px;
    }

    .card p {
        margin: 0;
    }

    .card .title {
        font-size: 0.8rem;
    }

    .card .author {
        font-size: small;
    }
</style>

<?php
$blogTitle = $_POST["blogTitle"];
$blogDescription = $_POST["blogDescription"];
$username = $_COOKIE["blog_user"];
if (sha1($username) !== $_COOKIE["blog_hash"]) {
    header("location:../forms/signUp.php?verify_flag=false");
    return;
} else {
    $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
    $query = mysqli_query($conn, "select * from blogs where blogTitle='$blogTitle' and blogDescription='$blogDescription';");
    $row = mysqli_fetch_array($query);
    $image = "data:image/jpeg;base64," . base64_encode($row["image_thumbnail"]);
}
?>
<main class="container-blog-reading-page">
    <header-blog-reading-page class="header-blog-reading-page">
        <h1 class="heading-blog-reading-page"><?php echo urldecode($blogTitle); ?></h1>
    </header-blog-reading-page>
    <section class="content-blog-reading-page">
        <img src='<?php echo $image; ?>' alt='large-image' class="poster-image">
        <p style="margin: 20px 0; width: 70vw;"><?php echo urldecode($blogDescription); ?></p>
    </section>
    <aside class="aside">
        <h4 class="heading-blog-reading-page">Other Articles you might Enjoy</h4>
        <?php
        $rowQuery = mysqli_query($conn, "select * from blogs where blogTitle!='$blogTitle' and blogDescription!='$blogDescription'  LIMIT 0 ,3;");
        while ($recommendedCardsRecordRow = mysqli_fetch_array($rowQuery)) {
            $title = urldecode($recommendedCardsRecordRow["blogTitle"]);
            $author = urldecode($recommendedCardsRecordRow["_username"]);
            $image = "data:image/jpeg;base64," . base64_encode($recommendedCardsRecordRow["image_thumbnail"]);
        ?>
            <form action="./readBlog.php" method="post">
                <button class="card" type="submit">
                    <img src='<?php echo $image ?>'>
                    <div>
                        <p class="heading-blog-reading-page title"><?php echo shorten_string($title, 15) ?></p>
                        <p class="author"><b>By</b> <?php echo $author; ?></p>
                        <input type="hidden" name="blogTitle" value="<?php echo $title; ?>">
                        <input type="hidden" name="blogDescription" value="<?php echo $recommendedCardsRecordRow["blogDescription"]; ?>">
                    </div>
                </button>
            </form>

        <?php } ?>
    </aside>
    <footer class="footer">
        <a target="_blank" class="name-link">By <b><?php echo $row["_username"] ?></b></a>
    </footer>
</main>

<?php
function shorten_string($string, $max_length = 35, $suffix = '...')
{
    if (strlen($string) > $max_length) {
        $string = substr($string, 0, $max_length - strlen($suffix)) . $suffix;
    }
    return $string;
}
?>