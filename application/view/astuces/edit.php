<div class="container">
    <h2>You are in the View: application/view/astuce/edit.php (everything in this box comes from that file)</h2>
    <!-- add astuce form -->
    <div>
        <h3>Edit a astuce</h3>
        <form action="<?php echo URL; ?>astuces/updateastuce" method="POST">
            <label>Artist</label>
            <input autofocus type="text" name="title" value="<?php echo htmlspecialchars($astuce->title, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Track</label>
            <input type="text" name="body" value="<?php echo htmlspecialchars($astuce->body, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Link</label>
            <input type="text" name="link" value="<?php echo htmlspecialchars($astuce->link, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="hidden" name="astuce_id" value="<?php echo htmlspecialchars($astuce->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_astuce" value="Update" />
        </form>
    </div>
</div>

