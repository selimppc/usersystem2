<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 7/4/16
 * Time: 10:23 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{

    protected $table = 'company';

    protected $fillable = [
        'title','description','created_by'
    ];
}