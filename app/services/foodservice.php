<?php

namespace Services;
use Repositories\FoodRepository;

// service treats repository as the DAL layer and calls the methods from there

class FoodService {

    private $foodRepository;

    function __construct() {
        $this->foodRepository = new FoodRepository;
    }

    public function GetAllRestaurantInformation() {
        return $this->foodRepository->GetAllRestaurantInformation();
    }

    public function GetRestaurantInformationByID($id) {
        return $this->foodRepository->GetRestaurantInformationByID($id);
    }

    public function GetSessionInformationByRestaurantID($id) {
        return $this->foodRepository->GetSessionInformationByRestaurantID($id);
    }

    public function GetSessionsByRestaurantID($id) {
        return $this->foodRepository->GetSessionsByRestaurantID($id);
    }

    public function GetSessionsDateByRestaurantID($id) {
        return $this->foodRepository->GetSessionsDateByRestaurantID($id);
    }

    public function GetSessionsTimeByRestaurantID($id) {
        return $this->foodRepository->GetSessionsTimeByRestaurantID($id);
    }
}
