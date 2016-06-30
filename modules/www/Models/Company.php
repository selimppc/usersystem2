<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 6/30/16
 * Time: 3:42 PM
 */

namespace Modules\Www\Models;



use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company';
    protected $fillable=[
        'name',
        'description',
        'created_at',
        'created_by'
    ];
}