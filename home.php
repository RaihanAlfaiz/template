<?php

include "header.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <table border="1" height="40%" width="50%" align="center">
        <td>
            Selamat datang <?php echo $_SESSION['username'] ?> di aplikasi peduli diri
        </td>
    </table>
</body>

</html>