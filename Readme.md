# Shape Corners Count Function

This repository contains two PHP implementations of a function `getShapeCornersCount`, which determines the number of corners for given shapes. The function supports predefined shapes (e.g., `circle`, `square`) and gracefully handles unknown shapes.

---

## Features

- **Handles Multiple Shapes**: Accepts one or more shape names as input.
- **Predefined Shapes**:
    - `circle` → 0 corners
    - `square` → 4 corners
- **Unknown Shapes**: Marks them as `not defined`.
- **Empty Input**: Returns a message indicating that no shapes were provided.

---

## Usage

Include the function in your PHP project, then call it with the names of the shapes:

```php
getShapeCornersCount('circle', 'square', 'triangle');
```

### Output
```text
circle - 0
square - 4
triangle - not defined
```

---

## Implementations

### 1. **Standard Implementation**

A straightforward solution designed for clarity and maintainability. It uses a local array to map shape names to their corner counts.

#### Code

```php
/**
 * Returns a formatted string containing the names of shapes and their respective corner counts.
 */
function getShapeCornersCount(string ...$shapeNames): string
{
    if ($shapeNames) {
        $shapeCorners = [
            'circle' => 0,
            'square' => 4,
        ];

        $result = [];
        foreach ($shapeNames as $shapeName) {
            if (isset($shapeCorners[$shapeName])) {
                $result[] = "{$shapeName} - {$shapeCorners[$shapeName]}";
            } else {
                $result[] = "{$shapeName} - not defined";
            }
        }

        $formattedOutput = implode(PHP_EOL, $result);
        echo $formattedOutput . PHP_EOL;
        return $formattedOutput;
    } else {
        $emptyInputMessage = "There are no shapes in input.";
        echo $emptyInputMessage . PHP_EOL;
        return $emptyInputMessage;
    }
}
```

---

### 2. **Optimized Implementation**

An optimized version suitable for high-performance applications. It introduces:
- A **static array** for shape mappings to reduce memory overhead during multiple calls.
- Logical condition optimizations for better performance.

#### Code

```php
/**
 * Returns a formatted string containing the names of shapes and their respective corner counts.
 */
function getShapeCornersCount(string ...$shapeNames): string
{
    static $shapeCorners = [
        'circle' => 0,
        'square' => 4,
    ];

    if (!$shapeNames) {
        $emptyInputMessage = "No shapes provided.";
        echo $emptyInputMessage . PHP_EOL;
        return $emptyInputMessage;
    }

    $result = [];
    foreach ($shapeNames as $shapeName) {
        $result[] = isset($shapeCorners[$shapeName])
            ? "{$shapeName} - {$shapeCorners[$shapeName]}"
            : "{$shapeName} - not defined";
    }

    $formattedOutput = implode(PHP_EOL, $result);
    echo $formattedOutput . PHP_EOL;
    return $formattedOutput;
}
```

---

## Testing the Function

You can test the function by passing an array of shape names:

```php
getShapeCornersCount('circle', 'square', 'triangle', 'hexagon');
```

Expected Output:
```text
circle - 0
square - 4
triangle - not defined
hexagon - not defined
```

---