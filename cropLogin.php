<?php

    //INCLUDES
    include_once __DIR__ . "/model_crop.php";
    include_once __DIR__ . "/functions.php";
    include __DIR__ . "/model/db.php";

    //DYNAMMODB CONNECTION
    // use Aws\DynamoDb\DynamoDbClient;
    // $client = DynamoDbClient::factory(array(
    //     'profile' => 'Malopez1',
    //     'region'  => 'us-east-1'
    // ));

    //PGADMIN SQLCONNECTION
    if(isset($_POST['login'])){
        $userName = pg_escape_string($con,$_POST['userName']);
        $password = pg_escape_string($con,$_POST['password']);

    if ($userName = !"" && $password = !""){

        $sql_query = "select count(0) as cntUser from users where userName='".$userName."' and password='".$password."'";
        $result = pg_query($con,$sql_query);
        $row = pg_fetch_array($result);

        $count = $row['cntUser'];

        $result = checkLogin($userName, $password);

        if($count > 0){
            $_SESSION['userName'] = $userName;
            header('Location: cropView.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style type="text/css">


    .mainDiv {
        box-shadow: 5px 5px 2px gray;
        color: black;
        font-size: large;
        background: #D3D3D3;
        padding: 12px;
        display: inline-block;
    } 
    .col1 {width: 175px; float: left;}
    .col2 {float: left;}
    .rowContainer {clear: none; height: 40px; width: 500px;}  
    .error {margin-left: 100px; clear: left; color: red;} */

    .flex-container {
        width: 200px;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    #logo{
        height: 230px;
        width: 100%;
    }
    

    
    h1, h2, h3{
        align-items: center;
        margin-top: 50px;
        padding-top: 15px;
        font-size: 40px;
        font-family: Helvetica;
        color:#7CCE44;
    } 

    body{
        font-family: Helvetica;
        text-align: center;
    }

</style>
<title>Cropventory|Login</title>
</head>
<body>


<div id="logo">
<img src="images/Cropventoryv2.png" alt="cropventory logo">
</div>
<h2>Welcome Farmer!</h2>
<div class="flex-container">
<div class="mainDiv">
    <form method="post" action="Login.php">
       
        <div class="rowContainer">
            
        </div>
        <div class="rowContainer">
            <div class="col1">User Name:</div>
            <div class="col2"><input type="text" name="userName" ></div> 
        </div>
        <div class="rowContainer">
            <div class="col1">Password:</div>
            <div class="col2"><input type="password" name="password" ></div> 
        </div>
          <div class="rowContainer">
            <div class="col1">&nbsp;</div>
            <div class="col2"><input  name="login" value="Login"  href="Login.php" class="btn btn-warning"></div> 
        </div>
        
    </form>
    
</div>
</div>


<h2>Register Here</h2>
<div class="flex-container">
<div class="mainDiv">
    <form method="post" action="cropLogin.php">
        <div class="rowContainer">

        </div>
        <div class="rowContainer">
            <div class="col1">Email:</div>
            <div class="col2"><input type="text" name="userName"></div> 
        </div>
        <div class="rowContainer">
            <div class="col1">Password:</div>
            <div class="col2"><input type="password" name="password"></div> 
        </div>
          <div class="rowContainer">
            <div class="col1">&nbsp;</div>
            <div class="col2"><input type="submit" name="register" value="Register" class="btn btn-warning"></div> 
        </div>
        
    </div>
</form>
</div>
</body>
</html>