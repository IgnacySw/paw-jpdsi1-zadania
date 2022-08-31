<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Kalkulator ubezpieczen</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    </head>
    <body>

        <div style="width:90%; margin: 2em auto;">
            <style scoped="">
                .button-logout{
                    color: white;
                    border-radius: 4px;
                    background: rgb(150, 3, 30);
                }
            </style>
            <a href="<?php print(_APP_ROOT); ?>/app/secured2.php" class="pure-button">Przejdź do drugiej strony</a>
            <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="button-logout pure-button">Wyloguj</a>
        </div>

        <div style="width:90%; margin: 2em auto;">

            <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
				<label for="id_x">Ile lat posiadasz samochod: </label>
				<input id="id_x" type="text" name="x" value="" /><br />
				<label for="id_op">Rodzaj auta (1 - suv, 2 - hatchback, 3 - combi, 4 - sedan): </label>
				<input id="id_op" type="text" name="op" value="" /><br />
				<label for="id_y">Ile lat posiadasz prawo jazdy: </label>
				<input id="id_y" type="text" name="y" value="" /><br />
				<input type="submit" value="Oblicz" />
			</form>	

            <?php
            if (isset($info)) {
                if (count($info) > 0) {
                    echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 10px; background-color: #f88; width:300px;">';
                    foreach ($info as $msg) {
                        echo '<li>' . $msg . '</li>';
                    }
                    echo '</ol>';
                }
            }
            ?>

            <?php if (isset($outcome)){ ?>
		<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #90ee90; width:300px;">
		<?php echo 'Wynik: '.$outcome; ?>
		</div>
		<?php } ?>

    </body>
</html>


