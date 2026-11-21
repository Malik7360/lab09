<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lab 09 - search for a car by model">
    <meta name="author" content="Ahmed">
    <title>Lab 09 - Search Cars</title>
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
        <h2>Search by Model</h2>
        <form action="search_result.php" method="get">
            <p>
                <label for="model">Car model:</label>
                <input type="text" id="model" name="model" placeholder="e.g. Corolla" required>
                <input type="submit" value="Search">
            </p>
        </form>
    </main>
</body>
</html>