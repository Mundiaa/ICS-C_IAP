<?php
class UserForms {

    // Registration form
    public function registerForm() {
        ?>
        <form action="" method="post">
            <div>
                <label for="reg_user">Username:</label>
                <input type="text" id="reg_user" name="reg_user" required>
            </div>
            <br>

            <div>
                <label for="reg_email">Email Address:</label>
                <input type="email" id="reg_email" name="reg_email" required>
            </div>
            <br>

            <div>
                <label for="reg_pass">Password:</label>
                <input type="password" id="reg_pass" name="reg_pass" required>
            </div>
            <br>

            <?php $this->createButton("Register", "btn_register"); ?>
            <p>Already signed up? <a href="signin.php">Login here</a></p>
        </form>
        <?php
    }

    // Login form
    public function loginForm() {
        ?>
        <form action="" method="post">
            <div>
                <label for="login_user">Username:</label>
                <input type="text" id="login_user" name="login_user" required>
            </div>
            <br>

            <div>
                <label for="login_pass">Password:</label>
                <input type="password" id="login_pass" name="login_pass" required>
            </div>
            <br>

            <?php $this->createButton("Login", "btn_login"); ?>
            <p>Don’t have an account? <a href="./">Sign up here</a></p>
        </form>
        <?php
    }

    // Reusable button
    private function createButton($label, $name) {
        ?>
        <button type="submit" name="<?php echo $name; ?>" value="<?php echo $label; ?>">
            <?php echo $label; ?>
        </button>
        <?php
    }
}
?>
