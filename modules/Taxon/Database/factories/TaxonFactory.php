<?php

namespace Modules\Taxon\Database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaxonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Taxon\Models\Taxon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => substr($this->faker->text(15), 0, -1),
            'slug'              => '',
            'status'            => 1,
            'icon_class'        => '',
            'description'       => $this->faker->paragraph,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];
    }
}
