<?php
namespace App\Utils;


class PriceCalculator
{
    /**
     * @param int $car_year
     * @param int $nb_km
     * @param int $nb_days
     * @return int
     */
    public function givePrice(int $car_year,int $nb_km, int $nb_days):int
    {
        $price = ($car_year*$nb_km)/$nb_days;
        return $price;
    }
}