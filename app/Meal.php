<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    /**
     * Attributes that are mass-assignable
     **/

    protected $fillable = ['name'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function foods() {
        return $this->hasMany(Food::class);
    }

    public function proteins() {
        $mealsProteins = $this->foods()->pluck("protein");
        return $mealsProteins->sum();
    }

    public function carbs() {
        $mealsCarbs = $this->foods()->pluck("carbohydrates");
        return $mealsCarbs->sum();
    }

    public function fats() {
        $mealsFats = $this->foods()->pluck("fat");
        return $mealsFats->sum();
    }

    public function calories() {
        $mealsProteins = $this->foods()->pluck("protein");
        $mealsCarbs = $this->foods()->pluck("carbohydrates");
        $mealsFats = $this->foods()->pluck("fat");

        $mealCalories = ($mealsFats->sum() * 4)
            + ($mealsCarbs->sum() * 3)
            + ($mealsProteins->sum() * 3);

        return $mealCalories;
    }

}
