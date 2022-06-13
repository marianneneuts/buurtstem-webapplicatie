<?php
    include_once('logged_in.inc.php');
    include_once('bootstrap.php');

    $userId = $_SESSION['userId'];

    if(!empty($_POST)) {
        if(isset($_POST['biography'])){
            $user = new User();
            $user->setUserId($userId);
            $user->setBiography($_POST['biography']);
            $user->updateBiography();

            header('location: profile.php?user=' . $_SESSION['userId']);
        }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Biografie bijwerken</title>
    <link rel="stylesheet" href="css/edit_biography.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <div class="content">
        <div class="back">
            <a href="profile.php?user=<?php echo($_SESSION['userId']) ?>" class="back"><i class="fas fa-arrow-left" style="color: #C78743;"></i></a>
        </div>

        <br>

        <h2>Biografie bijwerken</h2>

        <br>

        <form action="" method="post">
            <!-- errors -->
            <?php if(isset($error)): ?>
                <div class="form-error">
                    <p><strong>Opgepast:</strong></p>
                    <?php if(isset($error)) { echo $error; }?>
                </div>
            <?php endif; ?>

            <!-- biografie -->
            <div class="form__field">
                <textarea rows="4" cols="50" id="omschrijving" name="biography" placeholder="Schrijf hier een korte introductie van jezelf"></textarea>
            </div>

            <!-- btn -->
            <div class="form__field">
                <input type="submit" name="bijwerken" value="Bijwerken" class="btn-bijwerken">

                <a href="profile.php?user=<?php echo($_SESSION['userId']) ?>" class="annuleren">Annuleren</a>
            </div>
        </form>
    </div>
</body>
</html>