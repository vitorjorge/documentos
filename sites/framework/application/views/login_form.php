<div id="login_form">
    <h1>Login</h1>
    <?php
     
    echo form_open('login/validate_credentials');
    echo form_input(array(
              'username' => 'Username',
              'placeholder' => 'Username',
            ));

	$data = array(
              'name'        => 'password',
              'placeholder' => 'Enter Password',
              'value'       => set_value('password')
            );
	
	 echo form_password($data);
    echo form_submit('submit', 'Login');
    echo anchor('login/signup', 'Create Account');
    ?>
</div>