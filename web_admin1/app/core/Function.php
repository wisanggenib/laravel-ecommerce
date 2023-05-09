<?php 

function login(){
    if (!isset($_SESSION['login_to'])) {
        feature::redirect_page(base_url());
        die();
    }
}

function set_notification($message, $type){
    $_SESSION['notification']['type'] = $type;
    $_SESSION['notification']['message'] = $message;
}


function notification(){
    if (isset($_SESSION['notification'])) {
        echo '

        <div class="text-dark tutup_alert alert alert-'.$_SESSION['notification']['type'].' alert-dismissible fade show" role="alert">
        '.$_SESSION['notification']['message'].'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>

        ';
        unset($_SESSION['notification']);
    }
}