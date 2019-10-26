<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/semantic.min.css">


    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,700,900&display=swap" rel="stylesheet">

    <title>Yex Registration</title>
</head>
<body>
<section class="container-fluid h-100" id="main">
    <?php session_start();
    include("assests/header/navbar.php") ?>

    <section class="container-fluid d-flex flex-column justify-content-center align-items-center jumbotron" id="content">
        <section class="row">
            <section class="col-12 pt-4 pb-4">
                <h1 class="text-center">Come, join with us!</h1>
            </section>
        </section>
        <section class="col-12 " id="main-area">
            <form class="ui form segment error" id="user-data">
                <p class="text-center font-weight-bold">Let's go ahead and get you signed up.</p>

                <div class="field required">
                    <label>Name</label>
                    <input placeholder="Name" name="name" type="text" onfocus="" id="name">
                </div>
                <div class="field required">
                    <label>E-mail</label>
                    <input placeholder="E-mail" name="email" type="text" id="email">
                </div>
                <div class="ui negative message" id="email-err">
                    <i class="close icon"></i>
                    <div class="header">
                        We're sorry. This email is already registered.
                    </div>
                    <p>Please try another one.
                    </p></div>

                <div class="field required">
                    <label>Username</label>
                    <input placeholder="Username" name="username" type="text" id="username">
                    <div class="ui negative message" id="user-err">
                        <i class="close icon"></i>
                        <div class="header">
                            We're sorry. This user name is taken.
                        </div>
                        <p>Please try another one.
                        </p></div>
                </div>

                <div class="two fields">
                    <div class="field required">
                        <label>Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="field required">
                        <label>Confirm Password</label>
                        <input type="password" name="repeat-password" id="repeat-password">
                    </div>
                </div>
                <button id="register" class="ui primary button" type="button" onclick="click();">Submit</button>
                <div class="ui olive message text-center" id="congrats"></div>

                <div class="ui active centered inline loader" id="spin"></div>

                <div class="ui error message"></div>
            </form>
        </section>
    </section>




</section>


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>
<script src="assests/controllers/signUpController.js"></script>
</body>
</html>