<?php


// Inialize session
session_start();


// Delete all session variables
 session_destroy();

// Jump to login page
header('Location: sign_in.html');

?> 