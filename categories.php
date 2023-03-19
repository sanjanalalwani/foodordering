<?php include('partials_front/menu1.php'); ?>

<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
        ?>
                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">

                        <h3 class="float-text text-white"><?php echo $title;?></h3>
                    </div>
                </a>
        <?php
            }
        } else {
            echo "<div class='error'>Category Not Found.</div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>

<?php include('partials_front/footer1.php'); ?>