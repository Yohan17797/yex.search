<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <meta content="width=device-width , initial-scale=1" name="viewport">
    <link href="Semantic-UI-CSS-master/components/menu.min.css" rel="stylesheet">
    <link href="Semantic-UI-CSS-master/components/search.min.css" rel="stylesheet">
    <link href="Semantic-UI-CSS-master/components/button.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/indexcss.css">
    <link rel="stylesheet" href="css/side-menu.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,700,900&display=swap" rel="stylesheet">
    <style>

    </style>
</head>



<body>

<section class="container-fluid h-100" id="main">
    <?php session_start();include("assests/header/navbar.php") ?>

    <div id="one"></div>
    <div id="two"></div>
    <div id="three"></div>
    <div id="four"></div>


    <section class="col-12" id="main-area">
        <section id="content" class="w-100">
            <h1 class="display-1 tracking-in-expand-fwd " id="class-h1">What ever paper you search,<br>you can
                search it on Yex</h1>
            <form action="search.php" method="get">


                <div class="ui search ui-widget">
                    <div class="ui search" id="search">
                        <input class="prompt tags" id="search-box" required name="keyWord" placeholder="Ex : cs101 2017 end "
                               style="font-weight: 500" type="text">
                        <div class="results"></div>
                    </div>
                </div>
                <button class="ui button" id="search-button">
                    Search
                </button>


            </form>
        </section>
    </section>
</section>




<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {

        var ajaxConfig={
            url:"api/tagsControl.php",
            method: "POST",
            dataType:"json",
            data:{
                "action":"getAll"
            }
        };
        $.ajax(ajaxConfig).done(function (res) {
            var arr=[];
            for (var tag of res)
            {
                arr.push(tag[0]);
            }
            $(".tags").autocomplete({
                source: arr
            });
        });




        // var availableTags = [
        //     "Peradeniya University",
        //     "Maths",
        //     "Science",
        //     "Chemestry",
        //     "Maths Department",
        //     "Cs University of Peradeniya",
        //     "Clojure",
        //     "COBOL",
        //     "ColdFusion",
        //     "Erlang",
        //     "Fortran",
        //     "Groovy",
        //     "Haskell",
        //     "Java",
        //     "JavaScript",
        //     "Lisp",
        //     "Perl",
        //     "PHP",
        //     "Python",
        //     "Ruby",
        //     "Scala",
        //     "Scheme"
        // ];
        // $(".tags").autocomplete({
        //     source: availableTags
        // });
    });


    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
<script src="js/controller.js"></script>

</body>
</html>