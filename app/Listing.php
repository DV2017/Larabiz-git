<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
  //mass assignment
  protected $fillable = [
    'user_id', 'company', 'address', 'website', 'email', 'bio', 'phone'
  ];

  //many-to-one relationship
  public function owner()
  {
    return $this->belongsTo(User::class);
  }
}
