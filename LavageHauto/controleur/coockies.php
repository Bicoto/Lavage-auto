<?php
if (!isset($_COOKIE['data_consent'])) {
    echo '<div style="position: fixed; bottom: 0; left: 0; width: 100%; background: #fff; border-top: 1px solid #ccc; padding: 10px; text-align: center;">
            Nous utilisons des cookies pour manipuler vos données.
            <a href="?consent=accept">Accepter</a> |
            <a href="?consent=refuse">Refuser</a>
          </div>';
}

if (isset($_GET['consent'])) {
    if ($_GET['consent'] == 'accept') {
        setcookie('data_consent', 'accepted', time() + (86400 * 30), "/"); // 86400 = 1 jour
    } elseif ($_GET['consent'] == 'refuse') {
        setcookie('data_consent', 'refused', time() + (86400 * 30), "/"); // 86400 = 1 jour
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
