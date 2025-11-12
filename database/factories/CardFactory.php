<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => fake()->numerify('################')
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Card $card) {
            $otherCard = Card::query()->whereNot('cards.id',$card->id)->whereDoesntHaveRelation('user','users.id',$card->user->id)->inRandomOrder()->first();
            if(! $otherCard) {
                return;
            }

            Transaction::factory(
                rand(5,30)
            )->create([
                'source_card' => $card->getRawOriginal('number'),
                'destination_card' => $otherCard->getRawOriginal('number'),
            ]);
        });
    }
}
