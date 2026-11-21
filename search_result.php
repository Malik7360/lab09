<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lab 09 - car search results">
    <meta name="author" content="Ahmed">
    <title>Lab 09 - Search Results</title>
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
        <h2>Search Results</h2>
<?php
require_once "settings.php";
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p>Unable to connect to the db.</p>\n";
} else {
    if (isset($_GET['model']) && trim($_GET['model']) !== "") {
        $model = mysqli_real_escape_string($conn, trim($_GET['model']));

        // Partial match: "cor" finds "Corolla", "Commodore" etc.
        $sql = "SELECT * FROM cars WHERE model LIKE '%$model%'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
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
            echo "</table>\n";
            mysqli_free_result($result);
        } else {
            echo "<p>No matching cars found.</p>\n";
        }
    } else {
        echo "<p>Please enter a model to search.</p>\n";
    }

    mysqli_close($conn);
}
?>
        <p><a href="search_form.php">New search</a></p>
    </main>
</body>
</html>
