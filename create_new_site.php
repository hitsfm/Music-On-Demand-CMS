<?php
if (isset($_POST['sitename']) && isset($_POST['foldername'])) {
    // Get form data and sanitize
    $sitename = htmlspecialchars($_POST['sitename']);
    $foldername = htmlspecialchars($_POST['foldername']);

    // Create new PHP file based on template
    $template_file = 'newsite.php';
    $new_file = $sitename . '.php';
    $template_contents = file_get_contents($template_file);
    $new_contents = str_replace('{{sitename}}', $sitename, $template_contents);
    $new_contents = str_replace('{{foldername}}', $foldername, $new_contents);
    file_put_contents($new_file, $new_contents);

    // Add new link to the navbar
    $index_file = 'index.php';
    $doc = new DOMDocument();
    $doc->loadHTMLFile($index_file);
    $xpath = new DOMXPath($doc);
    $nav = $xpath->query("//div[@class='sidenav']")->item(0);
    $new_link = $doc->createElement('a', $sitename);
    $new_link->setAttribute('href', $new_file);
    $nav->appendChild($new_link);
    $updated_contents = $doc->saveHTML();
    file_put_contents($index_file, $updated_contents);

    // Redirect to the new site
    header('Location: ' . $new_file);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create New Site</title>
</head>
<body>
    <h1>Create New Site</h1>
    <form method="post" action="">
        <label for="sitename">Site Name:</label>
        <input type="text" name="sitename" id="sitename"><br><br>
        <label for="foldername">Folder Name:</label>
        <input type="text" name="foldername" id="foldername"><br><br>
        <input type="submit" value="Create Site">
    </form>
</body>
</html>
