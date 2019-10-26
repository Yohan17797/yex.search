<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Papers</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">

    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/card.min.css">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/menu.min.css">
<!--    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/sticky.min.css">-->
<!--    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/rail.css">-->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="Bootstrap-4-Tag-Input-Plugin-jQuery/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css">
    <link rel="stylesheet" href="Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css">

    <script src="js/jquery-3.4.1.min.js"></script>
</head>



<style>
    #name {
        margin-right: auto;
        margin-left: auto;
    }

    #profile-image {
        width: 100px !important;
        margin-left: auto;
        margin-right: auto;
    }

    #nice-to-meet {
        text-align: center;
    }

    /*#menu {*/
        /*width: 100% !important;*/
        /*font-family: 'Lato', sans-serif;*/

        /*font-weight: 300;*/
    /*}*/

    #right {
        background-color: #F2F2F2;

    }

    #content {
        width: 100%;
        padding-top: 4vh;
        margin: 0;
    }


</style>


</head>
<body>
<?php
session_start();

if (isset($_SESSION["email"]))
{
//    $name = $_SESSION["name"];
    $uName = $_SESSION["userName"];

    $connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
    if (!$connection) {
        die();
    }

    $res = mysqli_query($connection, "SELECT * FROM users WHERE userName = '$uName'");
    $result1=mysqli_fetch_assoc($res);
    $name=$result1["name"];

    $result = mysqli_query($connection, "select * from papers where paperUserName='$uName'");
}
else
{
    header("Location: index.php");

}

?>
<section id="main" class="container-fluid">
    <?php include("assests/header/navbar.php"); ?>

    <section id="content1" class="row">

        <?php include("assests/header/sidemenu.php") ?>

        <section id="right" class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">

            <section class="row"><h2 id="name" class="text-center text-dark text-capitalize">Really proud of you!</h2></section>

            <section id="content" class="row">

                <?php


                while ($data = $result->fetch_assoc()) {
                    $pid = $data["paperId"];
                    $title=$data["paperTitle"];
                    $des=$data["paperDes"];
                    $pId=$data["paperId"];


                    $pages= mysqli_query($connection, "select filePath,fileType,status,pageId from pages where paperId='{$pid}'");

                    while ($pagesArr=$pages->fetch_assoc())
                    {
                        $pathh=$pagesArr["filePath"];

                        $status=$pagesArr["status"];
                        $pageId=$pagesArr["pageId"];
                        if ($pagesArr["fileType"]=="pdf")
                        {
                            $img_dir="files/pdf.png";
                        }
                        else{
                            $img_dir=$pagesArr["filePath"];

                        }
                        ?>
                        <section
                                class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-4 d-flex flex-column flex-wrap justify-content-center align-content-center ">
                            <div class="ui card ">
                                <div class="image">
                                    <img src="<?php echo $img_dir ?>">
                                </div>
                                <div class="content">
                                    <a class="header test-popup-link text-decoration-none" href=""<?php echo $pathh ?>" data-mfp-src="<?php echo $pathh ?>"><?php echo $title ?></a>
                                    <?php
                                        if ($status=='1')
                                        {
                                            ?>
                                            <span class="badge badge-success">Online</span>
                                            <?php
                                            }
                                        else if ($status=='0')
                                        {
                                            ?>
                                            <span class="badge badge-danger">Hidden</span>
                                            <?php

                                            }
                                    ?>

                                    <div class="description">
                                        <?php echo $des ?>
                                    </div>
                                    <div class="text-hide"> <?php echo $pageId ?></div>
                                    <div class="text-hide" id="status"> <?php echo $status ?></div>
                                </div>
                                <div class="extra content d-flex flex-row flex-wrap">
                                    <div class="ui two buttons">
                                        <!--                                    <button class="ui basic green button update" data-toggle="modal"  id="-->
                                        <?php //echo $pId?><!--">Update</button>-->


                                        <button type="button" class="btn btn-primary update" data-toggle="modal" data-target="#exampleModalup" id="<?php echo $pId?>">Update</button>



                                        <div class="modal fade bd-example-modal-lg" id="exampleModalup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Update </h5>
                                                        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="upd">
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label text-dark" >Paper Id</label>
                                                                <input type="text" name="paperId" class="form-control" id="paperId" disabled="disabled">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label text-dark" >Page Id</label>
                                                                <input type="text" name="pageId" class="form-control" id="pageId" disabled="disabled">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name " class="col-form-label text-dark">Paper Title</label>
                                                                <input required name="paperTitle" type="text" class="form-control" id="papertitle">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name " class="col-form-label text-dark">Paper Description</label>
                                                                <textarea required name="paperTitle" type="text" class="form-control" id="message-text"></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="status " class="col-form-label text-dark">Status</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="status" id="online" value="1" >
                                                                    <label class="form-check-label" for="inlineRadio1" style="color: #343a40">Online</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="status" id="offline" value="0">
                                                                    <label class="form-check-label" for="inlineRadio1" style="color: #343a40">Offline</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="recipient-name " class="col-form-label text-dark">Paper Tags</label>
                                                                <input required name=""   type="text" class="form-control" id="papertags">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name " class="col-form-label text-dark">Input Tags</label>
                                                                <input required name="" data-role="tagsinput" type="text" class="form-control" id="papertagsinput">
                                                            </div>
                                                            <div class="text-center" id="spin">
                                                                <div class="spinner-border text-dark" role="status">
                                                                    <span class="sr-only">Loading...</span>
                                                                </div>
                                                            </div>
                                                            <div class="alert alert-success alert-dismissible fade show" ID="ok" role="alert">
                                                                <strong>Done</strong> Details successfully updated.
                                                                <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="alert alert-warning alert-dismissible fade show" ID="warn" role="alert">
                                                                <strong>Some thing went wrong.</strong> Please try again later.
                                                                <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="nop" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" id="updateDetails">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="button" class="btn btn-outline-danger del m-2" data-toggle="modal"
                                                id="<?php echo $pId ?>">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </section>
<?php
                        }
                    ?>
                    <?php
                }
                ?>


            </section>
        </section>

    </section>
</section>
<?php
include ("assests/header/footer.php");
?>

<script>
    $(document).ready(function() {
        $('.test-popup-link').magnificPopup({type:'iframe'});
    });
    $('.test-popup-link').magnificPopup({
        type:'image'
    });
</script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="Bootstrap-4-Tag-Input-Plugin-jQuery/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>
<script src="Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="assests/controllers/mypapers.js"></script>
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>


</body>
</html>