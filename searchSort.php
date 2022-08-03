<?php
    include __DIR__ . '/model_crop.php';
    $action = filter_input(INPUT_POST, 'action');
    $fieldName = filter_input(INPUT_POST, 'fieldName');
    $fieldValue = filter_input(INPUT_POST, 'fieldValue');
    if ( $action === 'sort' && $fieldName != '' ) {
            $crops = sortCrops ($fieldName, $fieldValue);   
    }
    else if ( $action === 'search' && $fieldName != '' ) {
            $crops = searchCrops ($fieldName, $fieldValue);
    } else {
        $crops = getcrops ();  
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
            <meta charset="UTF-8">
    <style type="text/css">
        body { 
         
            font-family: Arial, Helvetica, sans-serif;
        }
        .topnav {
        overflow: hidden;
        background-color: #333;
    }

        .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        .topnav a:hover {
        background-color: #ddd;
        color: black;
        }

        .topnav a.active {
        background-color: #7CCE44;
        color: white;
        }
    </style>
        <title>Cropventory: Search & Sort</title>
    </head>
    <body>
    <div class="topnav">
        <a class="active" href="./cropView.php">Cropventory</a>
        <a href="./searchsort.php">Search & Sort</a>
        <a href="https://riphi.org/access-to-healthy-affordable-food/">Food Access Information</a>
        <a href="./documentation.html">Capstone Documentation</a>
        <a href="./login.php">Logout</a>
    </div>
 
        <?php
            include __DIR__ . '/includes/searchFrom.php';
            include __DIR__ . '/includes/sortForm.php';
            include __DIR__ . '/includes/view.php';
        ?>
    </body>
</html>