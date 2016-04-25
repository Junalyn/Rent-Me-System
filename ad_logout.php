<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ad_index.php"); // Redirecting To Admin Login PAge
}
?>