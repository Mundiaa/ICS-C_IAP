<?php
class format {
    public function header($conf) {
        ?>
        <!DOCTYPE html>
        <html lang="en" data-bs-theme="<?php echo htmlspecialchars($conf['theme'] ?? 'light'); ?>">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($conf); ?></title>
            <link rel="stylesheet" href="/styles.css">
        </head>
        <body>
        <?php
    }

    public function footer($conf) {
        ?>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> My Website
            <?php 
            print $conf['site_name']; ?> -All Rights Reserved.
            </p>
        </body>
        </html>
        <?php
    }
}