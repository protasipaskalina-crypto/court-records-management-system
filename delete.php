<?php
$link=mysqli_connect("localhost","root","","records_db");
if(isset($_GET['file_no'])){
    $file_no = $_GET['file_no'];
    $sql = "DELETE FROM records WHERE file_no = '$file_no'";

    $result = mysqli_query($link, $sql);

     if($result){
        echo "<script>
            alert('data deleted successfully');
            window.location.href ='table.php'
            </script>";
    }
    else{
        echo "Delete error". mysqli_error($link);
    }
}
?>
