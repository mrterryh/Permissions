<?php namespace Mrterryh\Permissions;

class Role extends \Eloquent
{
	protected $table = 'roles';

	public function can($permission)
	{
		$rolePermissions = \Mrterryh\Permissions\RolePermission::role($this->id);

		foreach ($rolePermissions as $rolePermission) {
			if ($rolePermission->permission->name == $permission) {
				return true;
			}
		}

		return false;
	}

	public function allow(\Mrterryh\Permissions\Permission $permission)
	{
		$rolePermission = new \Mrterryh\Permissions\RolePermission();
		$rolePermission->role_id = $this->id;
		$rolePermission->permission_id = $permission->id;
		$rolePermission->save();
	}
	
	public function deny(\Mrterryh\Permissions\Permission $permission)
	{
		$permission->delete();
	}
}
