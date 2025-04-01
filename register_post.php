<?php
session_start();
require_once 'functions/user.php';
require_once 'functions/functions.php';
$status = "";
$msg = "";

if (empty($_POST)) {
    $status = 'Error!';
    $msg = 'Registration information not specified.';
} else {
    $user_data = array();
    $required = array(
        'register-email' => 'email_address',
        'register-password' => 'password',
        'register-first-name' => 'first_name',
        'register-last-name' => 'last_name',
        'register-gender' => 'gender'
    );

    // Make sure all required fields are defined
    $missing_fields = array();
    foreach ($required as $post_key => $db_key) {
        if (!isset($_POST[$post_key]) || strlen(trim($_POST[$post_key])) === 0) {
            $missing_fields[] = $post_key;
        } else {
            $user_data[$db_key] = $_POST[$post_key];
        }
    }

    if ($missing_fields) {
        $status = 'Error!';
        $msg = 'Missing fields: ' . implode(', ', $missing_fields);
    } else {
        // Check if email already exists
        if (user\user_exists($user_data['email_address'])) {
            $status = 'Error!';
            $msg = 'This email address is already registered. Please use a different email or login to your existing account.';
        } else {
            if (user\add_user($user_data)) {
                user\authenticate_user($user_data['email_address'], $user_data['password']);
                $status = 'Success!';
                $msg = 'You have successfully registered for Ride With Us!';
            } else {
                $status = 'Error!';
                $msg = 'Registration failed. Please try again.';
            }
        }
    }
}
include 'templates/head.php';
?>
<div class="well ds-component ds-hover container-narrow" data-componentid="well1">
    <div class="ds-component ds-hover" data-componentid="content2">
        <?php functions\html_respond($status, $msg); ?>
    </div>
</div>
<?php include 'templates/footer.php'; ?>
