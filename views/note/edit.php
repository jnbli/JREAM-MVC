<h1>Note: Edit</h1>

<form method="post" action="<?php echo URL;?>note/editSave/<?php echo $this->note['noteid']; ?>">
	<label>Title</label><input type="text" name="title" value="<?php echo $this->note['title']; ?>" /><br />
	<label>Content</label><textarea name="content"><?php echo $this->note['content'];?></textarea><br />
	<label>&nbsp;</label><input type="submit" />
</form>