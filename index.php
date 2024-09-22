<?php
session_start();
require_once 'classes/DatabaseConnection.php';
require_once 'classes/DatabaseCrud.php';
$crud = new DatabaseCrud();


$config = require_once 'config.php';
require_once 'core/functions.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'about':
            require_once 'views/about.php';
            break;
        case 'account_details':
            require_once 'views/account_details.php';
            break;
        case 'account':
            require_once 'views/account.php';
            break;
        case 'branches':
            require_once 'views/branches.php';
            break;
        case 'checkout':
            require_once 'views/checkout.php';
            break;
        case 'contact':
            require_once 'views/contact.php';
            break;
        case 'favourites':
            require_once 'views/favourites.php';
            break;
        case 'home':
            require_once 'views/home.php';
            break;
        case 'order-details':
            require_once 'views/order-details.php';
            break;
        case 'order-recieved':
            require_once 'views/order-recieved.php';
            break;
        case 'accountLogin':
            require_once 'views/accountLogin.php';
            break;
        case 'orders':
            require_once 'views/orders.php';
            break;
        case 'privcy-policy':
            require_once 'views/privacy-policy.php';
            break;
        case 'profile':
            require_once 'views/profile.php';
            break;
        case 'refund-policy':
            require_once 'views/refund-policy.php';
            break;
        case 'shop':
            require_once 'views/shop.php';
            break;
        case 'single-product':
            require_once 'views/single-product.php';
            break;
        case 'track-order':
            require_once 'views/track-order.php';
            break;
        case 'track-order-controller':
            require_once 'controllers/track-order.php';
            break;
        case 'logout':
            require_once 'controllers/logout.php';
            break;
        case 'change_account_details':
            require_once 'controllers/change_account_details.php';
            break;
        case 'change_password':
            require_once 'controllers/change_password.php';
            break;
        case 'contact_us':
            require_once 'controllers/contact_us.php';
            break;
        default:
            require_once 'views/404.php';
    }
} else {
    require_once 'views/home.php';
}

mysqli_close(DatabaseConnection::getInstance()->getConnection());
