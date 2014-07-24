
		<div id="container">
			<div class="row login-pusher"></div>
			<div id="login">
				<div id="logo-login"></div>
				<form action="<?php echo site_url('admin/login');?>" method="post">
						<input class="textbox" type="text" placeholder="Username" name="user"/><br/>
						<input class="textbox" type="password" placeholder="Password" name="pass"/><br/>
					<input id="submit" class="button h-pointer" type="submit" value="Login"/>
				</form>
			</div>
		</div>
