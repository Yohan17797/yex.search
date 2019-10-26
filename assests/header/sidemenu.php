<link rel="stylesheet" href="css/side-menu.css">
<?php
$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}
$res=mysqli_query($connection,"select * from msg where messageTo='{$uName}'");
$arr=mysqli_fetch_all($res);
$count=count($arr);
?>
<section id="pro-image" class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center vh-100 ">
    <img class="ui medium circular image" src="img/user-image-with-black-background.png" id="profile-image">
    <!--                </div>-->
    <h1 class="display-4" id="nice-to-meet">Nice to see you<br><span
            id="userName"><?php echo $name ?></span></h1>
    <?php
        if ($uName=="nipuni")
        {
            ?>
                <img class="heartbeat" src="https://img.icons8.com/color/96/000000/filled-like.png">
                <?php
        }
    ?>
    <div class="ui vertical pointing menu" id="menu">
        <a class="item" href="profile.php">
            Upload
        </a>
        <a class="item" href="mypapers.php">
            My Papers
        </a>
        <a class="item" href="account.php">
            Account Settings
        </a>
        <a class="item" href="messages.php">
            Messages<span class="badge badge-warning"><?php echo $count?></span>
        </a>
    </div>
</section>

<?php
