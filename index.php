<!DOCTYPE HTML>
<html>
	<head>
		<title>A Personal VPS</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="index.css" />
		<script src="jquery-1.11.2.min.js"></script>
		<script src="bootstrap.min.js"></script>
	</head>

	<body>
		<h1>A Personal VPS</h1>
		<?php
			function test_input($data)
			{
				$data=trim($data);
				$data=stripslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}

			function testVPNForm()
			{
				global $name, $email, $reason;
				if (empty($_POST["name"])) return "Name is required.";
				else $name=test_input($_POST["name"]);
				if (empty($_POST["email"])) return "Email is required.";
				else $email=test_input($_POST["email"]);
				$reason=test_input($_POST["reason"]);

				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "Illegal email address.";

				$connect=mysql_connect("localhost", "apache", "123456");
				if (!$connect) die("Could not connect: ". mysql_error());
				mysql_select_db("website", $connect);
				mysql_query("set names 'utf8'");
				$result=mysql_query("SELECT * FROM vpn WHERE email='$email'");
				if (!empty(mysql_fetch_array($result)))
				{
					mysql_close("$connect");
					return "$email has been applied.";
				}
				mysql_query("INSERT INTO vpn(name, email, reason, status) VALUES('$name', '$email', '$reason', 0)");
				mysql_close("$connect");
				return "Succeed!";
			}

			$name=$email=$reason="";
			if ($_SERVER["REQUEST_METHOD"]=="POST")
				echo "<script>alert(\"".testVPNForm()."\");</script>\n";
		?>
		<div role="tabpanel" id="menu">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></i>
				<li role="presentation"><a href="#VPN" aria-controls="VPN" role="tab" data-toggle="tab">VPN</a></i>
			</ul>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<p id="home">
						If there is any problem, please contact me via <a href="mailto:admin@siuto.me">admin@siuto.me</a>.
					</p>
				</div>
				<div role="tabpanel" class="tab-pane" id="VPN">
					<h4>About</h4>
					<ul>
						<li>IPv4</li>
						<li>L2TP/IPsec</li>
					</ul>
					<br/>

					<h4>Application</h4>
					<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name:</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="name" id="name" value="<?php echo $name; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email:</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="email" id="email" value="<?php echo $email; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="reason" class="col-sm-2 control-label">Reason:</label>
							<div class="col-sm-8">
								<input class="form-control col-sm-8" type="text" name="reason" id="reason" value="<?php echo $reason; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
					<p style="margin-left:5%; margin-right:5%">
						After submitting the application successfully, a mail about the result of the application will be sent soon.
					</p>

					<br/>
					<h4>Configuration</h4>
					<ul>
						<li><a href="http://jingyan.baidu.com/article/fdbd427713f4a2b89f3f487b.html">Win7</a></li>
						<li><a>Ubuntu</a></li>
						<li><a href="http://jingyan.baidu.com/article/e9fb46e176a2787521f766d2.html">Android</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>

