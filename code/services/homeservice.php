<?php 
require "code/connection.php";

if ($_COOKIE["admin"] == 0) {
    $stmt = $conn->prepare("SELECT * FROM list WHERE userid = ?");
    $stmt->bind_param("i", $_COOKIE["userid"]);
    $stmt->execute();

    $listresult = $stmt->get_result();
    $listrows = mysqli_fetch_all($listresult, MYSQLI_ASSOC);
} else {
    $stmt = $conn->prepare("SELECT * FROM list");
    $stmt->execute();

    $listresult = $stmt->get_result();
    $listrows = mysqli_fetch_all($listresult, MYSQLI_ASSOC);
}

$stmt = $conn->prepare("SELECT * FROM task");
$stmt->execute();
$taskresult = $stmt->get_result();
$taskrows = mysqli_fetch_all($taskresult, MYSQLI_ASSOC);

for ($i = 0; $i < count($taskrows); $i++) { 
    for ($j = 0; $j < count($listrows); $j++) {
        if ($taskrows[$i]["listid"] == $listrows[$j]["id"]) {
            $listrows[$j]["tasks"][$i] = array(
                "id" => $taskrows[$i]["id"],
                "description" => $taskrows[$i]["description"],
                "status" => $taskrows[$i]["status"],
                "time" => $taskrows[$i]["time"]
            );
        }
    }
}
?>