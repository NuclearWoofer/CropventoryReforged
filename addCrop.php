<?php
       //adding 
        include __DIR__ . '/model_crop.php';
        include __DIR__ . '/functions.php';
       if (isPostRequest()) {
        $cropName = filter_input(INPUT_POST, 'cropName');
        $cropPlanted = filter_input(INPUT_POST, 'cropPlanted');
        $cropQty = filter_input(INPUT_POST, 'cropQty');
        
           $result = addCrops ($cropName, $cropPlanted, $cropQty);   
       }
    
?>

<h2>Add Crops</h2>
<h3>Here we can add more crops / plants to your inventory.</h3>
      
  <form class="form-horizontal" action="addCrop.php" method="post">
<!--Date the crop was planted-->
    <div class="form-group">
      <label class="control-label col-sm-2" for="cropPlanted">Date Crop Planted</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="cropPlanted" placeholder="11/22/1963" name="cropPlanted">
      </div>
    </div>
    <!--Quantity of crops-->
    <div class="form-group">
      <label class="control-label col-sm-2" for="cropQty">Quantity:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="cropQty" placeholder="Enter crop quantity" name="cropQty">
      </div>
    </div>
    <!--dropdown of cropName-->
    <div class="form-group">
       <label class="control-label col-sm-2" for="cropName">Crop List</label>
       <div class="col-sm-10">
        <select name="cropName" id="cropName">
            <option value="Tomato">Tomato</option>
            <option value="Potato">Potato</option>
            <option value="Peas">Peas</option>
            <option value="Watermelon">Watermelon</option>
            <option value="Pumpkin">Pumpkin</option>
            <option value="Sunflower">Sunflower</option>
            <option value="Cucumber">Cucumber</option>
            <option value="Squash">Squash</option>
        </select>
       </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Plant this Plant!</button>
        <?php
            if (isPostRequest()) {
                echo "Plant successfully Planted!";
            }
        ?>
      </div>
    </div>
  </form>
  </div>