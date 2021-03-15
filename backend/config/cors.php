<?php 

if(!headers_sent()) {

    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, GoogleDataStudio');
    header('Access-Control-Allow-Credentials: true');
}

