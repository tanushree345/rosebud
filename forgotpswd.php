<?php
use Phppot\PasswordReset;
use Phppot\Member;

require_once __DIR__ . '/Model/PasswordReset.php';
$passwordReset = new PasswordReset();

if (empty($_GET["token"])) {
    // token not found so exit
    echo 'Invalid request!';
    exit();
} else {
    $token = $_GET["token"];
    // token found, let's validate it
    $memberRecord = $passwordReset->getMemberForgotByResetToken($token);
    if (empty($memberRecord)) {
        // token expired
        // do not say that your token has expired for security reasons
        // never reveal system state to the end user
        echo 'Invalid request!';
        exit();
    }
}
if (! empty($_POST["reset-btn"])) {
    $passwordReset->expireToken($token);
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $displayMessage = $member->updatePassword($memberRecord[0]['member_id'], $_POST["password"]);
}
?>
<?php
if (! empty($displayMessage["status"])) {
    if ($displayMessage["status"] == "error") {
        ?>
				    <div class="server-response error-msg"><?php echo $displayMessage["message"]; ?></div>
<?php
    } else if ($displayMessage["status"] == "success") {
        ?>
                    <div class="server-response success-msg"><?php echo $displayMessage["message"]; ?></div>
<?php
    }
}
?>
