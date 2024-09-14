<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Selection</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Body Styling */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f4f4f4;
            text-align: center;
            color: #333;;
        }

        /* Heading Styling */
        h1 {
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: black;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        }
        h2 {
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: blueviolet;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        }

        /* Container Styling */
        .container {
            background: white;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Label Styling */
        label {
            display: block;
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
        }

        /* Select Dropdown Styling */
        select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 2px solid white;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s;
            cursor: pointer;
        }

        /* Hover and Focus Effects */
        select:hover, select:focus {
            border-color: black;
        }

        /* Option Styling */
        option {
            padding: 10px;
            
        }

        /* Responsive Media Query */
        @media (max-width: 500px) {
            .container {
                width: 90%;
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <h1>Hi, Welcome to Our Banking Management System Project</h1>
    <h2> This is our first Project on PHP and SQL</h2>
    <h2>Course CSE370</h2>

    <div class="container">
        <label for="cars">Choose a Bank:</label>
        <select name="cars" id="cars" onchange="redirectToPage()">
            <option value="">--Select your Bank--</option>
            <option value="bank.php">Capitalcode Bank</option>
            <option value="saab.php">Naimur's bank</option>
            <option value="mercedes.php">Golden Bank</option>
            <option value="central_bank.php">Central bank</option>
        </select>
    </div>

    <script>
        function redirectToPage() {
            // Get the selected value from the dropdown
            var selectedPage = document.getElementById("cars").value;

            // Check if a valid option was selected (not the placeholder)
            if (selectedPage) {
                // Redirect to the PHP page based on the selected option
                window.location.href = selectedPage;
            }
        }
    </script>
</body>
</html>
