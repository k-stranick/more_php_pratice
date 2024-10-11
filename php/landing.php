<!--
/*
 * This is the landing page for the Delaware Temperature Data Comparison application.
 * 
 * The page displays a comparison of temperature data between the years 1950 - 2018 and the year 2018.
 * It includes a table that shows the month, temperature data for 1950 - 2018, temperature data for 2018, 
 * and the difference between these two values.
 * 
 * The page uses Bootstrap for styling and includes a custom stylesheet 'style.css'.
 * 
 * PHP is used to include a logic file 'test.php' which provides the temperature comparison data.
 * The data is then looped through and displayed in the table.
 * 
 * The total difference in temperature is displayed at the bottom of the table.
 * 
 * @file landing.php
 * @package DelawareTemperatureComparison
 * @version 1.0
 * 
 * @author Kyle Stranick
 * @copyright Kyle Stranick
 * 
 * @link https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css Bootstrap CSS
 * @link style.css Custom stylesheet
 * 
 * @see test.php Logic file for temperature comparison data
 */
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delaware Temperature Data Comparison</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
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
                    include 'logic.php';

                    // Get the temperature comparison data
                    $data = getTemperatureComparisonData();
                    $comparison = $data['comparison'];
                    $total_diff = $data['total_diff'];

                    // Loop through comparison data to display it
                    // echo is used to create a table row for each month
                    foreach ($comparison as $row) {
                        echo "<tr>";
                        echo "<td>{$row['month']}</td>"; // Display month
                        echo "<td>{$row['temp_1950_2018']}</td>"; // Display temperature data for 1950 - 2018
                        echo "<td>{$row['temp_2018']}</td>"; // Display temperature data for 2018
                        echo "<td>{$row['diff']}</td>"; // Display difference in temperature
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