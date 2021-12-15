<?php
$conn = mysqli_connect("localhost","root","","uploads");
if(!$conn){
    echo '<script>
                 alert("Sorry there are some technical issue!");
         </script>';
}
?>