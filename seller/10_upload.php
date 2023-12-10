<?php
// Include the database configuration file  
require_once 'connectDB.php';

$fruit_name = $_POST["fruit_name"];

$judge = mysqli_query($conn, "SELECT * FROM inventory WHERE fruit_name = lower('$fruit_name')");
if ($judge->num_rows > 0){
    // If file upload form is submitted 
$status = $statusMsg = '';
if (isset($_POST["submit"])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database 
            $insert = $conn->query("UPDATE inventory_image SET image = '$imgContent' WHERE fruit_name = lower('$fruit_name')");

            if ($insert) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}

// Display status message 
echo $statusMsg;
}else{
    echo "The fruit you input $fruit_name is not in inventory. Please check!";
}


echo "<br><a href = '10_view_image.php'>Back</a>";
?>