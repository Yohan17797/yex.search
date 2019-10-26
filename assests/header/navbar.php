<link rel="stylesheet" href="css/navbar.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,700,900&display=swap" rel="stylesheet">
<section class="row shadow mb-1 bg-white rounded" id="header">
    <section class="col-6" id="icon">
        <!-- Image and text -->
        <nav class="navbar navbar-light mt-2" id="nav">
            <a class="navbar-brand" href="index.php">
                <img alt="" class="d-inline-block align-top" height="30" src="img/yex.png" width="30">
                Yex
            </a>
        </nav>
    </section>
    <section class="col-6" id="menu-items">
        <div class="ui icon menu mt-2" id="ui icon menu">

            <?php
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
            ?>

            <?php
            if (isset($_SESSION["email"])) {
                ?>
                <a class="item" data-toggle="tooltip" data-placement="left" title="Dashboard" href="profile.php">
                    <i class="fas fa-tachometer-alt"></i>
                </a>
                <?php
            }

            ?>
            <?php
            if (isset($_SESSION["email"]))
            {
             ?>
             <a class="item" data-toggle="tooltip" data-placement="left" title="Sign Out" href="api/logout.php">
                <svg class="svg-inline--fa fa-sign-out-alt fa-w-16" aria-hidden="true" focusable="false"
                     data-prefix="fas" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                </svg><!-- <i class="fas fa-sign-out-alt"></i> -->
            </a>
            <?php
            }
            ?>


        </div>


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
                            <input type="email" id="inputEmail" name="email"  class="form-control"
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

<section class="row" id="header-mob">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bolder" href="index.php">Yex</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php
                    if (!isset($_SESSION["email"]))
                    {
                      ?>
                      <a data-toggle="modal" class="text-body" data-target="#exampleModalCenter">
                        Sign In
                    </a>
                    <?php
                    }
                    if (isset($_SESSION["email"]))
                    {
                        ?>
                        <a class="text-body" href="profile.php">Dashboard</a>
                        <?php
                    }

                    ?>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">

                            <section class="col-12 h-100 d-flex flex-column justify-content-center modal-content p-2"
                                     id="main-area">

                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">Sign In to
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
                                        <input type="password" id="inputPassword" name="password" class="form-control"
                                               placeholder="Password" required>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button>
                                    <p class="mt-5 mb-3 text-center">&copy; New to us? <a href="sign-up.php">Sign
                                            up.</a></p>
                                </form>
                            </section>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION["email"]))
                    {
                        ?>
                    <a class="text-body" href="api/logout.php">Sign Out</a>
                    <?php
                    }
                    ?>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="api/logout.php">Sign Out</a>-->
<!--                </li>-->
            </ul>
        </div>
    </nav>
</section>


<?php
/**
 * Created by IntelliJ IDEA.
 * User: Yohan
 * Date: 10/3/2019
 * Time: 10:17 PM
 */