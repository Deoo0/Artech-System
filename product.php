<?php include('topbar.php');?>
<div id="container">
    <span >
        <h1 id="TITLE" >PRODUCTS</h1>
    </span>
    <input type="submit" id="add-user" value="+ Add Products" onclick="return addProduct()">
    <div id="row">
        <table id="table">
            <thead>
                <th class="text-center">#</th>
                <th class="text-center">Products</th>
                <th class="text-center">Price</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                <?php
                include('javascript/ajax/config.php');
                $status = array("", "Available", "Unavailable");
                $products = mysqli_query($conn, "SELECT * FROM products ORDER BY name ASC");
                $i = 1;
                while($row = $products->fetch_assoc()):
                    $bgColor = $row['status'] == 1 ? 'rgb(36, 206, 59)' : 'red';
                ?>
                <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo ucwords($row['name']);?></td>
                    <td><?php echo $row['price'];?></td>
                    <td id="status-td"><span id="status" style="background-color: <?php echo $bgColor; ?>;" ><?php echo $status[$row['status']];?></span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-edit" onclick="editProduct(<?php echo $row['id']; ?>)">Edit</button>
                            <button class="btn-delete" onclick="deleteProduct(<?php echo $row['id']; ?>)">Delete</button>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>