<?php include('partials_front/menu1.php'); ?>
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>

<?php
if(isset($_SESSION['order'])){
  echo $_SESSION['order'];
  unset($_SESSION['order']);
}
?>



<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Categories of Food</h2>
        <?php
        $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
        ?>
                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">

                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a> <?php
                    }
                } else {
                    echo "<div class='error'>Category Not Available</div>";
                }
                        ?>>

                <div class="clearfix"></div>
    </div>
</section>





<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Caterings: </h2>
        <?php
        $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes'";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
        ?>
                <div class="food-menu-box">


                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">Rs. <?php echo $price; ?></p>
                        <p class="food-detail">
                           <?php echo $description;  ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div error='error'>Food Not Available</div>";
        }
        ?>






        <div class="clearfix"></div>
    </div>
    <p class="text-center">
        <a href="#">See All Catering</a>
    </p>
</section>
<?php include('partials_front/footer1.php'); ?>