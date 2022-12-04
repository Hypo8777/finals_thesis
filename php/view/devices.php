<?php


require_once "../model/database.php";

class table  extends DBConn
{
    public function searchList($data)
    {
        $conn = parent::set_connection();
        $query_search_list = "SELECT * FROM devices_v WHERE CONCAT(device,location,date_added,date_updated) LIKE ? ORDER BY date_added ASC";
        $_search_list = $conn->prepare($query_search_list);
        $_search_list->execute(["%" . $data . "%"]);
        if ($_search_list->rowCount() !== 0) {
            foreach ($_search_list->fetchAll() as $rows) {
                $device = $rows->device;
                $location = $rows->location;
                $date_added = $rows->date_added;
                $date_updated = $rows->date_updated;
?>
                <tr>
                    <td colspan="1"><?php echo $device; ?></td>
                    <td colspan="1"><?php echo $location; ?></td>
                    <td colspan="1"><?php echo $date_added; ?></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6">No record found</td>
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
            ?>
                <tr>
                    <td colspan="1"><?php echo $device; ?></td>
                    <td colspan="1"><?php echo $location; ?></td>
                    <td colspan="1"><?php echo $date_added; ?></td>
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
}
