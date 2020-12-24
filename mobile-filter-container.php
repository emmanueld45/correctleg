 <!-- filter container start -->
 <div style="width:100%;padding:10px;text-align:center;font-weight:bold;font-size:20px;">Filter search <i class="fa fa-filter"></i></div>
 <div class="filter-container">
     <form action="filter.php" method="GET">
         <!-- for & type-->
         <div style="width:100%;display:flex;flex-flow:row nowrap;">
             <button class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;">For</button>
             <!-- <button class="form-control" style="width:;border:none;background-color:white;padding:0px;">Type</button> -->
         </div>

         <div style="width:100%;display:flex;flex-flow:row nowrap;">
             <select class="form-control item-is-for" name="itemisfor" style="width:;margin-right:10px;">
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


             <!-- <select class="form-control item-type" name="itemtype" style="width:;">
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
             </select> -->
         </div>
         <br>


         <!-- size & prize-->
         <div style="width:100%;display:flex;flex-flow:row nowrap;">
             <!-- <button class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;">Size</button> -->
             <button class="form-control" style="width:;border:none;background-color:white;padding:0px;">Price(<span>&#8358</span>)</button>
         </div>

         <div style="width:100%;display:flex;flex-flow:row nowrap;">
             <!-- <select class="form-control item-size" name="itemsize" style="width:;margin-right:10px;">
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
             </select> -->


             <select class="form-control" name="itemprice" style="width:;">
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
         </div>




         <div style="width:100%;padding:10px;display:flex;justify-content:center;">
             <button class="filter-btn" type="submit" style="padding:10px;background-color:crimson;border:none;color:white;width:100px;">Filter <i class="fa fa-search"></i></button>
         </div>

     </form>
 </div>
 <!--filter container end -->