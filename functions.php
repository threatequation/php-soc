<?php

include 'vendor/autoload.php';

/**
 * class for threat eqation.
 */


try {

    $init= new \SOCLITE\Init(
        [
            'product_id'    =>'fCYWGevYzc5QwcdGg1XT0Id3mis7QRbJ', 
            'api_token'     =>'ddef4f63f9f12c684a0e1ae0fd228cc146c6b16b',
            'composerLock'  => __DIR__.'/composer.lock'
        ]
    );
    
    
} catch (Exception $e) {
    printf('ERROR: %s', $e->getMessage());
}



try {

    $db = new PDO('mysql:host=localhost;port=3306;dbname=bWAPP', 'root', '');
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    

    

}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}




