<?php

namespace Modules\Medicine\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Medicine\Entities\Category;
use Modules\Medicine\Entities\Leaf;
use Modules\Medicine\Entities\Type;
use Modules\Medicine\Entities\Unit;

class MedicineDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //Unit
        collect(['ml', 'mg', 'pc'])->map(fn ($unit) => Unit::create(['name' => $unit, 'status' => 1]));

        //Categories
        $categories = ['Medicine', 'Syrup', 'Liquid', 'Tablet', 'Cream', 'Capsule'];
        collect($categories)->map(fn ($category) => Category::create(['name' => $category, 'status' => 1]));

        // Types
        collect(['Pain Killer', 'Suspension'])->map(fn ($category) => Type::create(['name' => $category, 'status' => 1]));

        //Leafs
        $leafs = ['Leaf 1(20)', 'Leaf 2(30)', 'Leaf 3(40)', '1:1(1)', '1x15(150)'];
        collect($leafs)->map(fn ($leaf) => Leaf::create(['name' => $leaf, 'status' => 1]));
    }
}
