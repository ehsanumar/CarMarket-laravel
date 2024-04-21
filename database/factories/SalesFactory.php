<?php

namespace Database\Factories;

use App\Models\Cars;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{

    public function definition(): array
    {
        $randomCar = Cars::inRandomOrder()->first();
        $randomBuyerId = User::where('type', 'buyer')->inRandomOrder()->first()->id;
        $randomSellerId = User::where('type', 'seller')->inRandomOrder()->first()->id;
        
        return [
        'car_id' => $randomCar->id,
        'buyer_id' => $randomBuyerId,
        'seller_id' => $randomSellerId,
        'price' => $randomCar->price,
        ];
    }
}
