<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'status',
        'payerEmail',
        'value',
        
        'projectName',
        'projectId'
    ];

    public  static function getProductPrice($value){
        switch($value){
            case 'product-1':
            $price = '1.00';
            break;
            case 'product-2':
            $price = '2.00';
            break;
            case 'product-3':
            $price = '3.00';
            break;
            default:
            $price = '0.00';
        }
        return $price;
    } 
      public  static function getProductDescription($value){
        switch($value){
            case 'product-1':
            $description = '1$ product';
            break;
            case 'product-2':
            $description = '2$ product';
            break;
            case 'product-3':
            $description = '3$ product';
            break;
            default:
            $description = '0$';
        }
        return $description;
    } 
}
