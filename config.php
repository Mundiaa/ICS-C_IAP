
<?php
return [
    // Site info
    'site' => [
        'site_name' => 'Task Manager',
        'admin_email' => 'emmanuel.githaiga@strathmore.edu',
        'theme' => 'light', // Options: 'light' or 'dark'
        'site_url' => 'http://localhost:8081/TaskApp',
        'site_language' => 'en',
    ],

    // Database Config
    'database' => [
        'db_host' => 'localhost',
        'db_name' => 'taskdb',
        'db_user' => 'root',
        'db_pass' => 'Adm1n@123', // Update with your actual password
        'db_type' => 'mysql', // e.g., 'mysql', 'pgsql', etc.
    ],

    // Email Config
    'smtp' => [
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'githaiga.mundia@gmail.com',
        'smtp_pass' => 'xzbf faab hcvf zwjt', // Use environment variables or secure vaults for sensitive data
        'smtp_secure' => 'SSL', // Options: 'ssl', 'tls'
    ]
];