<h1>User: Edit</h1>

<?php
//print_r($this->user);

?>

<form method="post" action="<?php echo URL;?>user/editSave/<?php echo $this->user['userid']; ?>">
	<label>Login</label><input type="text" name="login" value="<?php echo $this->user['login']; ?>" /><br />
	<label>Password</label><input type="text" name="password" /><br />
	<label>Role</label>
		<select name="role">
			<option value="default" <?php if($this->user['role'] == 'default') echo 'selected'; ?>>Default</option>
			<option value="admin" <?php if($this->user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
		</select><br />
	<label>&nbsp;</label><input type="submit" />
</form>