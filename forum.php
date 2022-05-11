<?php include_once('logged_in.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Forum</title>
    <link rel="stylesheet" href="css/forum.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>

    <div class="content">
        <h2>Het forum</h2>

        <br>

        <!-- topic toevoegen -->
        <div class="topic">
            <a href="add_topic.php" class="add">Voeg een nieuw topic toe! <i class="fas fa-plus" style="color: #C78743;"></i></a>
        </div>

        <br>

        <!-- tabel -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titel</th>
                    <th scope="col">Bekeken</th>
                    <th scope="col">Reacties</th>
                    <th scope="col">Datum</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Buurtstem</td>
                    <td>0</td>
                    <td>0</td>
                    <td>2022-05-11</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>