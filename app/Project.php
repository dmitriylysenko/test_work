<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 26.09.2018
 * Time: 21:42
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'statuses'
    ];
}