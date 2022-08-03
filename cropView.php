<?php
        include __DIR__ . '/model_crop.php';
        include __DIR__ . '/functions.php';
       if (isPostRequest()) {
        $cropName = filter_input(INPUT_POST, 'cropName');
        $cropPlanted = filter_input(INPUT_POST, 'cropPlanted');
        $cropQty = filter_input(INPUT_POST, 'cropQty');
           $result = addCrops ($cropName, $cropPlanted, $cropQty);
       }
    ?>
<html lang="en">
<head>
  <title>Cropventory Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
</style>
<body>
<!-------------------------------------------------------INVENTORY--------------------------------------------------------------------------------------------------------->

<?php
    
    include __DIR__ . '/model_crop.php';
    include __DIR__ . '/functions.php';
    if (isPostRequest()) {
        $cropId = filter_input(INPUT_POST, 'cropId');
        deleteCrop ($cropId);
    }
    $crops = getCrops ();
?>
<div class="container">
        <div class="col-sm-offset-2 col-sm-10">
            <h1>Inventory</h1>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Crop ID</th>
                        <th>Crop/Plant Name</th>
                        <th>Date Planted</th>
                        <th>Quantity</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($crops as $row): ?>
                    <tr>
                        <td>
                            <form action="cropView.php" method="post">
                                    <input type="hidden" name="cropId" value="<?= $row['cropId']; ?>" />
                                    <button class="btn glyphicon glyphicon-trash" type="submit"></button>
                                    <?php echo $row['cropId']; ?>
                                </form>
                       </td>
                        <td><?php echo $row['cropName']; ?></td> 
                        <td><?php echo $row['cropPlanted']; ?></td> 
                        <td><?php echo $row['cropQty'] ?></td> 
                        <td><a href="editCrop.php?action=update&cropId=<?= $row['cropId'] ?>">Edit Crop Info</a></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
<!-------------------------------------------------------END INVENTORY---------------------------------------------------------------------------------------------------->

</body>
</html>