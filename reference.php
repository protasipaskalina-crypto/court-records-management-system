<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "records_db");

$search_result = null;
$not_found = false;

if (isset($_POST['look'])) {
    $file_title = mysqli_real_escape_string($link, $_POST['file_title']);

    $select = "SELECT * FROM records WHERE file_title LIKE '%$file_title%'";
    $run = mysqli_query($link, $select);

    if (mysqli_num_rows($run) > 0) {
        $search_result = $run;
    } else {
        $not_found = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Search Results</title>
  <style>
    body, html {
      margin: 0;
      padding: 20px;
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
    }

    .container {
      max-width: 900px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    form {
      margin-bottom: 30px;
    }

    input {
      width: 70%;
      padding: 10px 14px;
      margin-right: 10px;
      border: 1.5px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    button[name="look"] {
      padding: 10px 20px;
      background-color: #007BFF;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    button[name="look"]:hover {
      background-color: #0056b3;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #007BFF;
      color: white;
    }

    .not-found {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 20px;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: #007BFF;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="#" method="POST">
      <input type="text" name="file_title" placeholder="Enter File Title" required />
      <button name="look" type="submit">Search</button>
    </form>

    <?php if ($not_found): ?>
      <div class="not-found">File title not found!</div>
      <a href="index.php">Click here to register new file</a>
    <?php endif; ?>

    <?php if ($search_result): ?>
      <h2>Search Results:</h2>
      <table>
        <thead>
          <tr>
            <th>Office</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Box No</th>
            <th>File Title</th>
            <th>File No</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($search_result)): ?>
            <tr>
              <td><?php echo htmlspecialchars($row['office']); ?></td>
              <td><?php echo htmlspecialchars($row['date_from']); ?></td>
              <td><?php echo htmlspecialchars($row['date_to']); ?></td>
              <td><?php echo htmlspecialchars($row['box_no']); ?></td>
              <td><?php echo htmlspecialchars($row['file_title']); ?></td>
              <td><?php echo htmlspecialchars($row['file_no']); ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>

</body>
</html>
