<!DOCTYPE html>
<html>
<head>
    <title>Crop Data Display</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            color:green;
            border-color: black;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Crop Data</h2>

<?php
// Function to parse CSV file and return data as an array
function parseCSV($csvFile) {
    $data = [];
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}

// Change 'crops.csv' to your CSV file path
$csvFile = 'crop.csv';
$data = parseCSV($csvFile);

if (!empty($data)) {
    echo '<table>';
    // Display table header
    echo '<tr>';
    foreach ($data[0] as $cell) {
        echo '<th>' . htmlspecialchars($cell) . '</th>';
    }
    echo '</tr>';

    // Display table rows
    for ($i = 1; $i < count($data); $i++) {
        echo '<tr>';
        foreach ($data[$i] as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No data found in CSV file.</p>';
}
?>

</body>
</html>
