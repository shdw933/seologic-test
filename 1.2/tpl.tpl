
<html>
    <head>
    <title>Test 1.2</title>
    <style>
	blockquote {
    	margin-right: 30%;
    	margin-left: 30%;
	}

	blockquote p {
    	padding: 15px;
    	background: #eee;
    	border-radius: 5px;
	}
	</style>
    </head>
    <body>
    	<center>
        <form  method="POST" action="index.php">
        	<h2>Please enter ID</h2>
            <b>ID:</b> <input type="text" name="id">
            <input type="submit" value="Enter">
        </form>
        <br><br>
        <blockquote><p>
        	<?php echo $answer; ?>
        </p></blockquote>
    </center>
    </body>
</html>