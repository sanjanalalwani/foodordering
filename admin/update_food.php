<?php
include('partials/menu.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];
} else {
    header('location:' . SITEURL . 'admin/manage_food.php');
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>
                <tr>
                <tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <?php
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    //echo "<option value='$category_id'>$category_title</option>";
                            ?>
                                    <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                <?php
                                }
                            } else {
                                //echo "<option value='0'>Category Not Available</option>";
                                ?>
                                <option value="<?php if ($current_category == $categpry_id) {
                                                    echo "Selected";
                                                } ?>"></option>
                            <?php
                            }
                            ?>

                            <option value="0">Test Category</option>
                        </select>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if ($featured == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if ($featured == "No") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
        <?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    $sql3="UPDATE tbl_food SET
    title='$title',
description='$description',
price=$price,
category_id='$category',
featured='$featured',
active='$active'
WHERE id=$id
    ";
    $res3=mysqli_query($conn,$sql3);
    if($res3==true){
$_SESSION['update']="<div class='success'>Food updated successfully</div>";
header('location:'.SITEURL.'admin/manage_food.php');
    }
    else{
        $_SESSION['update']="<div class='success'>Failed to update Food</div>";
        header('location:'.SITEURL.'admin/manage_food.php');
    }
}
        ?>
    </div>
</div>

<?php
include('partials/footer.php');
?>