<?php include('topbar.php') ?>
<div id="container">
    <span>
        <h1 id="TITLE">ORDERS</h1>
    </span>
    <div id="action">
        <input style="margin: 0; margin-right: 50px;" type="submit" id="add-user" value="+ Add Order" onclick="return addOrder()">
        <input type="submit" id="calcost" value="= Calculate Cost" onclick="return calculateCost()">
    </div>
    <div id="row">
        <table id="table">
            <thead>
                <th class="text-center">#</th>
                <th class="text-center">ORDERS</th>
            </thead>
            <tbody>
                <?php
                include('javascript/ajax/config.php');
                $products = mysqli_query($conn, "SELECT * FROM products WHERE status = 1 ORDER BY name ASC");
                $i = 1;
                while($row = $products->fetch_assoc()):
                ?>
                <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td id="showorder">
                        <input id="showOrder" type="submit" value="<?php echo ucwords($row['name']); ?>" 
                               onclick="return showOrder(<?php echo $row['id']; ?>)">
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
