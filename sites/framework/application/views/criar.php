<h2>Pedido de revisão/reparação</h2>
<?php echo form_open('site/create');?>
    <p>
        <input type="text" name="title" placeholder="Titulo" id="title"/>
    </p>

    <p>
        <textarea name="content" id="content"></textarea>
    </p>

    <p>
        <input type="submit" value="submit"/>
    </p>
<?php echo validation_errors('<p class="error"></p>'); ?>
<?php echo form_close();?>