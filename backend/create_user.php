<!--php artisan tinker < my-code.php-->

<!--php artisan tinker < create_user.php-->

$user = new User();
$user->name = "Sys Admin";
$user->email = "me@me.com";
$user->password = Hash::make("password");
$user->save();
