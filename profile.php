<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/menu.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/button.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dist/dropzone.css">
    <link rel="stylesheet" href="dist/basic.css">
    <link rel="stylesheet" href="Bootstrap-4-Tag-Input-Plugin-jQuery/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css">

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
        /*font-family: 'Lato', sans-serif;*/

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
} else {
    header("Location: index.php");

}

$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

$res = mysqli_query($connection, "SELECT * FROM users WHERE userName = '$uName'");
$result = mysqli_fetch_assoc($res);
$name = $result["name"];
?>
<?php

$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_file size directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);


if (!empty($_FILES)) {
//    var_dump($_POST);
    function pre_r($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    function reArrayFiles($file_post)
    {
        $file_ary = array();
        $file_count = count($file_post["name"]);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }


        }
        return $file_ary;
    }

    $file_array = reArrayFiles($_FILES["file"]);
    pre_r($file_array);


    $res = mysqli_query($connection, "select * from users where userName='$uName'");
    $result = mysqli_fetch_assoc($res);
    $paperAuthor = $result["name"];
    $paperTitle = $_POST["paperTitle"];
    $paperDescription = $_POST["paperDescription"];
    $userName = $uName;
    date_default_timezone_set('Asia/Colombo');
//    $date = date('m/d/Y h:i:s a', time());


    $date = date('Y-m-d H:i:s',time());




                                    /*uploading to papers table*/

    if ($result["lastPaperId"] == NULL) {

        $nme=$_POST["name"];
        $ttle=$_POST["paperTitle"];

        $s1 = $userName;
        $s2 = "0";
        $paperId = $s1 . $s2;



        $resp = mysqli_query($connection, "update users set lastPaperNumber=0, lastPaperId='{$paperId}' where userName='{$userName}'");
        $up = mysqli_query($connection, "insert into papers values ('{$userName}','{$paperId}','{$paperTitle}','{$paperDescription}','{$paperAuthor}','{$date}')");

        $up2 = mysqli_query($connection, "INSERT INTO `papertag`(`paperId`, `tagName`) VALUES ('{$paperId}', '{$ttle}')");
        $up2 = mysqli_query($connection, "INSERT INTO `papertag`(`paperId`, `tagName`) VALUES ('{$paperId}', '{$nme}')");

        $arr=explode(",",$_POST["tags"]);
        for ($i=0;$i<count($arr);$i++)
        {
            $key=$arr[$i];
            $up2 = mysqli_query($connection, "INSERT INTO `papertag`(`paperId`, `tagName`) VALUES ('{$paperId}', '{$key}')");
        }

        if (!$up2) {
            mysqli_error($connection);
        }

    } else {
        $nme=$_POST["name"];
        $ttle=$_POST["paperTitle"];
        $number = $result["lastPaperNumber"] + 1;
        $paperId = "$userName" . "$number";
        echo $paperId;



        $res = mysqli_query($connection, "update users set lastPaperNumber=$number where userName='{$userName}'");
        $resp = mysqli_query($connection, "update users set lastPaperNumber=$number, lastPaperId='{$paperId}' where userName='{$userName}'");
        $up = mysqli_query($connection, "insert into papers values ('{$userName}','{$paperId}','{$paperTitle}','{$paperDescription}','{$paperAuthor}','{$date}')");
        $up2 = mysqli_query($connection, "INSERT INTO `papertag`(`paperId`, `tagName`) VALUES ('{$paperId}', '{$ttle}')");
        $up2 = mysqli_query($connection, "INSERT INTO `papertag`(`paperId`, `tagName`) VALUES ('{$paperId}', '{$nme}')");

        $arr=explode(",",$_POST["tags"]);
        for ($i=0;$i<count($arr);$i++)
        {
            $key=$arr[$i];
            $up2 = mysqli_query($connection, "INSERT INTO `papertag`(`paperId`, `tagName`) VALUES ('{$paperId}', '{$key}')");
        }



        if (!$up2)
        {
            echo mysqli_error($connection);
        }

    }

    /*trying to get tags*/



    for ($i = 0; $i < count($file_array); $i++) {
        if ($file_array[$i]["error"]) {
            ?>
            <div class="alert alert-danger">
                <?php echo $file_array[$i]["name"] . ' - ' . $phpFileUploadErrors[$file_array[$i]["error"]] ?>
            </div> <?php
        } else {
            $extensions = array("jpg", "png", "jpeg", "pdf");
            $file_ext = explode(".", $file_array[$i]["name"]);

            $name = $file_ext[0];
            $type=$file_ext[1];
            $name = preg_replace("!-!", " ", $name);
            $name = ucwords($name);

            $file_ext = end($file_ext);

            if (!in_array($file_ext, $extensions)) {
                ?>
                <div class="alert alert-danger">
                <?php echo "{$file_array[$i]["name"]} - Invalid File !"; ?>
                </div><?php
            } else {
                $img_dir = "files/" . $file_array[$i]["name"];
                move_uploaded_file($file_array[$i]["tmp_name"], $img_dir);

                /*uploaded to database*/

                if ($_SERVER["REQUEST_METHOD"] == "POST") {


                        $up = mysqli_query($connection, "INSERT INTO `pages`(`paperId`, `filePath`, `fileType`, `status`, `dateAndTime`) VALUES ('{$paperId}', '{$img_dir}', '{$type}',2 , '{$date}' )");
                        if (!$resp) {
                            mysqli_error($connection);
                        }
                    }
                ?>
                <div class="alert alert-success">
                    <?php echo $file_array[$i]["name"] . ' - ' . $phpFileUploadErrors[$file_array[$i]["error"]];
                    ?>
                </div>
                <?php
            }
        }
    }
}


