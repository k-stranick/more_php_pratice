
<?php
// Author: Kyle Stranick
// Class: ITN264-201 Web App Development
// Assignment: Temperature Data Comparison

/**
 * Retrieves temperature comparison data between the years 1950-2018 and the year 2018.
 *
 * This function processes a predefined 2D array of temperature data for each month,
 * calculates the difference between the average temperature from 1950-2018 and the temperature in 2018,
 * and assigns a color code based on the magnitude of the difference.
 *
 * @return array An array of associative arrays, each containing:
 *  - 'month' (string): The month.
 *  - 'temp_1950_2018' (float): The average temperature from 1950-2018.
 *  - 'temp_2018' (float): The temperature in 2018.
 *  - 'diff' (string): The difference between the 2018 temperature and the 1950-2018 average, formatted to one decimal place.
 *  - 'color' (string): The color code representing the magnitude of the difference ('red' for significant increase, 'green' for significant decrease, 'black' for minor change).
 */
function getTemperatureComparisonData()
{
    // 2D array: each row is [Month, 1950-2018 temp, 2018 temp]
    $temps = [
        ["Jan", 33.6, 32.6],
        ["Feb", 35.6, 42.9],
        ["Mar", 43.1, 40.3],
        ["Apr", 53.2, 51.4],
        ["May", 62.7, 68.1],
        ["Jun", 71.5, 72.5],
        ["Jul", 76.3, 77.1],
        ["Aug", 74.6, 78.6],
        ["Sep", 68.0, 73.2],
        ["Oct", 57.0, 60.1],
        ["Nov", 46.7, 45.3],
        ["Dec", 37.7, 41.0]
    ];

    $comparison = []; //initialize an empty array to store data to be compared
    $total_diff = 0; //initialize a variable to store the total difference

    for ($i = 0; $i < count($temps); $i++) {
        $month = $temps[$i][0]; // gets the month and stores it in the $month variable
        $temp_1950_2018 = $temps[$i][1]; // gets the average temperature from 1950-2018 and stores it in the $temp_1950_2018 variable
        $temp_2018 = $temps[$i][2]; // gets the temperature in 2018 and stores it in the $temp_2018 variable
        $diff = $temp_2018 - $temp_1950_2018; // calculates the difference between the 2018 temperature and the 1950-2018 average
        $total_diff += $diff; // adds the difference to the total difference

        $comparison[] = [ // adds the comparison data to the $comparison array
            'month' => $month,
            'temp_1950_2018' => $temp_1950_2018,
            'temp_2018' => $temp_2018,
            'diff' => highlight_difference($temp_1950_2018, $temp_2018), // calls the highlight_difference function to format the difference
            //'color' => $color,
        ];
    }

    return [
        'comparison' => $comparison,
        'total_diff' => highlight_difference(0, $total_diff)
    ]; // returns the comparison data and the total difference
}

// Function to calculate the difference and highlight significant variations
function highlight_difference($avg1, $avg2)
{
    $difference = $avg2 - $avg1;
    if (abs($difference) > 2) {
        $color = $difference > 0 ? 'red' : 'green';
        return "<span style='color: $color;'>" . sprintf("%.1f", $difference) . "</span>";
    }
    return sprintf("%.1f", $difference); // No color for differences within the ±2 range
}
?>