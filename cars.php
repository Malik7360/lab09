<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lab 09 - list of used cars from the exhibition_db database">
    <meta name="author" content="Ahmed">
    <title>Lab 09 - Cars</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <h1>Used Car Dealership</h1>
        <nav>
            <a href="cars.php">All cars</a> |
            <a href="search_form.php">Search</a>
        </nav>
    </header>

    <main>
        <h2>All Cars</h2>
<?php
// Step 1: Connect to the database
require_once "settings.php";
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($dbconn) {
    // Step 2: Create the SQL query
    $query = "SELECT * FROM cars";

    // Step 3: Execute the query
    $result = mysqli_query($dbconn, $query);

    // Step 4: Did it work?
    if ($result && mysqli_num_rows($result) > 0) {
        // Task 7: Table headings first
        echo "<table>\n";
        echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>\n";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['make']) . "</td>";
            echo "<td>" . htmlspecialchars($row['model']) . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>\n";
        }

        echo "</table>\n";   // close the table tag
        mysqli_free_result($result);
    } else {
        echo "<p>There are no cars to display.</p>\n";
    }

    // Step 5: Close the connection
    mysqli_close($dbconn);
} else {
    echo "<p>Unable to connect to the db.</p>\n";
}
?>
    </main>
</body>
</html>