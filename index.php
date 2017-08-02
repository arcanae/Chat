<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">    
    <link rel="stylesheet" href="style.css" />
</head>

<body>
        <section id="logincont">
            <form id="signin" action="" method="POST">
                    <label for="user">Username:</label>
                    <input class='textinput' type="text" name="user" placeholder="Username">
                    <label for="pass">Password:</label>
                    <input class="textinput" type="password" name="pass">
                    <button id='but1'>Sign In</button>
            </form>
        </section>

        <section id="signupcont">
            <form id="signup" action="" method="POST">
                <label for="user">Username:</label>
                <input class="textinput" type="text" name="user" placeholder="Username" required>
                <label for="pass">Password:</label>
                <input class="textinput" type="password" name="pass" required>
                <label for="verifpass">Confirm Password:</label>
                <input class="textinput" type="password" name="verifpass" required>
                <button id='but2'>Sign Up</button>                
            </form>
        </section>
        <div id="log"></div>
    <?php if (!isset($_SESSION['user'])) { ?>
        <form id="notlogged" class="form-group col-md-12" action="">
                <input class="btn btn-primary col-md-2 offset-md-3" id="login" type="submit" value="Login">
                <input class="btn btn-primary col-md-2 offset-md-2" id="register" type="submit" value="Register">
        </form>
    <?php } else { ?>
        <form id="logform" method="POST" action="">
            <input id="text" type="text" autocomplete="off">
            <input id="sub" type="submit" value="⤶">
        </form>
    <?php } ?>
        <script src="chat.js"></script>
</body>

</html>