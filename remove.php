<?php
$link=mysqli_connect("localhost","record_user","12345678","records_db");
if(isset($_GET['file_no'])){
    $file_no = $_GET['file_no'];
    $sql = "DELETE FROM record WHERE file_no = '$file_no'";

    $result = mysqli_query($link, $sql);

     if($result){
        echo "<script>
            alert('data deleted successfully');
            window.location.href ='tab.php'
            </script>";
    }
    else{
        echo "Delete error". mysqli_error($link);
    }
}
?>
