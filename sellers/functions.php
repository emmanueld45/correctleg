<?php




function create_product_code()
{
    $alph = str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $nums = str_shuffle("12345678901234567890");
    if (strlen($alph) > 2) {
        $cutalph = substr($alph, 0, 2);

        $alph = $cutalph;
    }

    if (strlen($nums) > 2) {
        $cutnums = substr($nums, 0, 2);

        $nums = $cutnums;
    }

    $result = $alph . $nums;
    $final_result = str_shuffle($result);
    return $final_result;
}





// get user details start
function get_user_detail($userid, $detail)
{
    global $conn;

    $sql = "SELECT * FROM sellers WHERE uniqueid='$userid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $userdetail = $row[$detail];

    return $userdetail;
}

// get user details end 