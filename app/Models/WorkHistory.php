<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $dates = ['created_at', 'updated_at'];

    protected $table = 'work_history';

    protected $visible = ['id','start_date','end_date','machine','employee'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id');
    }


}
