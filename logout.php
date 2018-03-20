<?php

session_start();
session_destroy();
echo "<script>alert('Até já, nos vemos em breve! \r\nObrigado!');</script>";
echo "<meta http-equiv='refresh' content='5;URL=act-account.php'>";

?>