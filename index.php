<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #70ebd5, #acb6e5);
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .button-container {
            display: flex;
            gap: 20px;
        }

        .styled-button {
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .styled-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="button-container">
        
        <a href="register.php" class="styled-button">Personal</a>
        <a href="reg.php" class="styled-button">Subject</a>
    </div>
</body>
</html>
