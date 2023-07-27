<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    //    protected $table = 'cv';
    protected $table = 'cv';
    // protected $fillable = [
    //     'name', 'email', 'phone', 'address', 'about_me', 'education', 'experience', 'skills',
    // ];
    public function user(){
        return $this->belongsTo(User::class , 'user_id', 'id' );
        }
    //     public function setImageAttribute($value)
    // {
    //     $fileName = time() . '_' . $value->getClientOriginalName();
    //     $value->storeAs('public/images', $fileName);
    //     $this->attributes['image'] = $fileName;
    // }
}
