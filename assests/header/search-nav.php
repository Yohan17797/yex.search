<link rel="stylesheet" href="css/search-nav.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,700,900&display=swap" rel="stylesheet">

<section id="main-nav" class="container-fluid shadow p-1 mb-5 bg-white rounded fixed-top">
    <section class="row d-flex flex-row flex-wrap" id="s-nav">
        <section class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="index.php">
                    <img alt="" class="d-inline-block align-top" height="30" src="img/yex.png" width="30">
                    Yex
                </a>
            </nav>
        </section>
        <section class="col-12 col-sm-12 col-md-2 col-lg-7 col-xl-7 mt-1">
            <div class="right item">
                <form action="search.php" class="d-flex flex-row" method="get" id="form">

                    <div class="ui action input w-100">
                        <input type="text" name="keyWord" value="<?php echo $keyword ?>" class="tags" id="search-box">
                        <button class="ui button" id="search-button" type="submit">Search</button>
                    </div>

                </form>
            </div>
        </section>
        <section class="col-12 col-sm-12 col-md-2 col-lg-3 col-xl-3">
            <div class="ui icon menu" id="ui icon menu">
                <?php
                session_start();
                if (!isset($_SESSION["email"])) {
                    ?>
                    <a class="item" id="sign-in" data-toggle="modal" data-target="#exampleModal">
                        <svg class="svg-inline--fa fa-sign-in-alt fa-w-16" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="sign-in-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                  d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path>
                        </svg><!-- <i class="fas fa-sign-in-alt"></i> -->
                    </a>
                    <?php
                }
                if (isset($_SESSION["email"])) {
                    ?>
                    <a class="item" data-toggle="tooltip" data-placement="left" title="Dashboard" href="profile.php">
                        <i class="fas fa-tachometer-alt"></i>
                    </a>
                    <?php
                }


                ?>


                <a class="item" data-toggle="tooltip" data-placement="left" title="Sign Out" href="api/logout.php">
                    <svg class="svg-inline--fa fa-sign-out-alt fa-w-16" aria-hidden="true" focusable="false"
                         data-prefix="fas" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                    </svg><!-- <i class="fas fa-sign-out-alt"></i> -->
                </a>
            </div>
        </section>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <section class="col-12 h-100 d-flex flex-column justify-content-center modal-content p-2"
                         id="main-area">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">Sign In to YEX</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-signin" method="post" action="login.php">


                        <div class="form-label-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" id="inputEmail" name="email" class="form-control"
                                   placeholder="Email address" required autofocus>
                        </div>

                        <div class="form-label-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" id="inputPassword" name="password" class="form-control"
                                   placeholder="Password" required>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button>
                        <p class="mt-5 mb-3 text-center">&copy; New to us? <a href="sign-up.php">Sign up.</a></p>
                    </form>
                </section>
            </div>
        </div>


    </section>

</section>



<section id="main-nav-mob" class="container-fluid pb-2">

    <section class="row" id="header-mob">
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
            <a class="navbar-brand font-weight-bolder" href="index.php">Yex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item text-dark">
                        <?php
                        if (!isset($_SESSION["email"])) {
                            ?>
                            <a class="item text-body" id="sign-in" data-toggle="modal"  data-target="#exampleModalCenter">Sign
                                In</a>
                            <?php
                        }
                        if (isset($_SESSION["email"])) {
                            ?>
                            <a class="text-body" href="profile.php">Dashboard</a>
                            <?php
                        }
                        ?>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">

                                <section
                                        class="col-12 h-100 d-flex flex-column justify-content-center modal-content p-2"
                                        id="main-area">

                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">Sign
                                            In to
                                            YEX</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-signin" method="post" action="login.php">

                                        <div class="form-label-group">
                                            <label for="inputEmail">Email address</label>
                                            <input type="email" id="inputEmail" name="email" class="form-control"
                                                   placeholder="Email address" required autofocus>
                                        </div>

                                        <div class="form-label-group">
                                            <label for="inputPassword">Password</label>
                                            <input type="password" id="inputPassword" name="password"
                                                   class="form-control"
                                                   placeholder="Password" required>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign
                                            in
                                        </button>
                                        <p class="mt-5 mb-3 text-center">&copy; New to us? <a href="sign-up.php">Sign
                                                up.</a></p>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                          <?php
                        if (isset($_SESSION["email"])) {
                            ?>
                            <a class="text-body" href="api/logout.php">Log Out</a>
                            <?php
                        }
                        ?>
                    </li>


                </ul>
            </div>
        </nav>


    </section>


    <section class="row d-flex flex-row flex-wrap">
        <section class="col-12 col-sm-12 col-md-2 col-lg-7 col-xl-7 mt-1">
            <div class="right item">
                <form action="search.php" class="d-flex flex-row" method="get" id="form">

                    <div class="ui action input w-100">
                        <input type="text" name="keyWord" value="<?php echo $keyword ?>" class="tags" id="search-box">
                        <button class="ui button" id="search-button" type="submit">Search</button>
                    </div>

                </form>
            </div>
        </section>
    </section>

</section>


<?php
