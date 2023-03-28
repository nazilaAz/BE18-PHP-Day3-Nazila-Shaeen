<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>LOGIN</title>
    
    <?php include "components/boot.php"; ?>
    <link rel="stylesheet" href="components/Css/login.css">
    
    <link rel="stylesheet" href="components/Css/style.css">
    
</head>

<body>
    <?php include_once "navbar.php"; ?>
    <div class="container">
        <div class="welcome">
            <div class="pinkbox">
                <div class="signup nodisplay">
                    <h1>register</h1>
                    <form autocomplete="off">
                        <input type="text" placeholder="Firstname">
                        <input type="text" placeholder="Lasttname">
                        <input type="date">
                        <input type="email" placeholder="email">
                        <input type="password" placeholder="password">
                        <input type="password" placeholder="confirm password">
                        <input type="file" placeholder="Upload Image">
                        <button class="button submit">create account </button>
                    </form>
                </div>
                <div class="signin">
                    <h1>sign in</h1>
                    <form class="more-padding" autocomplete="off">
                        <input type="text" placeholder="username">
                        <input type="password" placeholder="password">
                        <!-- <div class="checkbox">
                            <input type="checkbox" id="remember" /><label for="remember">remember me</label>
                        </div> -->

                        <button class="button submit">login</button>
                    </form>
                </div>
            </div>
            <div class="leftbox">
                <!-- <h2 class="title"><span>BLOOM</span>&<br>BOUQUET</h2> -->
                <h2 class="title"><span>Lorem</span>&<br>Restaurant</h2>
                <!-- <p class="desc">pick your perfect <span>bouquet</span></p> -->
                <img class="flower smaller rounded-circle" src="https://cdn.pixabay.com/photo/2018/07/14/15/27/cafe-3537801_960_720.jpg" alt="" border="0">
                <p class="account">have an account?</p>
                <button class="button" id="signin">login</button>
            </div>
            <div class="rightbox">
                <h2 class="title"><span>Lorem</span>&<br>Restaurant</h2>
                <!-- <p class="desc"> pick your perfect <span>bouquet</span></p> -->
                <img class="flower rounded-circle" src="https://cdn.pixabay.com/photo/2021/03/16/10/04/street-6099209_960_720.jpg" />
                <p class="account">don't have an account?</p>
                <button class="button" id="signup">sign up</button>
            </div>
        </div>
    </div>

    </div>
   
    <script>
        $('#signup').click(function() {
            $('.pinkbox').css('transform', 'translateX(80%)');
            $('.signin').addClass('nodisplay');
            $('.signup').removeClass('nodisplay');
        });

        $('#signin').click(function() {
            $('.pinkbox').css('transform', 'translateX(0%)');
            $('.signup').addClass('nodisplay');
            $('.signin').removeClass('nodisplay');
        });
    </script> 
  
    <!-- <script>
        document.getElementById("signup").addEventListener("click", function() {
            document.getElementsByClassName("pinkbox").css('transform', 'translateX(80%)');
            document.getElementsByClassName('signin').addClass('nodisplay');
            document.getElementsByClassName('signup').removeClass('nodisplay');
        });
        document.getElementById("signin").addEventListener("click", function() {
            document.getElementsByClassName("pinkbox").css('transform', 'translateX(0%)');
            document.getElementsByClassName('signup').addClass('nodisplay');
            document.getElementsByClassName('signin').removeClass('nodisplay');
        });
    </script> -->
      <?php include_once "components/bootjs.php"; ?>
</body>

</html>