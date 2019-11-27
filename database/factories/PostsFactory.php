<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {

    //$users = \Users::all();

    $imgArray = [
      "https://usabilitygeek.com/wp-content/uploads/2017/09/ux-before-ui-main.jp",
      "https://careerfoundry.com/en/blog/uploads/what-does-a-ux-designer-do-header-image.jpg",
      "https://d33wubrfki0l68.cloudfront.net/ca5d742c3142308ccaf3f300c307f174e87ca101/19eb3/en/blog/ui-pillar-1-d48fe3dd5bd5f8a36a76324edf7362075cd977d0e48c46f73b9f831fb993940b.jpg",
      "https://d33wubrfki0l68.cloudfront.net/003402e1d019ad79f102be51c5b032d3599d6cc6/ef438/en/blog/card_sort-5e38916d7ed91b9c00acb54d471068790b919111b4d4510d8ea0fca437b2f9b3.jpg",
      "https://d33wubrfki0l68.cloudfront.net/1113b412b226c24c0d99cc207797efab8b247c05/be9f6/en/blog/ui_salary-5fc4f8e924190629b4e3825ae890f9f4f12cd688e1e914812717086ff338dfac.jpg",
    ];
    return [
      "text"=>$faker->paragraph(),
      "image"=>$faker->randomElement($imgArray),
      "user_id"=>
    ];
});
