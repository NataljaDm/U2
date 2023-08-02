<?php

$msg = $_SESSION['message'] ?? null;
unset($_SESSION['message']);

?>

<?php if ($msg) : ?>
    <input type="checkbox" id="msg">
    <div class="msg" style="background: <?= $msg['type'] ?>;" for=" msg">
        <?= $msg['text'] ?>
    </div>

<?php endif ?>