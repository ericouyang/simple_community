<a id="hasAccess"></a>
###hasAccess($permission)

----------

Checks to see if a user been granted a certain permission.  This includes any permissions given to them by an groups they may be apart of as well.  Users may also have permissions with a value of '-1'. This value is used to deny users of permissions that may have been assigned to them from a group.

Any user with `superuser` permissions automatically has access to everything, regardless of user permissions and group permissions.

Parameters          | Type                | Default             | Required            | Description
:------------------ | :------------------ | :------------------ | :------------------ | :------------------
`$permission`       | string              | none                | true                | Permission name

`returns` bool
`throws`  UserNotFoundException

####Example

	try
	{
		// Find the user
		$user = Sentry::getUserProvider()->findByLogin('test@test.com');

		// Check if the user has the 'admin' permission. Also,
		// multiple permissions may be used by passing an array
		if ( ! $user->hasAccess('admin'))
		{
			// User does not have access, redirect them or whatever else you may want to do
		}
		else
		{
			// User has access to the given permission
		}
	}
	catch (Cartalyst\Sentry\UserNotFoundException $e)
	{
		echo 'User does not exist';
	}
