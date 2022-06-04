<?php
    include_once('logged_in.inc.php');
    include_once('core/autoload.php');

    $userId = $_SESSION['userId'];
    $avatar = User::getAvatarById($userId);

    $user = new User();
    if(isset($_POST['update_avatar'])) {
        $currentDirectory = getcwd();
        $uploadDirectory = "/profile_picture/";
    
        $fileName = $userId."_avatar.jpg";
        $fileTmpName = $_FILES['upload_avatar']['tmp_name'];
    
        $fileSaveQuality = 80;
    
        $uploadPath = $currentDirectory . $uploadDirectory . $fileName;
        move_uploaded_file($fileTmpName, $uploadPath);
    
        $picture = "profile_picture/" .$fileName;
        $user->updateAvatar($userId, $picture);
        header('location: profile.php?user=' . $_SESSION['userId']);
    }

    if(isset($_POST['delete_avatar'])) {
        $picture = "profile_picture/default.png";
        $user->updateAvatar($userId, $picture);
        header('location: profile.php?user=' . $_SESSION['userId']);
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Profile</title>
    <link rel="stylesheet" href="css/edit_profile_picture.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>

    <div class="content">
        <div class="back">
            <a href="profile.php?user=<?php echo($_SESSION['userId']) ?>" class="back"><i class="fas fa-arrow-left" style="color: #C78743;"></i></a>
        </div>

        <br>

        <h2>Profielfoto wijzigen</h2>
    
        <div class="card">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="header">
                    <img src="<?php echo($avatar); ?>" alt="avatar">
                </div>
                    
                <div class="buttons">
                    <!-- upload file -->
                    <input type="file" name="upload_avatar" class="upload_avatar" accept="image/png, image/jpeg">
                        
                    <!-- update avatar -->
                    <input type="submit" name="update_avatar" value="Profielfoto bijwerken" class="btn-update">
                        
                    <!-- delete avatar -->
                    <input type="submit" name="delete_avatar" value="Profielfoto verwijderen" class="btn-delete">
                        
                    <!-- cancel -->
                    <a href="profile.php?user=<?php echo($_SESSION['userId']) ?>">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>