<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/search.min.css">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/button.min.css">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/components/input.min.css">
    <link rel="stylesheet" href="Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href=api/bootstrap.min.css>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//resources/demos/style.css">
    <title>Search Results</title>
    <style>
        #form {
            width: 100%;
        }

        .ui.menu {

            width: fit-content !important;
            float: right !important;
        }

        #search-box {
            width: 75%;
            border-radius: 10px;
        }

        #search-button {
            padding-left: 1em !important;
            padding-right: 1em !important;
        }
        @media all and (min-width: 1024px) {
            #sec{
                margin-top: 100px;
            }

        }
    </style>
</head>
<body>

<?php
$keyword = $_GET["keyWord"];
?>

<?php include("assests/header/search-nav.php") ?>

<?php


$data = preg_split('/\s+/', $keyword);
$c=count($data);


if ($data[$c-1]=="")
{
    unset($data[$c-1]);
}

$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
} else {

    if (count($data) == 1) {
        $results = mysqli_query($connection, "select * from papertag WHERE tagName='{$data[0]}'");
        if (!$results) {
            echo mysqli_error($connection);
        }
    }

    if (count($data) == 2) {
        $results = mysqli_query($connection, "SELECT * FROM papertag WHERE `tagName` IN ('{$data[0]}', '{$data[1]}')  GROUP BY (`paperId`) HAVING COUNT(*) = 2");
        if (!$results) {
            echo mysqli_error($connection);
        }
    } else if (count($data) == 3) {
        $results = mysqli_query($connection, "SELECT * FROM papertag WHERE `tagName` IN ('{$data[0]}', '{$data[1]}','{$data[2]}')  GROUP BY (`paperId`) HAVING COUNT(*) = 3");
        if (!$results) {
            echo mysqli_error($connection);
        }
    } else if (count($data) == 4) {
        $results = mysqli_query($connection, "SELECT * FROM papertag WHERE `tagName` IN ('{$data[0]}', '{$data[1]}', '{$data[2]}','{$data[3]}')  GROUP BY (`paperId`) HAVING COUNT(*) = 4");
        if (!$results) {
            echo mysqli_error($connection);
        }
    } else if (count($data) == 5) {
        $results = mysqli_query($connection, "SELECT * FROM papertag WHERE `tagName` IN ('{$data[0]}', '{$data[1]}', '{$data[2]}', '{$data[3]}','{$data[4]}')  GROUP BY (`paperId`) HAVING COUNT(*) = 5");
        if (!$results) {
            echo mysqli_error($connection);
        }
    } else if (count($data) == 6) {
        $results = mysqli_query($connection, "SELECT * FROM papertag WHERE `tagName` IN ('{$data[0]}', '{$data[1]}', '{$data[2]}', '{$data[3]}','{$data[4]}','{$data[5]}')  GROUP BY (`paperId`) HAVING COUNT(*) = 6");
        if (!$results) {
            echo mysqli_error($connection);
        }
    }
}


?>
<section class="row" id="sec">
<?php

while ($re = $results->fetch_assoc()) {
    $pid = $re["paperId"];
    $re2 = mysqli_query($connection, "select * from papers where paperId='{$pid}' order by dataAndTime ASC ");
    $re3 = mysqli_fetch_assoc($re2);
//    var_dump($re3);
    $ptitle = $re3["paperTitle"];
    $pdes = $re3["paperDes"];
    $pauth = $re3["paperAuthor"];
    $re4 = mysqli_query($connection, "select * from pages where  status='1' and paperId='{$pid}'");
    while ($re5 = $re4->fetch_assoc()) {
        $fpath = $re5["filePath"];

        $ftype = $re5["fileType"];
        if ($ftype == "pdf") {
            $fpath = "files/pdf.png";
        }
        ?>
        <section class="row container-fluid pb-lg-3 pb-sm-1 pb-md-0-1 pb-xl-3 m-0">
            <section class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2"></section>
            <section class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="row no-gutters bor shadow p-3 mb-5 bg-white rounded">
                    <div class="col-md-4">
                        <img src="<?php echo $fpath ?>" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href="<?php echo $re5["filePath"] ?>" download=""><h5
                                        class="card-title"><?php echo $ptitle ?></h5></a>
                            <p class="card-text"><?php echo $pdes ?></p>
                            <p class="card-text">
                                <small class="text-muted">From <?php echo $pauth ?></small>
                            </p>
                        </div>
                    </div>
                </div>

            </section>
            <section class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2"></section>
        </section>
        <?php

    }
}
?>
</section>


<?php
include("assests/header/footer.php");
?>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>
<script src="Semantic-UI-CSS-master/components/search.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        var availableTags = [
            "Peradeniya University",
            "Maths",
            "Science",
            "Chemestry",
            "Maths Department",
            "Cs University of Peradeniya",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $(".tags").autocomplete({
            source: availableTags
        });

        $("#search-box").attr("required", "true");

    });
</script>
<script src="js/controller.js"></script>
</body>
</html>