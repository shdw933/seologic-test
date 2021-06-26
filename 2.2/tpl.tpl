
<html>
    <head>
    <title>Test 2.2</title>
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
        	<h2>Введите слово и параметр (пример. "газ*","баннер?")</h2>
            <b>Word:</b> <input type="text" name="word">
            <input type="submit" value="Enter">
        </form>
        <br><br>
        <blockquote><p>
            <b>Ваш результат:</b><br>
        	<?php foreach ($rword_array as $str) {?>
                <?php echo "$str ,"; ?>
            <?php } ?>
        </p></blockquote>
    </center>
    </body>
</html>