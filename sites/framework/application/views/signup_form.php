<h1>Criar uma conta</h1>
<div id="">
    <fieldset>
        <legend>Informação Pessoal</legend>
        <?php
        echo form_open('login/create_member');
        echo form_input('first_name', set_value('first_name', 'Primeiro Nome'));
        echo form_input('last_name', set_value('last_name', 'Ultimo Nome'));
        echo form_input('email_adress', set_value('email_adress', 'Email'));
        ?>
    </fieldset>
    
    <fieldset>
        <legend>Login</legend>
        <?php
        echo form_input('username', set_value('username', 'Username'));
        echo form_input('password', set_value('password', 'Password'));
        echo form_input('password2', set_value('password2', 'Comfirmar Password'));
        echo form_submit('submit', 'Criar Conta');
        ?>
        <?php echo validation_errors('<p class="error"></p>'); ?>
    </fieldset>
</div>