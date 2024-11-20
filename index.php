<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Server Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
    <h1>Server Dashboard</h1>
    <div id="content">
        <section id="temperature">
            <h2>Temperature</h2>
            <div id="temp-graph">Loading...</div>
        </section>
        <section id="network">
            <h2>Network Stats</h2>
            <p id="ip">IP: Loading...</p>
        </section>
        <!-- More sections here -->
    </div>
    <button onclick="updateAll()">Update All</button>
    <script src="assets/scripts.js"></script>
</body>
</html>
