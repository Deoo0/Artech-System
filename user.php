<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: javascript/ajax/login.php");
    exit();
}
include('topbar.php');?>
<div id="container">
    <span >
        <h1 id="TITLE">USERS</h1>
    </span>
    <input type="submit" id="add-user" value="+ Add User" onclick="return addUser()">
    <div id="row">
        <table id="table-user">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                include('javascript/ajax/config.php');
                $type = array("", "Admin", "Staff");
                $users = mysqli_query($conn, "SELECT * FROM users ORDER BY name ASC");
                $row = mysqli_num_rows($users);
                $i = 1;
                if($row >0){
                while ($row = $users->fetch_assoc()){
                $id = $row['id'];
                $name = $row['name'];
                $username = $row['username'];
                $password = $row['password'];
                $user_type = $row['usertype_id'];
                $display .= "
                
                <style>
                #name-user,#usn-user,#pass-user{
                padding:0;
                width:190px;
                }
                #name$id,#usn$id,#pass$id{
                margin:0;
                width:95%;
                height:50px;
                border:none;
                text-align:center;
                font-size:20px;
                }
                
                </style>
                
                
                <tr>
                    <td class='text-center'>$i</td>
                    <td id='name-user'> <input type='text' id='name$id' value=$name></td>
                    <td id='usn-user'><input type='text' id='usn$id' value=$username></td>
                    <td id='pass-user'><input type='password' id='pass$id' value=$password></td>
                    <td>$type[$user_type]</td>
                    <td id='user-action'>
                        <div class='action-buttons'>
                            <button class='btn-edit' id='updatebutton' onclick='updateUser($id)'>Update</button>
                            <button class='btn-delete' id='deletebutton' onclick='deleteUser($id)'>Delete</button> <!-- Label: Added onclick event for delete -->
                        </div>
                    </td>
                </tr>";
                $i++;
                }}
                else{
                    $display .= "NO USER";
                }
                echo $display;
                ?>
            </tbody>
        </table>
    </div>
</div>
