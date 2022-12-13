<?php

require_once "../model/database.php";

session_start();

class admin_actions extends DBConn
{
    // Remove Access
    public function removeAccess($remove)
    {
        $conn = parent::set_connection();
        $query_removeAccess = "UPDATE users_tbl SET is_allowed = ? WHERE username = ?";
        $_removeAccess = $conn->prepare($query_removeAccess);
        $_removeAccess->execute([0, $remove]);
        echo "User Access has been removed!";
    }
    // Grant Access    
    public function grantAccess($grant)
    {
        $conn = parent::set_connection();
        $query_grantAccess = "UPDATE users_tbl SET is_allowed = ? WHERE username = ?";
        $_grantAccess = $conn->prepare($query_grantAccess);
        $_grantAccess->execute([1, $grant]);
        echo "User has been granted access!";
    }
    // Search User/s
    public function searchUsers($data)
    {
        $conn = parent::set_connection();
        $query_SearchUsers = "SELECT * from users_view WHERE CONCAT(username) LIKE ?";
        $_SearchUsers = $conn->prepare($query_SearchUsers);
        $_SearchUsers->execute(['%' . $data . '%']);
        if ($_SearchUsers->rowCount() !== 0) {
            foreach ($_SearchUsers->fetchAll() as $rows) {
?>
                <tr>
                    <td colspan="1"><?php echo $rows->user_id; ?></td>
                    <td colspan="1"><?php echo $rows->username; ?></td>
                    <td colspan="1"><?php echo $rows->date_created; ?></td>
                    <td colspan="1"><?php echo $rows->date_updated; ?></td>
                    <td colspan="1">
                        <?php
                        if ($rows->is_allowed !== 0) {
                            echo "Granted Access";
                        } else {
                            echo "Revoked Access";
                        }
                        ?>
                    </td>
                    <td colspan="1">
                        <?php
                        if ($rows->is_allowed !== 0) {
                        ?>
                            <button onclick="removeAccess(this.id)" id="<?php echo $rows->username; ?>">Revoke Access</button>
                        <?php
                        } else {
                        ?>
                            <button onclick="grantAccess(this.id)" id="<?php echo $rows->username; ?>">Grant Access</button>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6">No users</td>
            </tr>
            <?php
        }
    }
    // Load Users 
    public function loadUsers()
    {
        $conn = parent::set_connection();
        $query_users = "SELECT * FROM users_view";
        $_users = $conn->query($query_users);
        if ($_users->rowCount() !== 0) {
            foreach ($_users->fetchAll() as $rows) {
            ?>
                <tr>
                    <td colspan="1"><?php echo $rows->user_id; ?></td>
                    <td colspan="1"><?php echo $rows->username; ?></td>
                    <td colspan="1"><?php echo $rows->date_created; ?></td>
                    <td colspan="1"><?php echo $rows->date_updated; ?></td>
                    <td colspan="1">
                        <?php
                        if ($rows->is_allowed !== 0) {
                            echo "Granted Access";
                        } else {
                            echo "Revoked Access";
                        }
                        ?>
                    </td>
                    <td colspan="1">
                        <?php
                        if ($rows->is_allowed !== 0) {
                        ?>
                            <button onclick="removeAccess(this.id)" id="<?php echo $rows->username; ?>">Revoke Access</button>
                        <?php
                        } else {
                        ?>
                            <button onclick="grantAccess(this.id)" id="<?php echo $rows->username; ?>">Grant Access</button>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6">No users</td>
            </tr>
<?php
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $init = new admin_actions;
    if (isset($_GET['removeaccess'])) {
        $init->removeAccess($_POST['removeAccessUser']);
    }
    if (isset($_GET['grantaccess'])) {
        $init->grantAccess($_POST['grantAccessUser']);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $init = new admin_actions;
    if (isset($_GET['load_users'])) {
        $init->loadUsers();
    }
    if (isset($_GET['searchUser'])) {
        $init->searchUsers($_GET['findUser']);
    }
} else {
    echo "No valid requests made!";
}
