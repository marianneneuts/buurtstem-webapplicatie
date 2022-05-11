<?php
    include_once('core/autoload.php');
    session_start();

    if(isset($_SESSION["loggedIn"])) {
        header("Location: buurtstem.php");   
    }

    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(User::login($email, $password)) {
            $_SESSION['email'] = $email;
            $_SESSION['loggedIn'] = true;
            $_SESSION["userId"] = User::getUserIdByEmail($email);

            header("Location: buurtstem.php");
		}
        else {
            $error = "Your email or password is incorrect.";
        }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Login</title>
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- left side -->
    <div class="split left">
        <!-- Buurtstem logo -->
    </div>

    <!-- right side -->
    <div class="split right">
        <div class="BuurtstemLogin">
            <div class="form-login">
                <form action="" method="post">

                    <h2>Meld je aan bij Buurtstem!</h2>
                    <p class="sentence">Meld je aan om ideeën, bekommernissen of voorstellen achter te laten omtrent de vernieuwing van de Mechelse Vesten Brusselpoort en Ragheno.</p>

                    <!-- errors -->
                    <?php if(isset($error)): ?>
                        <div class="form-error">
                            <p><strong>Opgepast:</strong></p>
                            <?php if(isset($error)) { echo $error; }?>
                        </div>
                    <?php endif; ?>

                    <!-- email -->
                    <div class="form__field">
                        <input type="text" id="email" name="email" placeholder="Email">
                    </div>

                    <!-- wachtwoord -->
                    <div class="form__field">
                        <input type="password" id="wachtwoord" name="password" placeholder="Wachtwoord">
                    </div>

                    <!-- btn -->
                    <div class="form__field">
                        <input type="submit" name="login" value="Aanmelden" class="btn-aanmelden">
                    </div>

                    <!-- signup -->
                    <p class="signup">Heb je nog geen Buurtstem-account? <a href="signup.php" target="_blank"><strong>Registreren</strong></a></p>

                </form>
            </div>
        </div>
    </div>
</body>
</html>