<?php

session_start();

require_once "../model/database.php";

class table  extends DBConn
{
    public function searchList($data)
    {
        $conn = parent::set_connection();
        $query_search = "SELECT * FROM devices_v WHERE CONCAT(device,location,date_added,date_added,is_active,device_status) LIKE ?";
        $_search = $conn->prepare($query_search);
        $_search->execute(["%" . $data . "%"]);
        if ($_search->rowCount() >= 1) {
            foreach ($_search->fetchAll() as $rows) {
                $device = $rows->device;
                $location = $rows->location;
                $date_added = $rows->date_added;
                $is_active = $rows->is_active;
                $device_status = $rows->device_status;
?>
                <tr>
                    <td colspan="1"><?php echo $device; ?></td>
                    <td colspan="1"><?php echo $location; ?></td>
                    <td colspan="1"><?php echo $date_added; ?></td>
                    <td colspan="1"><?php echo $device_status; ?></td>
                    <?php
                    if ($_SESSION['access'] == 1) {
                    ?>
                        <td colspan="1">
                            <a href="includes/include_edit_device.php?edit&device=<?php echo $device; ?>&location=<?php echo $location; ?>&date_added=<?php echo $date_added; ?>&is_active=<?php echo $is_active; ?>">Edit</a>
                        </td>
                    <?php
                    } else   if ($_SESSION['access'] == 2) {
                    ?>
                        <td colspan="1">
                            <a href="includes/include_edit_device.php?edit&device=<?php echo $device; ?>&location=<?php echo $location; ?>&date_added=<?php echo $date_added; ?>&is_active=<?php echo $is_active; ?>">Edit</a>
                        </td>
                    <?php
                    } else {
                    ?>
                        <td colspan="1" hidden>

                        </td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6">Not Found</td>
            </tr>
            <?php
        }
    }
    public function load_list()
    {
        $conn = parent::set_connection();
        $query_load_list = "SELECT * FROM devices_v ORDER BY device,date_added ASC";
        $_load_list = $conn->query($query_load_list);
        if ($_load_list->rowCount() !== 0) {
            foreach ($_load_list->fetchAll() as $rows) {
                $device = $rows->device;
                $location = $rows->location;
                $date_added = $rows->date_added;
                $is_active = $rows->is_active;
                $device_status = $rows->device_status;
            ?>
                <tr>
                    <td colspan="1"><?php echo $device; ?></td>
                    <td colspan="1"><?php echo $location; ?></td>
                    <td colspan="1"><?php echo $date_added; ?></td>
                    <td colspan="1"><?php echo $device_status; ?></td>
                    <?php
                    if ($_SESSION['access'] == 1) {
                    ?>
                        <td colspan="1">
                            <a href="includes/include_edit_device.php?edit&device=<?php echo $device; ?>&location=<?php echo $location; ?>&date_added=<?php echo $date_added; ?>&is_active=<?php echo $is_active; ?>">Edit</a>
                        </td>
                    <?php
                    } else   if ($_SESSION['access'] == 2) {
                    ?>
                        <td colspan="1">
                            <a href="includes/include_edit_device.php?edit&device=<?php echo $device; ?>&location=<?php echo $location; ?>&date_added=<?php echo $date_added; ?>&is_active=<?php echo $is_active; ?>">Edit</a>
                        </td>
                    <?php
                    } else {
                    ?>
                        <td colspan="1" hidden>

                        </td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6">
                    No Device/s Added
                </td>
            </tr>
<?php
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $init = new table;
    if (isset($_GET['search'])) {
        $init->searchList($_POST['searchInput']);
    }
    if (isset($_GET['load_list'])) {
        $init->load_list();
    }
} else {
    echo "No Valid Requests Made!";
}
