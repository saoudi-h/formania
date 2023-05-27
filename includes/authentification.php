<?php
if(!isset($session['user_id'])){
    header("location:./");
    exit();
}