?>


<section id="main" class="container-fluid">
    <section id="header-1" class="row">
        <section id="icon" class="col-12">
            <?php include("assests/header/navbar.php") ?>

        </section>
        <?php include("assests/header/sidemenu.php") ?>
        <section id="right" class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 jumbotron pt-1">
            <h2 class="text-center text-capitalize" id="paper">It seems you found a paper! Isn't it?</h2>
            <label for="file" id="condition" class="text-left text-dark font-weight-bold">You can upload multiple files.
                File may be *.pdf, *.jpeg, *.png</label>

            <form action="profile.php" class="dropzone" name="image"></form>

            <div class="form-group text-left" id="form-grouop">
                <label for="paperTitle">Paper Title</label>
                <input type="text" class="form-control" id="paperTitle" name="paperTitle" aria-describedby="emailHelp">

                <label for="paperDescription">Paper Description</label>
                <input type="text" class="form-control" id="paperDescription" name="paperDescription" aria-describedby="emailHelp">

                <label for="tags">Paper Tags</label>
                <span class="help-block">(Don't put same title again as a tag.)</span>
                <input type="text" data-role="tagsinput" id="tags" placeholder="Eg: cs101, 2017, end">
            </div>
            <button type="submit" id="submit" class="ui blue button">Submit</button>
        </section>
    </section>
</section>

<?php
include("assests/header/footer.php");
?>


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="dist/dropzone.js"></script>
<script src="dist/dropzone-amd-module.js"></script>

<script src="Semantic-UI-CSS-master/semantic.min.js"></script>
<script src="Bootstrap-4-Tag-Input-Plugin-jQuery/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>

<script>
    $('.ui.modal').modal('show', 'test');
</script>
<script src="assests/controllers/papaerController.js"></script>
<script>

</script>

<script>
    $('form.dropzone').find('div.default.message').css("background-color","red");

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone(".dropzone", {
        autoProcessQueue: false,
        parallelUploads: 20,
        method: "post",
        addRemoveLinks: true,
        uploadMultiple: true,
        acceptedFiles: "image/*,application/pdf"

    });

    myDropzone.on('sending', function(file, xhr, formData){
        formData.append('action', 'data');
    });
    myDropzone.on("complete", function (file) {
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
            alert('All files uploaded with success.');
            location.reload();

        }

        md.removeFile(file);
    });

    myDropzone.on("queuecomplete", function () {
        this.removeAllFiles();
    });

    $("#submit").click(function () {
        myDropzone.on("sending", function (file, xhr, formData) {
            // Will send the filesize along with the file as POST data.
            formData.append("paperTitle", $("#paperTitle").val());
            formData.append("paperDescription", $("#paperDescription").val());
            formData.append("tags", $("#tags").val());
            formData.append("name",$("#userName").text());


        });
        myDropzone.processQueue();

    })
</script>


</body>
</html>