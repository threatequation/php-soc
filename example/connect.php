<?php

/*

bWAPP, or a buggy web application, is a free and open source deliberately insecure web application.
It helps security enthusiasts, developers and students to discover and to prevent web vulnerabilities.
bWAPP covers all major known web vulnerabilities, including all risks from the OWASP Top 10 project!
It is for security-testing and educational purposes only.

Enjoy!

Malik Mesellem
Twitter: @MME_IT

bWAPP is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (http://creativecommons.org/licenses/by-nc-nd/4.0/). Copyright © 2014 MME BVBA. All rights reserved.

*/

// Connection settings
include 'admin/settings.php';

// Connects to the server
$link = mysqli_connect( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT );

// Checks the connection
if ( !$link ) {

    // @mail($recipient, "Could not connect to server: ", mysqli_error($link));

    die('Could not connect to the server: '.mysqli_error( $link ) );
}

// mysql_close($link);
;
