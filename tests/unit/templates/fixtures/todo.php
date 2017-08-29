<?php
return [

    'title' => $faker->sentence(),
    'completed' => $faker->randomElement([0, 1]),
    'created_at' => $faker->unixTime(),
    'updated_at' => $faker->unixTime()
];