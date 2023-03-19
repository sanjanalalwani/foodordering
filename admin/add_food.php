<?php include('partials/menu.php');  ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br>
        <br>
        <form action="" method="POST">
<table class="tbl-30">

<tr>
    <td>Title: </td>
    <td>
        <input type="text" name="title" placeholder="title of your food">
    </td>
</tr>
<tr>
    <td>Descriptiom: </td>
    <td>
        <textarea name="description" cols="30" rows="10" placeholder="description"></textarea>
    </td>
</tr>
<tr>
    <td>Price: </td>
    <td>
        <input type="number" name="price" placeholder="price of your food">
    </td>
</tr>
<tr>
    <td>Category: </td>
    <td>
        <select name="category">
            <?php 
$sql="SELECT * FROM tbl_category WHERE active='Yes'";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count>0){
while($row=mysqli_fetch_assoc($res))
{
    $id=$row['id'];
    $title=$row['title'];
    ?>
<option value="<?php echo $id;?>"><?php echo $title; ?></option>
    <?php
}
}
else{
    ?>
<option value="0">No category found</option>
    <?php
}
            ?>
        </select>
    </td>
</tr>
<tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
</table>



        </form>
        <?php
if(isset($_POST['submit']))
{
 $title=$_POST['title'];
 $description=$_POST['description'];
 $price=$_POST['price'];
 $category=$_POST['category'];
 if(isset($_POST['featured'])){
    $featured=$_POST['featured'];
 }
 else{
    $featured="No";
 }
 if(isset($_POST['active'])){
    $active=$_POST['active'];
 }
 else{
    $active="No";
 }

 $sql2="INSERT INTO tbl_food SET
 title='$title',
 description='$description',
 price=$price,
 category_id=$category,
 featured='$featured',
 active='$active'
 ";
 $res2=mysqli_query($conn,$sql2);
 if($res2==true){
$_SESSION['add']="<div class='success'>Food added successfully.</div>";
header('location:'.SITEURL.'admin/manage_food.php');
 }
 else{
    $_SESSION['add']="<div class='error'>failed to add Food.</div>";
    header('location:'.SITEURL.'admin/manage_food.php');
 }
}
        ?>
    </div>
</div>

<?php include('partials/footer.php');  ?>