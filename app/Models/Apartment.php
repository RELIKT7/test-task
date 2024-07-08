<?php

  namespace App\Models;

  use App\Builders\HelpQueryBuilder;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Apartment extends Model {
    use HasFactory;

    protected $hidden = ["created_at", "updated_at"];

    public function newEloquentBuilder($query) {
      return new HelpQueryBuilder($query);
    }
  }
