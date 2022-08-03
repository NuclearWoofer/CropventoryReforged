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
        $crops = getCrops ();  
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login.php');
    }
?> 

 
<?php
    include __DIR__ . '/includes/searchFrom.php';
    include __DIR__ . '/includes/sortForm.php';
    include __DIR__ . '/includes/view.php';
?>