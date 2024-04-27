<?php
// Include the database connection
include 'db_connection.php';


// Function to get all pets
function getAllBlogs() {
    global $conn;
    $sql = "SELECT * FROM blogs";
    $result = mysqli_query($conn, $sql);
    $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $blogs;
}


// Function to get Blog by ID
function getBlogById($id) {
    global $conn;
    $sql = "SELECT * FROM blogs WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}


// Function to update Blog details
function updateBlog($id, $title, $content) {
    global $conn;
    $sql = "UPDATE blogs SET title='$title', content='$content', WHERE id=$id";
    return mysqli_query($conn, $sql);
}

?>
