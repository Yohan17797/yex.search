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
//    $name = $_SESSION["name"];
    $uName = $_SESSION["userName"];

    $connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
    if (!$connection) {
        die();
    }

    $res = mysqli_query($connection, "SELECT * FROM users WHERE userName = '$uName'");
    $result1 = mysqli_fetch_assoc($res);
    $name = $result1["name"];

    $result = mysqli_query($connection, "select * from papers where paperUserName='$uName'");
} else {
    header("Location: index.php");

}

?>
<section id="main" class="container-fluid">
    <section id="header-1" class="row">
        <section id="icon" class="col-12">
            <?php include("assests/header/navbar.php") ?>

        </section>
        <?php include("assests/header/sidemenu.php")
        ?>
        <section id="right" class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <section class="col-12 text-center text-dark">
                <h2 class="text-center text-capitalize">Messages</h2>
            </section>
            <section class="col-12">
                <?php
                $msgres = mysqli_query($connection, "select * from msg where messageTo='$uName'");

                while ($data = $msgres->fetch_assoc()) {
                    ?>
                    <div class="ui message" id="<?php echo $data["id"]?>" >
                        <div class="header">
                            New notification from admin
                        </div>
                        <ul class="list">
                            <li>About which is paper id <strong><?php echo $data["paperId"] ?></strong></li>
                            <p><?php echo $data["message"] ?></p>
                        </ul>
                        <div class="pt-2">
                            <button class="ui green button gotIt" id="<?php echo $data["id"] ?>">
                                Okay I got this.
                            </button>
                        </div>

                    </div>
                    <?php
                }
                ?>

            </section>
        </section>
    </section>
</section>
<?php
include("assests/header/footer.php");
?>


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>
<script>
    $('.ui.modal').modal('show', 'test');

    $(".gotIt").click(function () {
        var id = $(this).attr("id");
        var username = $(this).parent().attr("id");
        var ajax = {
            url: "api/messageController.php",
            method: "GET",
            data: {
                "id": id,
                "action": "gotIt"
            }
        };
        // $(this).parent().fadeOut(3000);
        $.ajax(ajax).done(function (res) {
            if (res=="1")
            {
                $("#"+id).fadeOut(1000);
                window.setTimeout(function () {
                    location.reload()
                }, 1000)
            }
        });
    })
    
    
    $()
</script>

</body>
</html>

<?php
