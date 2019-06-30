<?php require "includes/bootstrap.php";?>

<link rel="stylesheet" href="includes/css/styles.css">

<div class="content">
    <?php if (isset($_SESSION['logged_user'])) : ?>
        <?php echo $profile ?>
        
        <div class="profile">
            <?php if ( !empty($_SESSION['logged_user']->name) ) : ?>
             <?php echo $name ?>: <?php echo $_SESSION['logged_user']->name ?><br>
            <?php endif ?>
            <?php if ( !empty($_SESSION['logged_user']->surname)) : ?>
                <?php echo $surname ?>: <?php echo $_SESSION['logged_user']->surname ?><br>
            <?php endif ?>
                <?php echo $email ?>: <?php echo $_SESSION['logged_user']->email ?><br>
            <?php if ( $_SESSION['logged_user']->icon !== null ) : ?>
                <?php echo $image ?>:<br> 
                <img src='images/<?php echo $_SESSION['logged_user']->icon ?>' height="200" />
            <?php endif ?>
        </div>

        <a href="/logout.php" class="link" > <?php echo $logout ?> </a>
    <?php else : ?>
        <p><?php echo $notLogged ?></p>
        <a href="/login.php" class="link"> <?php echo $logIn ?> </a><br>
        <a href="/signup.php" class="link"> <?php echo $reg ?> </a>
    <?php endif ?>
</div>

<footer>
    <a href="/lang.php" class="link" > <?php echo $lang ?> </a>
</footer>

