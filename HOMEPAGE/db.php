<?php
// db.php - Database connection
function getDB() {
    $db = new SQLite3('tutoring.db');
    return $db;
}
?>