<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name'];

    protected $dates = ['created_at', 'updated_at'];

    protected $visible = ['id', 'name', 'workInfo'];

    public function workInfo()
    {
        $info = $this->hasMany(WorkHistory::class, 'employee_id')
            ->whereNull('end_date')
            ->with('machine');
        return $info;
    }
}
