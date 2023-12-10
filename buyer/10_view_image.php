<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Login.css">
</head>
<style>

.div_M{
    width: 100%;
    height: 1400px;
    background: url(Background_2.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    text-align: center;
}

.div_L{
    width: 400px;
    height: 420px;
    background-color: pink;
    position: relative;
    left: 38%;
    top: 15px;
}

.red{
    color: red;
}

.blue{
    color: blue;
}

</style>

<div class="div_M">
<div class="div_L">
<br>
<h2 class="red">View and Edit Pictures of Fruits</h2>
<p class="font_1 blue">Only JPG, JPEG, PNG, & GIF files are allowed to upload.</p>
<form action="10_upload.php" method="post" enctype="multipart/form-data">
    <label class="font_1">Input which fruit picture you want to upload:</label><br>
    <input type="text" class="input_1" name="fruit_name" placeholder="fruit name" required><br><br>
    <input type="file" class="input_2" name="image" value = "as"><br><br>
    <input type="submit" class="input_2" name="submit" value="Upload">

</form>
</div>
<div class="font_1">
<br><br>
<table border="4" align="center" width="800">
    <thead>
        <th>fid</th>
        <th>fruit_name</th>
        <th>image</th>
    </thead>
    <tbody>
        <?php
        include('connectDB.php');
        $query = mysqli_query($conn, "select * from `inventory_image` ORDER BY fid ASC");
        while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td>
                    <?php echo $row['fid']; ?>
                </td>
                <td>
                    <?php echo $row['fruit_name']; ?>
                </td>
                <td>
                    <img width="100" height="100"
                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</div>
<hr><p class="font_1">Back to <a href="03_Admin_index.php">Admin Main Page</a></p>
</div>
</html>
