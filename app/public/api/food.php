<?php 

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = file_get_contents("php://input");

if ($data != null || $data != '') {

    $data = json_decode($data);

    require_once('../db.php');
    $db = DB::getInstance();

    if (isset($data->restaurantID) && isset($data->startDate)) {
        $times = $db->prepare("SELECT startTime FROM Session WHERE restaurantID =:restaurantID ORDER BY startTime DESC");
        $times->execute(["restaurantID" => $data->restaurantID]);

        if ($times->rowCount() > 0) {
            $times = $times->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($times));
        }
        else {
            print_r(json_encode(["result" => "NoData"]));
        }
    }
}

?>