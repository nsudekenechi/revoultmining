<?php
require_once "../dbase/config.php";
$q = "SELECT *, STR_TO_DATE(date,  '%d %a %b, %Y')  as date, users.id as user_id, deposits.id as deposit_id 
FROM deposits JOIN users ON users.id = deposits.user 
JOIN plans ON plans.id = deposits.plan WHERE deposits.approved = true";
$resu = mysqli_query($conn, $q);
while ($row = $resu->fetch_assoc()) {
    $dailyInterest = $row["daily_interest"] / 100;
    $depositAmount = $row["amount"];
    $amount = $dailyInterest * $depositAmount;
    $user_id = $row["user_id"];
    $deposit_id = $row['deposit_id'];
    $currDate = date('d D M, Y');
    $numberOfDays = $row["days"];
    // checking if last_profit exists
    if (!$row["last_profit"]) {

        // updating balance
        $query = "UPDATE users SET  balance= balance + $amount WHERE id = '$user_id'";
        $res = mysqli_query($conn, $query);

        // updaing profit date
        $query = "UPDATE deposits SET last_profit='$currDate' WHERE id = '$deposit_id'";
        $res = mysqli_query($conn, $query);
    } else {
        $currDate = new DateTime();
        $endDate = new DateTime($row['date']);
        $endDate = $endDate->modify("+$numberOfDays day");

        // checking if  profit end date have reached
        if (date_diff($currDate, $endDate)->days > 0) {
            // updating balance
            $queryBal = "UPDATE users SET  balance= balance + $amount WHERE id = '$user_id'";
            $resBal = mysqli_query($conn, $queryBal);
            $profit_date = $currDate->format("d D M Y");
            // updaing profit date
            $queryBal = "UPDATE deposits SET last_profit='$profit_date' WHERE id = '$deposit_id'";
            $resBal = mysqli_query($conn, $queryBal);
        }

    }

    echo "Done";


}