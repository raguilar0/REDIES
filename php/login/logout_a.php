<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php

    //header('Location: http://localhost/REDIES/login.html');
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    echo "<script>window.location = '../../login.html' </script>";

?>

</body>
</html>
