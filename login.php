<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<title>Duel Links World</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-black.css">
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/phpstyle.css">

<body>

<div class="w3-top">
    <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
        <a href="home.html" class="w3-bar-item w3-button w3-theme-l1">Home</a>
        <a href="about.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
        <a href="guide.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Guide</a>
        <a href="characters.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Characters</a>
        <a href="decks.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Decks</a>
        <a href="news.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News</a>
    </div>
</div>

<div class="w3-main">
    <br><br><br><br><br><br><br><br>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" >
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>
    <br><br><br><br><br><br><br><br>
</div>
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