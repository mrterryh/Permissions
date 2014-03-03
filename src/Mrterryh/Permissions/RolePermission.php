<?php namespace Mrterryh\Permissions;

class RolePermission extends \Eloquent
{
	protected $table = 'role_permissions';
	protected static $stored = array();

	public function permission()
	{
		return $this->belongsTo('\Mrterryh\Permissions\Permission');
	}

	public static function role($id)
	{
		if (!isset(static::$stored[$id]))
			static::$stored[$id] = RolePermission::with('permission')->where('role_id', '=', $id)->get();
		
		return static::$stored[$id];
	}
}