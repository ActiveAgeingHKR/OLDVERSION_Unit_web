<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class EmployeeModel extends Eloquent 
{
	protected $primaryKey = 'emp_id';
	protected $table = 'employees';
	protected $guarded =['created_at', 'updated_at','emp_id'];
	public $timestamps = false;
	


protected $hidden = [ ];

}
