<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function(Account $account) {
            Card::factory()->count(
                rand(3,6)
            )->create([
                'account_id' => $account->id,
            ]);
        });
    }
}
