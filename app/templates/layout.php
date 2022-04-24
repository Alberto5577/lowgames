<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <title>LOWGAMES</title>
</head>

<body>
    <div class="window-content">
        <header>
            <div class="">
                <div class="row header">
                    <div class="col-3 col-sm-2">
                        <nav>
                            <div class="hamburger-menu">
                                <input id="menu__toggle" type="checkbox" />
                                <label class="menu__btn" for="menu__toggle">
                                    <span></span>
                                </label>
    
                                <ul class="menu__box">
    
                                    <li class="d-flex flex-row align-items-center ps-3 navLi">
                                        <a class="menu__item" href="">
                                            <img src="./img/casa.png" alt="" width="25px" height="25px">
                                            <a class="menu__item w-100" href="#">Home</a>
                                        </a>
                                    </li>
                                    <li class="d-flex flex-row align-items-center ps-3 navLi">
                                        <a class="menu__item" href="">
                                            <img src="./img/price-tag.png" alt="" width="25px" height="25px">
                                            <a class="menu__item w-100" href="#">Special offers</a>
                                        </a>
                                    </li>
                                    <li class="d-flex flex-row align-items-center ps-3 navLi">
                                        <a class="menu__item" href="">
                                            <img src="./img/trending.png" alt="" width="25px" height="25px">
                                            <a class="menu__item w-100" href="#">Trending games</a>
                                        </a>
                                    </li>
                                    <?php if($_SESSION["userLevel"] > 1):?>
                                    <li class="d-flex flex-row align-items-center ps-3 navLi">
                                        <a class="menu__item" href="">
                                        <img src="./img/wishlist.png" alt="" width="25px" height="25px">
                                        <a class="menu__item w-100" href="#">Whislist</a>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if($_SESSION["userLevel"] > 1):?>
                                    <li class="d-flex flex-row align-items-center ps-3 navLi">
                                        <a class="menu__item" href="">
                                            <img src="./img/user.png" alt="" width="25px" height="25px">
                                            <a class="menu__item w-100" href="#">My account</a>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-1 mt-5 d-none d-sm-block">
                        <a href="./templates/login.html"><img class="headerImg" src="./img/usuario.png" alt="" width="35px" height="35"></a>
                    </div>
                    <div class="col-2 mt-5 d-none d-sm-block">
                        <a href="./templates/register.html"><img class="headerImg" src="./img/editar.png" alt="" width="35" height="35"></a>
                    </div>
                    <div class="col-6 col-sm-4">
                        <a href="./index.html"><img src="./img/lowgames.png"></a>
                    </div>
                    <div class="col-1 mt-5 d-sm-none">
                        <a href="./templates/login.html"><img class="headerImg" src="./img/usuario.png" alt="" width="35" height="35"></a>
                    </div>
                    <div class="col-1 mt-5 d-sm-none">
                        <a href="./templates/register.html"><img class="headerImg" src="./img/editar.png" alt="" width="35" height="35"></a>
                    </div>
                    <div class="col-3 d-none d-sm-flex d-flex justify-content-center align-items-center">
                        <div class="search">
                            <div class="icon"></div>
                            <div class="input">
                                <input type="text" placeholder="Search" id="inputSearch">
                            </div>
                            <span class="clear" id="clearSearch"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="background">
        <div class="content">
			<?php echo $contenido ?>
        </div>
   </div>
    <script src="./js/main.js"></script>
</body>

</html>