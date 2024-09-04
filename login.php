<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["user"]) && isset($_POST["pass"])) {
    
        $username = $_POST["user"];
        $password = $_POST["pass"];
        
   
        if ($username === "admin" && $password === "password") {
            // Redirect to a welcome page or perform further actions
            header("Location: admin_page.html");
            exit();
        } else {
            // If credentials are invalid, redirect back to the login page with an error message
            header("Location: error");
            exit();
        }
    }
}

// If the form is accessed directly without submission, redirect back to the login page
header("Location: login.html");
exit();
?>
