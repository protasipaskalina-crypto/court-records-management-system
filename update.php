
<?php 
$link = mysqli_connect("localhost", "root", "", "records_db");
$rows = [];

if (isset($_GET['file_no'])) {
    $file_no = $_GET['file_no'];
    $select = "SELECT * FROM record WHERE file_no = '$file_no'";
    $result = mysqli_query($link, $select);
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['submit'])) {
    $date_f = $_POST['from'];
    $date_t = $_POST['to'];
    $box = $_POST['box_no'];
    $file_n = $_POST['file_no'];  // Hidden input
    $title = $_POST['file_title'];

    $update = "UPDATE record SET box_no='$box', file_title='$title', date_from='$date_f', date_to='$date_t' WHERE file_no='$file_n'";
    $run = mysqli_query($link, $update);

    if ($run) {
        echo "<script>alert('Record updated successfully!');
        window.location.href='tab.php'</script>";
        // Refresh data after update
        $select = "SELECT * FROM record WHERE file_no = '$file_n'";
        $result = mysqli_query($link, $select);
        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_assoc($result);
        }
    } else {
        echo "Data failed to update";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
 <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        input,
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
        </style>
   
<body>
    <form action="#" method="POST">

    

    <input type="text" name="from" id="from" value="<?php echo $rows['date_from']; ?>">
<input type="text" name="to" id="to" value="<?php echo $rows['date_to'] ; ?>">

<input type="number" name="box_no" id="box" value="<?php echo $rows['box_no'] ; ?>" placeholder="Enter Box no" required>
<input type="text" name="file_no" id="file_no" value="<?php echo $rows['file_no']; ?>" placeholder="Enter File Reference No">
<input type="text" name="file_title" id="file" value="<?php echo $rows['file_title']; ?>" placeholder="Enter File Title/Records description" required>

    <button name="submit" type="submit">Submit</button>
    </form>
</body>
</html>


