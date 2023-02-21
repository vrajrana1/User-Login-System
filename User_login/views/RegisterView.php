<?php

class RegisterView {
    public function showRegisterForm($error = '') {
        ?>
        <html>
        <body>
        <form method="post" action="pages/register.php">
        <fieldset>
        <legend>Login:</legend>
            <?php if ($error) { ?>
                <div class="error"><?= $error ?></div>
            <?php } ?>
            Name:<br>
            <input type="text" name="name"><br>
            Email:<br>
            <input type="email" name="email" id="email" required></br>
            Gender:<br>
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female">Female
            </br>
            Date Of Birth:<br>
            <input type="date" id="dob" name="dob"></br>
            Password:<br>
            <input type="password" name="password" id="password" required></br>
            <button type="submit">Register</button>
        </form>
        </body>
        </html>
        <?php
    }
}