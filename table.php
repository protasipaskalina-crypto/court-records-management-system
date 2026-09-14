<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Center</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            margin: 20px;
            padding: 0;
        }
        
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
}
.top-right-link {
    width: 90%;
    margin: 0 auto;
    display: flex;
    justify-content: flex-end;
    margin-bottom: 10px;
}

.top-right-link a {
    background-color: #004080;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
}

.top-right-link a:hover {
    background-color: #0066cc;
}


        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #004080;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            font-size: 13px;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>RECORDS CENTRE TRANSFER FORM</h1>
    <table>
        <tr>
            <th>SN</th>
            <th>Box No</th>
            <th>registry</th>
            <th>File Reference No</th>
            <th>File Title / Records Description</th>
            <th>From</th>
            <th>To</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        


        <?php
session_start();
$link = mysqli_connect("localhost", "root", "", "records_db");

$cuont = 1;
$select = "SELECT * FROM records";
$run = mysqli_query($link, $select);
mysqli_num_rows($run)>0; 
while($rows= mysqli_fetch_assoc($run)){
  ?>
    <tr>
        <td><?php echo $cuont++; ?></td>
        <td><?php echo $rows['box_no']; ?></td>
        <td><?php echo $rows['office']; ?></td>
        <td><?php echo $rows['file_no']; ?></td>
        <td><?php echo $rows['file_title']; ?></td>
        <td><?php echo $rows['date_from']; ?></td>

        <td><?php echo $rows['date_to']; ?></td>
        <td><a href="edit.php?file_no=<?php echo $rows['file_no']; ?>">edit</a></td>
        <td><a href="delete.php?file_no=<?php echo $rows['file_no']; ?>"
         onclick="return confirm('Are you sure, you want to delete this user?')">delete</a></td>

    </tr>
    <?php
    
}

?>
<div class="top-right-link">
    <a href="reference.php">Search</a>
</div>

        
       
    </table>
</body>
</html>
