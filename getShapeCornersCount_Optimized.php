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
    // Predefined map of shapes and their corner counts
    static $shapeCorners = [
        'circle' => 0,
        'square' => 4,
    ];

    // Handle the case where no shapes are provided
    if (!$shapeNames) {
        $emptyInputMessage = "No shapes provided.";
        echo $emptyInputMessage . PHP_EOL;
        return $emptyInputMessage;
    }

    // Use a buffer to construct the result
    $result = [];
    foreach ($shapeNames as $shapeName) {
        $result[] = isset($shapeCorners[$shapeName])
            ? "{$shapeName} - {$shapeCorners[$shapeName]}"
            : "{$shapeName} - not defined";
    }

    // Build the final output as a single string
    $formattedOutput = implode(PHP_EOL, $result);

    // Output the result
    echo $formattedOutput . PHP_EOL;

    // Return the result for further use
    return $formattedOutput;
}

getShapeCornersCount('circle', 'square', 'triangle');
