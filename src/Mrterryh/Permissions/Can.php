<?php namespace Mrterryh\Permissions;

trait Can
{
	public function role()
	{
		return $this->belongsTo('\Mrterryh\Permissions\Role', 'role_id');
	}

	public function can($permission)
	{
		return $this->role->can($permission);
	}
}