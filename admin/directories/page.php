<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Admin Panel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        #navb{
            background-color: transparent;
            box-shadow: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body id="body">
<?php
session_start();
if (isset($_SESSION["admin"]))
{
    $email=$_SESSION["admin"];
    if ($email=="adminlog")
    {

    }
}
else
{
    header("Location: adminsignin.php");
}
?>
<section class="container-fluid">
    <section class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand" href="/admin/index.php" id="navb">Yex Admin</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="\webApp/admin/users.php">User Manage <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="\webApp/admin/allpapers.php">Paper Manage</a>
                <a class="nav-item nav-link" href="\webApp/admin/pages.php">Pages Manage</a>
                <a class="nav-item nav-link" href="\webApp/admin/tags.php">Tags Manage</a>
                <a class="nav-item nav-link" href="\webApp/admin/api/logout.php">Log Out</a>
<!--                <a class="nav-item nav-link" href="#">Pricing</a>-->
<!--                <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
            </div>
        </div>
    </section>

</section>
<!--<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">-->
<!--    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>-->
<!--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
<!--    <ul class="navbar-nav px-3">-->
<!--        <li class="nav-item text-nowrap">-->
<!--            <a class="nav-link" href="#">Sign out</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</nav>-->

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">
                            <span data-feather="users"></span>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allpapers.php">
                            <span data-feather="file-text"></span>
                            All Papers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminmessages.php">
                            <span data-feather="users"></span>
                            Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages.php">
                            <span data-feather="users"></span>
                            Pages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tags.php">
                            <span data-feather="users"></span>
                            Tags
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\webApp/admin/api/logout.php">
                            <span data-feather="users"></span>
                            Log Out
                        </a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="bar-chart-2"></span>-->
<!--                            Reports-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="layers"></span>-->
<!--                            Integrations-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>

<!--                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">-->
<!--                    <span>Saved reports</span>-->
<!--                    <a class="d-flex align-items-center text-muted" href="#">-->
<!--                        <span data-feather="plus-circle"></span>-->
<!--                    </a>-->
<!--                </h6>-->
<!--                <ul class="nav flex-column mb-2">-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file-text"></span>-->
<!--                            Current month-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file-text"></span>-->
<!--                            Last quarter-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file-text"></span>-->
<!--                            Social engagement-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file-text"></span>-->
<!--                            Year-end sale-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
            </div>
        </nav>
    </div>
</div>


<?php
