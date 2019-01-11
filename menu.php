<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<title>Duel Links World</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-black.css">
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/phpstyle.css">

<body>
<style>
    form{
        width: 50%;
        margin: 0px auto;
        padding: 20px;
        border: 1px solid #B0C4DE;
        background: white;
        border-radius: 0px 0px 10px 10px;
    }
    .header {
        width: 50%;
        margin: 50px auto 0px;
        color: white;
        background: #5F9EA0;
        text-align: center;
        border: 1px solid #B0C4DE;
        border-bottom: none;
        border-radius: 10px 10px 0px 0px;
        padding: 20px;
    }
</style>


<div class="w3-top">
    <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
        <a href="home.html" class="w3-bar-item w3-button w3-theme-l1">Home</a>
        <a href="about.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
        <a href="guide.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Guide</a>
        <a href="characters.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Characters</a>
        <a href="decks.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Decks</a>
        <a href="news.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News</a>
        <a href="menu.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">My Account</a>
    </div>
</div>
<br><br>
<div class="w3-main">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
<!--        <p>Welcome <strong>--><?php //echo $_SESSION['username']; ?><!--</strong></p>-->
<!--        <p> <a href="menu.php?logout='1'" style="color: red;">logout</a> </p>-->
        <?php
            $usr = $_SESSION['username'];
            $db = mysqli_connect('localhost','root','', 'duel');
            $user_type = "SELECT * FROM users WHERE username='$usr'";
            $result = mysqli_query($db, $user_type);
            $res = $result-> fetch_assoc();
            $var=0;
            $state = $res["status"];
            $idp = $res["id"];
            if ($res["role"]=='admin')
            {
                $var=1;
            }else{
                $var=2;
            }
        ?>
    <?php endif ?>
    <?php if ( $var == 1 ) :?>
        <p>Hello <?php echo $usr; ?>(ADMIN)</p>
        <a href="menu.php?logout='1'" style="color: red;">logout</a>
    <?php endif ?>
    <?php if ( $var == 2 ) :?>
        <div class="w3-container">
            <div class="w3-container w3-half">
                <h1>Duelist : <strong><?php echo $usr; ?></strong></h1>
                <h1>Status : <strong><?php echo $state; ?></strong></h1>
                <button class="btn">
                    <a href="menu.php?logout='1'">LOGOUT</a>
                </button>
            </div>
            <div class="w3-container w3-half">
                <div class="header">
                    <h2>Deck</h2>
                </div>
                <form method="post" action="menu.php">
                    <div class="input-group">
                        <label>Packet Name</label>
                        <input type="text" name="packetname">
                    </div>
                    <div class="input-group">
                        <label>Player ID</label>
                        <input type="text" name="playerId" value="<?php echo $idp?>">
                    </div>
                    <div>
                        <input type="file" class="btn" name="pic" accept="image/*">
                    </div>
                    <div class="input-group">
                        <button class="btn" type="submit" name="save_photo">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w3-container">
            
        </div>
    <?php endif ?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer id="myFooter">
    <div class="w3-container w3-theme-l2 w3-padding-32 w3-center">
        <h4>Duel Links World</h4>
    </div>

    <div class="w3-container w3-theme-l1 w3-center">
        <p>Powered by KONAMI</p>
    </div>
</footer>

</body>
</html>