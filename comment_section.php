<?php
// Path to the comments file
$file = 'comments.txt';

// Handle form submission (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["comment"])) {
    $comment = htmlspecialchars($_POST["comment"]); // Sanitize the comment

    // Append the comment to a text file
    file_put_contents($file, $comment . PHP_EOL, FILE_APPEND);
    exit; // End the request here (no need to return HTML for POST)
}

// Handle fetching comments (GET request)
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get all comments from the text file
    $comments = file_exists($file) ? file($file, FILE_IGNORE_NEW_LINES) : [];

    // Return the comments in an unordered list format
    foreach ($comments as $comment) {
        echo "<li>" . htmlspecialchars($comment) . "</li>";
    }
}
?>
