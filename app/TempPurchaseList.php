<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 3/15/2017
 * Time: 8:47 AM
 */

namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TempPurchaseList extends Eloquent
{
    protected $collection = 'temp_purchase_list';
    protected $guearded = ['_id'];
    protected $hidden = [
        'remember_token','updated_at','created_at'
    ];
}
