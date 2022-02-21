<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['uname', 'phone', 'msg'];

    public static function saveFile($data = [])
    {
        // $data = json_encode($data);
        $res =  file_put_contents('../database/json/' . $data['id'], json_encode($data));
        if ($res) {
            return $data;
        }
    }
}
