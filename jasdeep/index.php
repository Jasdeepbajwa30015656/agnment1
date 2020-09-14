
<?php

include 'connect/connection.php';
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : GrassyGreen 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140310

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GrassyGreen</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Raleway:400,200,500,600,700,800,300" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<div id="wrapper">
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				<li class="current_page_item"><a href="index.php">Homepage</a></li>
				  <?php
          
            foreach($record as $menu):

            ?>
             <li> <a class="nav-link" href="index.php?name='<?php echo $menu['name'];?>'"><?php echo $menu['name'];?></a></li>
             	 <?php endforeach;?>
           <li> <a href="create.php" class="nav-link text-dark">Enter a new SCP Page Record</a></li>
			</ul>
		</div>
		<!-- end #menu --> 
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="#">SCP File</a></h1>
				<p>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></p>
			</div>
		</div>
	</div>
	</div>
	<div id="banner"></div>
	<div id="page" class="container">
		<div id="content">
			<div class="title">
						<?php
						if(isset($_GET['name']))
						{
						 
						 $scp=trim($_GET['name'],"'");
						$name="select * from products where name='$scp'";
						$subject=$conn->prepare($name);
						$subject->execute();
						$display=$subject->fetch(PDO::FETCH_ASSOC);

						$id=$display["id"];
						echo "
						<h2>Item:{$display['name']}<br> Object class:{$display['class']}<br></h2>
                     
                    <h2>Speical containment procedure</h2>
					<p>{$display['containment']}</p>
					<p><img class='img-fluid' src='{$display["image"]}' style='width:75%;height:auto;box-shadow:3px,3px,3px;margin-left:auto;margin-right:auto; display:block;'></p>
                       
                        <h2>Description</h2>
						<p>{$display['description']}</p>

						<h2>Reference</h2>
						<p>{$display['reference']}</p>

						<h2>Additional</h2>
						<p>{$display['Additional']}</p>

                       
                       
						<a href='update.php?id={$id}' class='btn btn-warning'>Update record</a>
						<a href='#' onclick='delete_record({$id})' class='btn btn-danger'>Delete</a>
                    
					";
					}
					else
					{
									echo "
							 <h5>Welcome to the SCP application</h5>
			               <p >PLease use the menu above to view SCP subject.</p>
			               ";
					}
					?>
		</div>
		
	</div>
</div>
	

<div id="footer-wrapper">
	<div id="footer" class="container">
		<div id="box1">
			<div class="title">
				<h2>Latest Post</h2>
			</div>
			<ul class="style1">
				<li><a href="#">Semper mod quis eget mi dolore</a></li>
				<li><a href="#">Quam turpis feugiat sit dolor</a></li>
				<li><a href="#">Amet ornare in hendrerit in lectus</a></li>
				<li><a href="#">Consequat etiam lorem phasellus</a></li>
				<li><a href="#">Amet turpis, feugiat et sit amet</a></li>
				<li><a href="#">Semper mod quisturpis nisi</a></li>
			</ul>
		</div>
		<div id="box2">
			<div class="title">
				<h2>Popular Links</h2>
			</div>
			<ul class="style1">
				<li><a href="#">Semper mod quis eget mi dolore</a></li>
				<li><a href="#">Quam turpis feugiat sit dolor</a></li>
				<li><a href="#">Amet ornare in hendrerit in lectus</a></li>
				<li><a href="#">Consequat etiam lorem phasellus</a></li>
				<li><a href="#">Amet turpis, feugiat et sit amet</a></li>
				<li><a href="#">Semper mod quisturpis nisi</a></li>
			</ul>
		</div>
		<div id="box3">
			<div class="title">
				<h2>Follow Us</h2>
			</div>
			<p>Proin eu wisi suscipit nulla suscipit interdum. Aenean lectus lorem, imperdiet magna.</p>
			<ul class="contact">
				<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
				<li><a href="#" class="icon icon-facebook"><span>Facebook</span></a></li>
				<li><a href="#" class="icon icon-dribbble"><span>Dribbble</span></a></li>
				<li><a href="#" class="icon icon-tumblr"><span>Tumblr</span></a></li>
				<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
			</ul>
				<a href="#" class="button">Read More</a> </div>
		</div>
	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
<?php
        
        $delete=isset($_GET['action']) ? $_GET['action'] :"";

        //if directed from delete.php
        if($delete =='deleted')
        {
            echo "<div clas='alert alert-success'>Records was deleted</div>";
        }
 
 
 ?>
 <script>
function delete_record(id)
{
    var answer=confirm('ok to delete this recpord');
    if(answer)
    {
      window.location='delete.php?id=' + id;
    }
}
</script>
</html>
