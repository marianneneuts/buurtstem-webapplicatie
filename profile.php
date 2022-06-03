<?php
    include_once('logged_in.inc.php');
    include_once('core/autoload.php');

    $userId = $_GET["user"];
    $avatar = User::getAvatarById($userId);
    $firstname = User::getFirstnameById($userId);
    $lastname = User::getLastnameById($userId);
    $email = User::getEmailById($userId);
    $biography = User::getBiographyById($userId);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Profile</title>
    <link rel="stylesheet" href="css/profile.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <div class="content">
        <h2>Mijn profiel</h2>
        <br>
        <p>*Je gegevens zijn onzichtbaar gemaakt voor andere gebruikers. Leden van een groep waaraan je zelf deelneemt hebben wél toegang tot je gegevens.</p>

        <div class="card">
            <?php if($_SESSION["userId"] == $_GET["user"]): ?>
                <div class="header">
                    <img src="<?php echo($avatar); ?>" alt="avatar">
                    <a href="edit_profile_picture.php" class="edit"><i class="fa fa-camera" aria-hidden="true" style="color: #C78743; background:transparent;"></i></a>

                    <div class="personal">
                        <h2><?php echo(htmlspecialchars($firstname . " " . $lastname)); ?></h2>
                        
                        <h3 style="opacity: 0.5"><?php echo(htmlspecialchars($email)); ?></h3>
                    </div>
                </div>

                <br>

                <div class="biography">
                    <h2>Mijn biografie</h2>

                    <br>

                    <p><?php echo(htmlspecialchars($biography)); ?></p>

                    <br>

                    <a href="edit_biography.php">
                        <button>Biografie bijwerken</button>
                    </a>
                </div>
            <?php endif; ?>

            <?php if($_SESSION["userId"] != $_GET["user"]): ?>
                <h2>Niks te zien hier!</h2>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>