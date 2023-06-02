<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pesconvert";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Function to truncate and insert data into a table
function truncateAndInsertData($conn, $table, $data, $delimiter) {
    // Truncate the table
    $truncateQuery = "TRUNCATE TABLE $table";
    $conn->exec($truncateQuery);

    // Explode the input data and insert each row
    $rows = explode("\n", $data);
    foreach ($rows as $row) {
        $rowData = str_getcsv($row, $delimiter);

        // Generate the insert query dynamically based on the number of columns
        $columnCount = count($rowData);
        $insertQuery = "INSERT INTO $table VALUES (" . rtrim(str_repeat('?,', $columnCount), ',') . ")";
        $stmt = $conn->prepare($insertQuery);

        // Bind the parameters and insert the data
        foreach ($rowData as $index => $value) {
            $stmt->bindValue($index + 1, $value);
        }

        $stmt->execute();
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit1'])) {
        // Truncate and insert data into "pes6" table
        $data = $_POST['data1'];
        $delimiter = ',';
        truncateAndInsertData($conn, 'pes6', $data, $delimiter);
        echo "Data inserted into pes6 table.";
    }

    if (isset($_POST['submit2'])) {
        // Truncate and insert data into "pes2021" table
        $data = $_POST['data2'];
        $delimiter = ';';
        truncateAndInsertData($conn, 'pes2021', $data, $delimiter);
        echo "Data inserted into pes2021 table.";
    }
}

// Generate and download CSV file for "pes2021" table
if (isset($_POST['download'])) {
    $filename = "pes2021_data.csv";
    $output = fopen($filename, 'w');
    $selectQuery = "SELECT * FROM pes2021";
    $stmt = $conn->query($selectQuery);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Write the column headers to the CSV file
    fputcsv($output, array_keys($rows[0]));

    // Write the data rows to the CSV file
    foreach ($rows as $row) {
        fputcsv($output, $row);
    }

    fclose($output);

    // Set headers to force download
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    readfile($filename);
    exit();
}

$conn = null; // Close the database connection
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Import and CSV Download</title>
	<style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
            resize: vertical;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button {
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label for="data1">Data (Player Stats) for PES 6 (comma separated):</label><br>
        <textarea name="data1" id="data1" rows="5" cols="50"><?php echo $_POST['data1'] ?? ''; ?></textarea><br><br>

        <label for="data2">Data (Player Stats) for PES 2021 (semicolon separated):</label><br>
        <textarea name="data2" id="data2" rows="5" cols="50"><?php echo $_POST['data2'] ?? ''; ?></textarea><br><br>

        <input type="submit" name="submit1" value="Insert into pes6">
        <input type="submit" name="submit2" value="Insert into pes2021">
        
    </form>
    <button onclick="downloadCSV()">Download CSV</button>

        <script>
            function downloadCSV() {
                window.location.href = 'download.php';
            }
        </script>
</body>
</html>