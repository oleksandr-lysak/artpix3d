<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['name'];

    protected $dates = ['created_at', 'updated_at'];

    protected $visible = ['id', 'name', 'workInfo'];

    public function workInfo()
    {
        $info = $this->hasMany(WorkHistory::class, 'machine_id')
            ->whereNull('end_date')
            ->with('employee');
        return $info;
    }
}
