<?php 
    session_start();

    session_destroy();
    // echo '<script> document.location = "index" </script>';
    echo '<script>
            window.history.go(-1);
        </script>';
?>