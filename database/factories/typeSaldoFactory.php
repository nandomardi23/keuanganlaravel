<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class typeSaldoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namaTypeSaldo' => 'debit',
            'desc' => 'ini bagian debit'
        ];
        return [
            'namaTypeSaldo' => 'kredit',
            'desc' => 'ini bagian kredit'
        ];
    }
}
