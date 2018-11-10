#Overview

This is Intrusion Detection System and Prevention System for PHP. This plugin help you to make secure your web application form malicious attacked

#Features

###sql injection
####XSS attack
####Insecure Direct Object References
####Sensitive Data Exposure
####Missing Function Level Access Control

#Requirement

PHP5.4
###PHP extension
php PDO
php-curl
php-bigstring



#Example Usage

load composer packges first
then add our function at top So that for every request first run our application

	try {
        // initialize application
        $init= new \TE\Init(['product_id'=>'your poduct id', 
        'api_token'=>' your api token',
        'composerLock'=> __DIR__.'/composer.lock']);

        // composerLock => path your composer.lock file 

    
    // collect data you want to scan
    $request = array('GET' => $_GET, 'POST' => $_POST, 'COOKIE' => $_COOKIE);

    //run validation
     $init->runValidation($request);
    
    } catch (Exception $e) {
        printf('ERROR: %s', $e->getMessage());
    }
    	


#version
version: 0.3.0 object inject
version: 0.1.0 21-01-2017
version: alpha
version: pre-alpha 
