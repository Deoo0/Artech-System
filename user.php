<?php include('topbar.php');?>
<div id="container">
    <span >
        <h1 id="TITLE">USERS</h1>
    </span>
    <input type="submit" id="add-user" value="+ Add User" onclick="return addUser()">
    <div id="row">
        <table id="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                include('javascript/ajax/config.php');
                $type = array("", "Admin", "Staff");
                $users = mysqli_query($conn, "SELECT * FROM users ORDER BY name ASC");
                $i = 1;
                while ($row = $users->fetch_assoc()):
                ?>
                <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo ucwords($row['name']); ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $type[$row['usertype_id']]; ?></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-edit" data-id="<?php echo $row['id']; ?>">Edit</button>
                            <button class="btn-delete" data-id="<?php echo $row['id']; ?>" onclick="deleteUser(<?php echo $row['id']; ?>)">Delete</button> <!-- Label: Added onclick event for delete -->
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
