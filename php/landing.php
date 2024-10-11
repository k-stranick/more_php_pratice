<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delaware Temperature Data Comparison</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <h2 class="card-header">Delaware Temperature Data Comparison (1950 - 2018)</h2>
            <table>
                <tr>
                    <th>Month</th>
                    <th>1950 - 2018</th>
                    <th>2018</th>
                    <th>Difference</th>
                </tr>
                <div class="container mt-5">
                    <?php
                    // Include the logic file
                    include 'test.php';

                    // Get the temperature comparison data
                    $data = getTemperatureComparisonData();
                    $comparison = $data['comparison'];
                    $total_diff = $data['total_diff'];

                    // Loop through comparison data to display it
                    foreach ($comparison as $row) {
                        echo "<tr>";
                        echo "<td>{$row['month']}</td>";
                        echo "<td>{$row['temp_1950_2018']}</td>";
                        echo "<td>{$row['temp_2018']}</td>";
                        echo "<td>{$row['diff']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </div>
            </table>
            <p class="total-box"><strong>Total Difference:</strong> <?= $total_diff ?></p>
        </div>
    </div>
</body>

<!-- Footer -->
<footer>
    Powered by Kyle Stranick. All Rights Reserved.
</footer>

</html>