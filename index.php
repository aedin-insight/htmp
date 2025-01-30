<?php
// Determine the requested action
$action = $_GET['action'] ?? 'home';

if ($action === 'home') {
    echo "<h1>Welcome to My HTMX-Style PHP</h1>
          <button hx-get='index.php?action=time' hx-target='#output'>Get Time</button>
          <button hx-get='index.php?action=users' hx-target='#output'>Load Users</button>
          <button hx-get='index.php?action=form' hx-target='#output'>Show Form</button>
          <div id='output'></div>";
} 
elseif ($action === 'time') {
    echo "<p>Current Time: " . date("h:i:s A") . "</p>";
} 
elseif ($action === 'users') {
    $users = [
        ["id" => 1, "name" => "Alice", "age" => 25],
        ["id" => 2, "name" => "Bob", "age" => 28]
    ];
    echo "<table><tr><th>ID</th><th>Name</th><th>Age</th></tr>";
    foreach ($users as $user) {
        echo "<tr><td>{$user['id']}</td><td>{$user['name']}</td><td>{$user['age']}</td></tr>";
    }
    echo "</table>";
} 
elseif ($action === 'form') {
    echo "<form hx-post='index.php?action=submit' hx-target='#output'>
            <label for='name'>Your Name:</label>
            <input type='text' id='name' name='name' required>
            <button type='submit'>Submit</button>
          </form>";
} 
elseif ($action === 'submit' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    echo "<p><b>Thanks, $name!</b> Your form has been submitted.</p>";
} 
else {
    echo "<p>Invalid request.</p>";
}
?>