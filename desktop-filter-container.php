<div class="desktop-filter-container" style="background-color:lightgrey;padding:10px;width:95%;margin-bottom:50px;">
    <form action="filter" method="GET">
        <div style="width:100%;padding:10px;font-weight:600;font-size:25px;">Filter Search <i class="fa fa-filter"></i></div>
        <!-- labels start -->
        <div style="width:100%;display:flex;flex-flow:row nowrap;">

            <button class="form-control" style="background-color:lightgrey;padding:0px;border:none;margin-right:10px;font-weight:600;">For</button>
            <!-- <button class="form-control" style="background-color:lightgrey;padding:0px;border:none;margin-right:10px;font-weight:600;">Type</button>
            <button class="form-control" style="background-color:lightgrey;padding:0px;border:none;margin-right:10px;font-weight:600;">Size</button> -->
            <button class="form-control" style="background-color:lightgrey;padding:0px;border:none;margin-right:10px;font-weight:600;">Price(<span>&#8358</span>)</button>
            <button class="form-control" style="background-color:lightgrey;padding:0px;border:none;margin-right:10px;font-weight:600;"></button>
        </div>
        <!-- labels end -->


        <!-- fields start -->
        <div style="width:100%;display:flex;flex-flow:row nowrap;">

            <!-- for -->
            <select class="form-control item-is-for" name="itemisfor" style="margin-right:10px;">

                <?php
                if (isset($_GET['item_is_for'])) {
                    $item_is_for = $_GET['item_is_for'];
                    echo "<option>$item_is_for</option>";
                } else if (isset($_GET['itemisfor'])) {
                    $item_is_for = $_GET['itemisfor'];
                    echo "<option>$item_is_for</option>";
                }
                ?>
                <option>Men</option>
                <option>Women</option>
                <option>Kids</option>

            </select>

            <!-- type --
            <select class="form-control item-type" name="itemtype" style="margin-right:10px;">
                <?php
                if (isset($_GET['item_is_for'])) {
                    $item_is_for = $_GET['item_is_for'];

                    $sql = "SELECT * FROM footwear_type WHERE item_is_for='$item_is_for';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_type = $row['item_type'];
                        echo "<option>$item_type</option>";
                    }
                } else if (isset($_GET['itemisfor'])) {
                    $item_is_for = $_GET['itemisfor'];

                    $sql = "SELECT * FROM footwear_type WHERE item_is_for='$item_is_for';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_type = $row['item_type'];
                        echo "<option>$item_type</option>";
                    }
                } else {
                    $sql = "SELECT * FROM footwear_type WHERE item_is_for='Men';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_type = $row['item_type'];
                        echo "<option>$item_type</option>";
                    }
                }

                ?>

            </select>

            <!-- size --
            <select class="form-control item-size" name="itemsize" style="width:;margin-right:10px;">

                <?php
                if (isset($_GE['item_is_for'])) {
                    $item_is_for = $_GET['item_is_for'];

                    $sql = "SELECT * FROM footwear_size WHERE item_is_for='$item_is_for';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_size = $row['item_size'];
                        echo "<option>$item_size</option>";
                    }
                } else if (isset($_GET['itemisfor'])) {
                    $item_is_for = $_GET['itemisfor'];

                    $sql = "SELECT * FROM footwear_size WHERE item_is_for='$item_is_for';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_size = $row['item_size'];
                        echo "<option>$item_size</option>";
                    }
                } else {
                    $sql = "SELECT * FROM footwear_size WHERE item_is_for='Men';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_size = $row['item_size'];
                        echo "<option>$item_size</option>";
                    }
                }
                ?>
            </select>

            <!-- price -->
            <select class="form-control" name="itemprice" style="width:;margin-right:10px;">
                <?php
                if (isset($_GET['itemprice'])) {
                    $item_price = $_GET['itemprice'];
                    echo '<option value="' . $item_price . '">' . $item_price . '</option>';
                }
                ?>
                <option value="1000 - 5000"><span>&#8358</span>1,000 - <span>&#8358</span>5,000</option>
                <option value="5000 - 10000"><span>&#8358</span>5,000 - <span>&#8358</span>10,000</option>
                <option value="10000 - 20000"><span>&#8358</span>10,000 - <span>&#8358</span>20,000</option>
                <option value="20000 - 30000"><span>&#8358</span>20,000 - <span>&#8358</span>30,000</option>
                <option value="30000+"><span>&#8358</span>30,000 and above</option>

            </select>

            <button class="btn btn-success form-control" type="submit" style="width:;margin-right:10px;">Search <i class="fa fa-search"></i></button>


        </div>
        <!-- fields end -->

    </form>
</div>