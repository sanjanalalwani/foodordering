<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br>
        <br>
        <form action="" method="POST">
       <table class="tbl-30">
          <tr>
            <td>Food Name</td>
            <td></td>
          </tr>
          <tr>
            <td>Qty</td>
            <td><input type="number" name="qty" value=""></td>
          </tr>
          <tr>
            <td>status</td>
            <td><select name="status">
                <option value="Ordered">Ordered</option>
                <option value="On Delivery">On Delivery</option>
                <option value="Delivered">Delivered</option>
                <option value="Cancelled">Cancelled</option>
            </select></td>
          </tr>
          <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Update Order" class="btn-secondary">
            </td>
          </tr>
       </table>


        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>