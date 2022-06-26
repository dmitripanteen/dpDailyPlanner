<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'color'];

    public $colorScheme = [
        'Red'    => '#ff0000',
        'Orange' => '#ffa500',
        'Yellow' => '#ffff00',
        'Green'  => '#008000',
        'Blue'   => '#0000ff',
        'Indigo' => '#4b0082',
        'Violet' => '#ee82ee',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
