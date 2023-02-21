<?php

class LoginView {
    public function showLoginForm($error = '') {
        ?>
        <html>
        <body>
        <form method="post" action="pages/login.php">
        <fieldset>
        <legend>Login:</legend>
            <?php if ($error) { ?>
                <div class="error"><?= $error ?></div>
            <?php } ?>
            <input type="email" name="email" id="email" required></br>
            Password:<br>
            <input type="password" name="password" id="password" required></br>
            <button type="submit">Login</button>
        </fieldset>
        </form>
        </body>
        </html>
        <?php
    }
}