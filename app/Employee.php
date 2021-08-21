<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Designations;

class Employee extends Model
{
    protected $guarded = [];
    protected $table="employee";

    public function designation() {
        return $this->belongsTo(Designations::class);
    }
}
