<?php require "includes/bootstrap.php";?>
<link rel="stylesheet" href="includes/css/styles.css">


<div class="content">
    <form action="#" id="login" method="POST">
        <div class="form-row">
            <div>Email</div>
            <input type="email" id="email" name="email" required>
            <div class="form-control-feedback"></div>
        </div>
        <div class="form-row">
            <div><?php echo $passwordLabel ?></div>
            <input type="password" id="password" name="password" required>
            <div class="form-control-feedback"></div>
        </div>

        <button type="submit"> <?php echo $logIn ?> </button>
    </form>
    <a href="/signup.php" class="link"> <?php echo $reg ?> </a>
</div>
<footer>
    <a href="/lang.php" class="link" > <?php echo $lang ?> </a>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="includes/js/login.js"></script>