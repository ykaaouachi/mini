<div class="container">
    <h2>You are in the View: application/view/astuce/index.php (everything in this box comes from that file)</h2>
    <!-- add astuce form -->
    <div class="box">
        <h3>Add a astuce</h3>
        <form action="<?php echo URL; ?>astuces/addastuce" method="POST">
            <label>Titre</label>
            <input type="text" name="title" value="" required />
            <label>Body</label>
            <input type="text" name="body" value="" required />
            <label>Link</label>
            <input type="text" name="link" value="" />
            <input type="submit" name="submit_add_astuce" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Amount of astuces (data from second model)</h3>
        <div>
            <?php echo $amount_of_astuces; ?>
        </div>
        <h3>Amount of astuces (via AJAX)</h3>
        <div>
            <button id="javascript-ajax-button-astuce">Click here to get the amount of astuces via Ajax (will be displayed in #javascript-ajax-result-box)</button>
            <div id="javascript-ajax-result-box"></div>
        </div>
        <h3>List of astuces (data from first model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Titre</td>
                <td>Body</td>
                <td>Link</td>
                <td>SUPPRIMER</td>
                <td>MODIFIER</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($astuces as $astuce) { ?>
                <tr>
                    <td><?php if (isset($astuce->id)) echo htmlspecialchars($astuce->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($astuce->title)) echo htmlspecialchars($astuce->title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($astuce->body)) echo htmlspecialchars($astuce->body, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php if (isset($astuce->link)) { ?>
                            <a href="<?php echo htmlspecialchars($astuce->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($astuce->link, ENT_QUOTES, 'UTF-8'); ?></a>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo URL . 'astuces/deleteastuce/' . htmlspecialchars($astuce->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'astuces/editastuce/' . htmlspecialchars($astuce->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
