
<?php 
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$link=mysqli_connect("localhost", "root","","records_db");
if ($link) {
    
    if (isset($_POST['submit'])) {
        $offisi=$_POST['office'];
       
        $kutoka=$_POST['from'];
        $kwenda=$_POST['to'];
        $bokis=$_POST['box_no'];
        $kichwa=$_POST['file_title'];
        $jina=$_POST['file_no'];
        
        $insert="INSERT INTO record(office,date_from,date_to,box_no,file_title,file_no)
                 VALUES('$offisi','$kutoka', '$kwenda', '$bokis', '$kichwa', '$jina')";

         $run =mysqli_query($link,$insert);
         if ($run) {
                echo "<script>
                alert('data succesfull submited');
                window.location.href = 'tab.php';
                </script>";
                 }else{
                    echo "data failed to submit".mysqli_error($link);
                 }

        
    }
}else {
    echo "failed to connect";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>records_center</title>
<style>
  html, body {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  form {
    background: white;
    padding: 30px 40px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    max-width: 800px;
    width: 100%;
    box-sizing: border-box;
  }

  input{
    width: 100%;
    padding: 10px 14px;
    margin-bottom: 15px;
    border: 1.5px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
  }

  

  label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: #333;
    text-align: center;
  }

  

  button[name="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #007BFF;
    border: none;
    color: white;
    font-size: 18px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  button[name="submit"]:hover {
    background-color: #0056b3;
  }
 
 a{
    background-color: #004080;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    margin-top: -45px;
    position: relative;
    padding: 10px;
    
}
</style>
</head>
<body>
  <div class="form-container">
    <a class="top-link" href="tab.php">view data</a>
    <form action="#" method="POST">
      <input type="text" name="office" id="office" placeholder="enter office or registry" required>

      <label>FILE DATE</label>
      <div class="date-range">
        <div class="date-group">
          <label for="from">From</label>
          <input type="text" name="from" id="from" placeholder="Enter date of stating">
        </div>
        <div class="date-group">
          <label for="to">To</label>
          <input type="text" name="to" id="to" placeholder="Enter date of ending">
        </div>
      </div>

      <input type="number" name="box_no" id="box" placeholder="Enter Box no" required>
      <input type="text" name="file_no" id="file_no" placeholder="Enter File Reference No">
      <input type="text" name="file_title" id="file" placeholder="Enter File Title/Records description" required>
      <button name="submit" type="submit">Submit</button>
    </form>
  </div>
</body>

</html>
