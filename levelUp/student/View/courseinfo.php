<?php
$time = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="./resources/css/mystyles.css?v=<? $time; ?>">
    <link rel="stylesheet" href="./resources/css/root.css?v=<? $time; ?>"">

    <script type=" module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <?php require_once('./header.php') ?>

    <main>
        <!-- start of container  -->
        <div class="container">
            <div class="info">
                <div class="cards">
                    <img src="./resources/img/courseinfo/coursedetail.png" alt="" />
                    <div class="price">
                        <p class="is-size-5 has-text-weight-bold">20,000 ks</p>
                        <p class="is-size-5">100,000 ks</p>
                        <p class="is-size-5">80% off</p>
                    </div>
                    <div class="buttons">
                        <a href="#" class="button is-primary has-text-weight-semibold">Add to cart</a>
                        <a href="#" class="button is-primary is-outlined has-text-weight-semibold">Buy now</a>
                    </div>
                    <a class="wish">
                        <ion-icon name="heart-outline"></ion-icon>
                    </a>
                </div>
                <div class="details">
                    <p class="is-size-3 has-text-weight-bold">Compute Science and Software
                        Engineering</p>
                    <p class="is-size-5">Learn the most popular language to search your new career life </p>
                    <p class="is-size-5">
                        <ion-icon name="star" class="star"></ion-icon>4.6/5 (12,376) 15,328 students
                    </p>
                    <p class="is-size-5">Duration - 16 hours</p>
                    <p class="is-size-5 has-text-weight-semibold">Created By <a href="#">Michael Jordan</a></p>
                </div>
            </div>

            <div class="profit">
                <p class="is-size-4 has-text-weight-bold">What you will learn</p>
                <div class="lists">
                    <ul>
                        <li>
                            <ion-icon name="checkmark"></ion-icon>Learn the most popular language to search
                        </li>
                        <li>
                            <ion-icon name="checkmark"></ion-icon>Learn the most popular language to search
                        </li>
                        <li>
                            <ion-icon name="checkmark"></ion-icon>Learn the most popular language to search
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <ion-icon name="checkmark"></ion-icon>Learn the most popular language to search
                        </li>
                        <li>
                            <ion-icon name="checkmark"></ion-icon>Learn the most popular language to search
                        </li>
                    </ul>
                </div>
            </div>

            <div class="requirements">
                <p class="is-size-4 has-text-weight-bold">Requirements</p>
                <div class="lists">
                    <ul>
                        <li>
                            <ion-icon name="checkmark-circle-outline"></ion-icon>at least 4Gb ram or highter laptop
                        </li>
                        <li>
                            <ion-icon name="checkmark-circle-outline"></ion-icon> internet connection
                        </li>
                    </ul>
                </div>
            </div>

            <div class="description">
                <p class="is-size-4 has-text-weight-bold">Description</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut<br />
                    rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.
                    Curabitur tempor quis eros tempus lacinia. Nam<br /> bibendum pellentesque quam a convallis. Sed ut vulputate nisi. Integer in felis sed leo vestibulum venenatis. Suspendisse quis arcu sem. Aenean feugiat ex eu vestibulum vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices nibh. Mauris sit amet magna non ligula vestibulum eleifend. Nulla varius volutpat turpis sed lacinia. Nam eget mi in purus lobortis eleifend. Sed nec ante dictum sem condimentum ullamcorper quis venenatis nisi. Proin vitae facilisis nisi, ac posuere leo.
                    Nam pulvinar blandit velit, id<br /> condimentum diam faucibus at. Aliquam lacus nisi, sollicitudin at nisi nec, fermentum congue felis. Quisque mauris dolor, fringilla sed tincidunt ac, finibus non odio. Sed vitae mauris nec ante pretium finibus. Donec nisl neque, pharetra ac elit eu, faucibus aliquam ligula. Nullam dictum, tellus tincidunt tempor laoreet, nibh elit sollicitudin felis, eget feugiat sapien diam nec nisl. Aenean gravida turpis nisi, consequat dictum risus dapibus a. Duis felis ante, varius in neque eu, tempor suscipit sem. Maecenas ullamcorper gravida sem sit amet cursus. Etiam pulvinar purus vitae justo pharetra consequat. Mauris id mi ut arcu feugiat maximus. Mauris consequat tellus id tempus aliquet.
                    Vestibulum dictum ultrices elit a luctus.<br /> Sed in ante ut leo congue posuere at sit amet ligula. Pellentesque eget augue nec nisl sodales blandit sed et sem. Aenean quis finibus arcu, in hendrerit purus. Praesent ac aliquet lorem. Morbi feugiat aliquam ligula, et vestibulum ligula hendrerit vitae. Sed ex lorem, pulvinar sed auctor sit amet, molestie a nibh. Ut euismod nisl arcu, sed placerat nulla volutpat aliquet. Ut id convallis nisl. Ut mauris leo, lacinia sed elit id, sagittis rhoncus odio. Pellentesque sapien libero, lobortis a placerat et, malesuada sit amet dui. Nam sem sapien, congue eu rutrum nec, pellentesque eget ligula.
                </p>
            </div>

            <div class="coursefor">
                <p class="is-size-4 has-text-weight-bold">Who this course is for</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut
                </p>
            </div>
        </div>
        <!-- end of container -->
    </main>



    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="./resources/js/index.js"></script>
</body>

</html>