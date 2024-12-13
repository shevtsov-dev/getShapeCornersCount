<?php

/**
 * Returns a formatted string containing the names of shapes and their respective corner counts.
 * If no shapes are provided or an unknown shape is encountered, an appropriate message is displayed.
 *
 * @param string ...$shapeNames List of shape names to process.
 * @return string Formatted result with shape names and corner counts.
 */
function getShapeCornersCount(string ...$shapeNames): string
{
    // Check if shape names are provided
    if ($shapeNames) {
        // Map of known shapes and their corner counts
        $shapeCorners = [
            'circle' => 0,
            'square' => 4,
        ];

        // Build the result array
        $result = [];
        foreach ($shapeNames as $shapeName) {
            if (isset($shapeCorners[$shapeName])) {
                // If shape is recognized, add its corner count
                $result[] = "{$shapeName} - {$shapeCorners[$shapeName]}";
            } else {
                // If shape is unknown, mark it as not defined
                $result[] = "{$shapeName} - not defined";
            }
        }

        // Generate the final output as a string
        $formattedOutput = implode(PHP_EOL, $result);

        // Print the result to the console
        echo $formattedOutput . PHP_EOL;

        // Return the result for potential use
        return $formattedOutput;
    } else {
        // Handle the case where no shapes are provided
        $emptyInputMessage = "There are no shapes in input.";
        echo $emptyInputMessage . PHP_EOL;
        return $emptyInputMessage;
    }
}


getShapeCornersCount('circle', 'square', 'triangle');
