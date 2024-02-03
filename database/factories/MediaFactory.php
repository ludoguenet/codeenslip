<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
final class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = Str::random();
        $fileName = Str::random();

        return [
            'name' => $name,
            'file_name' => $fileName,
            'mime_type' => $this->faker->randomElement(['png', 'jpg', 'pdf']),
            'path' => 'avatars',
            'file_hash' => base64_encode($name),
            'size' => 100,
        ];
    }
}
