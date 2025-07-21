<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marks = $_POST['marks'];
    $total = array_sum($marks);
    $average = $total / count($marks);

    if ($average >= 90) {
        $grade = "A+";
    } elseif ($average >= 80) {
        $grade = "A";
    } elseif ($average >= 70) {
        $grade = "B";
    } elseif ($average >= 60) {
        $grade = "C";
    } elseif ($average >= 50) {
        $grade = "D";
    } else {
        $grade = "F";
    }
    
    echo "<h2>Result:</h2>";
    echo "Total Marks: " . $total . "<br>";
    echo "Average: " . number_format($average, 2) . "<br>";
    echo "Grade: " . $grade;
} else {
    echo "Invalid Request!";
}
?>
