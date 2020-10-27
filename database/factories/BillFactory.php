<?php

namespace Database\Factories;

use App\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name_on_bill' => 'John Doe',
            'total' => 12345,
            'address' => '123 Fake Street',
        ];
    }
}
