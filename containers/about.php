<?php include_once "../components/navbar.php" ?>
<style>
    section::before {
        content: '';
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        background-image: url(../assets/fhd_city\ image.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        opacity: .5;
    }

    section {
        display: flex;
        align-items: center;
        flex-direction: column;
        font-size: 20px;
        margin-top: 80px;
    }

    section::after {
        content: "";
        position: absolute;
        height: 100%;
        width: 100%;
        bottom: 0;
        z-index: -1;
        backdrop-filter: blur(8px);
    }

    .container {
        width: 80vw;
        margin-top: 6vh;
        text-align: center;
    }
</style>

<hr>
<section>
    <div class="container" style="overflow: auto;">
        <h1>Welcome to Blog express!</h1><br>
        <p>Welcome to our blog! We are a team of passionate writers who love to share our thoughts, insights, and experiences with the world. Our goal is to create a platform where people can come to learn, grow, and be inspired.
            <br><br>
            We believe that everyone has a story to tell and a unique perspective to share. That's why we welcome guest contributors who bring their own voices and expertise to our pages.
            <br><br>
            Our topics cover a wide range of interests, including lifestyle, travel, health and wellness, personal development, and much more. We strive to provide high-quality, informative, and engaging content that resonates with our readers.
            <br><br>
            Thank you for joining us on this journey. We hope you find our blog informative, entertaining, and inspiring. If you have any questions or feedback, please don't hesitate to reach out to us.
        </p>
    </div>
</section>
<script>
    let position = window.getComputedStyle(
        document.querySelector('section'), ':before'
    ).getPropertyValue('background-size');
    console.log(position);
    let hvColor = window.getComputedStyle(
        document.querySelector('section'), ':hover'
    ).getPropertyValue('color');
    console.log(hvColor);
</script>