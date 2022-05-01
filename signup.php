<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Signup</title>
</head>
<body>
    <!-- left side -->
    <div class="split left">
        <!-- Buurtstem logo -->
    </div>

    <!-- right side -->
    <div class="split right">
        <div class="BuurtstemSignup">
            <div class="form-signup">
                <form action="" method="post">

                    <h2>Registreer je bij Buurtstem!</h2>
                    <p class="sentence">Maak een account om ideeën, bekommernissen of voorstellen achter te laten omtrent de vernieuwing van de Mechelse Vesten Brusselpoort en Ragheno.</p>

                    <!-- errors -->
                    <?php if(isset($error)): ?>
                        <div class="form-error">
                            <p><strong>Opgepast:</strong></p>
                            <?php if(isset($error)) { echo $error; }?>
                        </div>
                    <?php endif; ?>

                    <!-- voornaam -->
                    <div class="form__field">
                        <input type="text" id="voornaam" name="firstname" placeholder="Voornaam">
                    </div>

                    <!-- achternaam -->
                    <div class="form__field">
                        <input type="text" id="achternaam" name="lastname" placeholder="Achternaam">
                    </div>

                    <!-- email -->
                    <div class="form__field">
                        <input type="text" id="email" name="email" placeholder="Email">
                    </div>

                    <!-- wachtwoord -->
                    <div class="form__field">
                        <input type="password" id="wachtwoord" name="password" placeholder="Wachtwoord">
                    </div>

                    <p class="sentence">Op basis van jouw woonplaats bekijken we welke Mechelse Vest jij mag inrichten!</p>

                    <!-- straatnaam -->
                    <div class="form__field">
                        <input type="text" id="straatnaam" name="streetname" placeholder="Straatnaam">
                    </div>

                    <!-- huisnummer -->
                    <div class="form__field">
                        <input type="text" id="huisnummer" name="number" placeholder="Huisnummer">
                    </div>

                    <!-- plaats -->
                    <div class="form__field">
                        <input type="text" id="plaats" name="place" placeholder="Plaats">
                    </div>

                    <!-- btn -->
                    <div class="form__field">
                        <input type="submit" value="Registreren" class="btn-registreren">
                    </div>

                    <!-- login -->
                    <p class="login">Heb je al een Buurtstem-account? <a href="login.php" target="_blank"><strong>Aanmelden</strong></a></p>

                </form>
            </div>
        </div>
    </div>
</body>
</html>