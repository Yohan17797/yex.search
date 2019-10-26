<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/button.min.css">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/menu.min.css">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/message.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="Semantic-UI-CSS-master/components/form.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">

    <style>
        #profile-image {
            width: 100px !important;
            margin-left: auto;
            margin-right: auto;
        }

        #nice-to-meet {
            text-align: center;
        }

        /*#menu {*/
            /*width: 100%!important;*/
            /*font-family: 'Noto Sans JP', sans-serif;*/

            /*font-weight: 300;*/
        /*}*/

        #right {
            background-color: #F2F2F2;

        }

        #paper {
            text-align: center;
        }

        #condition {
            font-family: 'Noto Sans JP', sans-serif;
            font-weight: 300;
            font-size: 2.5vh;
            display: inherit;
            text-align: center;
            margin-top: 5vh;
        }

        #file {
            text-align: center;
        }

        #content {
            width: 100%;
            margin: unset;
        }

        #form-grouop {
            margin-top: 2vh;
            font-family: 'Noto Sans JP', sans-serif;
            font-weight: 300;
        }

        #condition-answers {
            font-family: 'Noto Sans JP', sans-serif;
            font-weight: 300;
            font-size: 2.5vh;
            display: inherit;
            text-align: center;
            margin-top: 5vh;
        }

        #file-answer {
            text-align: center;
        }

        #content {
            width: 100%;
            margin: unset;
        }

        #form-group-answer {
            margin-top: 2vh;
            font-family: 'Noto Sans JP', sans-serif;
            font-weight: 300;
        }

    </style>

</head>
<body>

<?php
session_start();
if (isset($_SESSION["email"])) {
    $uName=$_SESSION["userName"];
} else {
    header("Location: index.php");
}


$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

$res = mysqli_query($connection, "SELECT * FROM users WHERE userName = '$uName'");
$result=mysqli_fetch_assoc($res);
$email=$result["email"];
$name=$result["name"];
$password=$result["password"];

?>




<section id="main" class="container-fluid">
    <section id="header-1" class="row">
        <section id="icon" class="col-12">
            <?php include ("assests/header/navbar.php")?>

        </section>
        <?php include("assests/header/sidemenu.php")
        ?>
        <section id="right" class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
             <section class="col-12 text-center text-dark">
                 <div class="ui success message" id="suc">
                     <div class="header">
                         Details updated successfully.
                     </div>
                 </div>
               <h2 class="text-center text-capitalize mt-2 mb-2">Account Settings</h2>
             </section>
            <section class="col-12">
                <form class="ui form p-4 shadow p-3 mb-4 bg-white rounded segment error" id="update">
                    <div class="field">
                        <label>User Name</label>
                        <input placeholder="<?php echo $uName ?>" readonly="<?php echo $uName ?>" type="text" id="uname">
                    </div>
                    <div class="field">
                        <label>Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $name ?>" placeholder="<?php echo $name ?>">
                    </div>
                    <div class="field">
                        <label>E-mail</label>
                        <span class="text-hide" id="hidden-email"><?php echo $email?></span>
                        <input type="text" id="email" name="email" value="<?php echo $email ?>" placeholder="<?php echo $email?>">
                    </div>
                    <div class="ui negative message" id="email-err">
                        <i class="close icon"></i>
                        <div class="header" id="head">
                            We're sorry. This email is already registered.
                        </div>
                        <p id="body">Please try another one.
                        </p></div>
                    <button class="ui button blue mb-2" type="button" id="update-details">Update Details</button>
                </form>



                    <section class="col-12">
                        <h2 class="text-capitalize text-center mb-4">Change Password</h2>
                    </section>
                    <form class="ui form p-2 shadow p-3 mb-4 bg-white rounded">
                        <div class="equal width fields">
                            <div class="field">
                                <label>Current Password<user/label>
                                <input type="password" id="current-password">
                            </div>
                            <div class="field">
                                <label>New Password</label>
                                <input type="password" id="n-password">
                            </div>
                            <div class="field">
                                <label>Repeat New Password</label>
                                <input type="password" id="r-n-password">
                            </div>
                        </div>
                        <button class="ui button blue" type="button" id="update-password">Update Password</button>
                    </form>

            </section>
        </section>
    </section>
</section>
<?php
include ("assests/header/footer.php");
?>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <script>
        $('.ui.modal')
            .modal('show', 'test');
    </script>
    <script src="assests/controllers/accountControl.js"></script>

</body>
</html>