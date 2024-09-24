<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = ['ملابس', 'الكترونيات' , 'اثاث' ,'كمبيوتر', 'اطعمه', 'منظفات' , 'كهربأيات' ,'ادوات صحيه','مستلزمات طبيه', 'احزيه' , 'اجهزه كهربائيه' ,'تسالي', 'لحوم', 'معطرات' , 'ادوات تجميل' ,'حلويات '];
        $name = $this->faker->randomElement($names) ;
        
        return [
            'name' => $name ,
            'parent_id' => \null,
            'slug' => Str::slug($name,"-"),
            'is_active' => fake()->boolean(),
        ];
    }
}
