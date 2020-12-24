<?php
session_start();
include 'dbconn.php';

if (isset($_POST['getstation'])) {

    $region = $_POST['region'];
    $sql = "SELECT * FROM pickupstation WHERE state='$region';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
            <div class="station-box">
                <div class="station-box-left">
                    <input type="radio" id="<?php echo $row['station']; ?>" onclick="station_detail(this)" class="station" value="<?php echo $row['id']; ?>" name="station">
                </div>

                <div class="station-box-right" id="<?php echo $row['station']; ?>" value="<?php echo $row['id']; ?>">
                    <?php echo $row['station']; ?>
                </div>

            </div>
<?php
        }
    } else {
        echo "<div class='alert alert-info'>No pick-up station available in <span class='alert-link'>$region</span> at this time</div>";
    }
}
?>