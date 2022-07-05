<?php
    require 'database.php';
    $ProductID = 0;
     
    if ( !empty($_GET['ProductID'])) {
        $ProductID = $_REQUEST['ProductID'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $ProductID = $_POST['ProductID'];

        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM info  WHERE ProductID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($ProductID));
        Database::disconnect();
        header("Location: databarang.php");
    }
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT ProductName FROM info where ProductID = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($ProductID));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <h1>Delete Product</h1>
        <form class="form-horizontal" action="user data delete page.php" method="post" style="margin:auto;width:25%">
            <input type="hidden" name="ProductID" value="<?php echo $ProductID;?>"/>
            <p class="alert alert-error">Are you sure to delete <strong>'Product <?php echo $data['ProductName'];?>'</strong> ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn btn-success" href="databarang.php">No</a>
            </div>
        </form>
    </body>
</html>