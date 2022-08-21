<?php
//**************************
// AWS DATABASE CRED
//**************************



//**************************
// PGADMIN DATABASE CRED
//**************************
    // $ini = parse_ini_file( __DIR__ . '/dbconfig.ini');
    // $g_set_sql_mode = true;

    // $db = new PDO(  "pgsql:host=" . $ini['servername'] . 
    //                 ";port=" . $ini['port'] . 
    //                 ";dbname=" . $ini['dbname'], 
    //                 $ini['username'], 
    //                 $ini['password']);


    // $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// THESE CREDS GO INTO dbconfig.ini TO CONNECT TO PGADMIN
// servername = ec2-50-19-255-190.compute-1.amazonaws.com
// port = 5432
// username = pmuibcycqdcjyx
// password = cd83ea5e98c4341ba6c296aba89a4a0b95725b709ef4705ee37130366b093c97
// dbname = dbbrve4ld95mpp



//**************************
// PGADMIN DATABASE CRED *RIPPED FROM PHP|PGSQL MANUAL
//**************************

    $db_connection = pg_connect("host=ec2-50-19-255-190.compute-1.amazonaws.com dbname=dbbrve4ld95mpp user=pmuibcycqdcjyx password=cd83ea5e98c4341ba6c296aba89a4a0b95725b709ef4705ee37130366b093c97");
?>

