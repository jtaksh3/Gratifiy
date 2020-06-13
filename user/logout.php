<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['username'])) {
    // unset session variables
    session_unset();
    // destroy the session
    session_destroy();

    return 'SUCCESS';
}
?>
