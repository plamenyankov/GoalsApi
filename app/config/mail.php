<?php

return array(

    'driver' => 'smtp',

    'host' => 'smtp.gmail.com',

    'port' => 587,

    'from' => array('address' => 'plamenyankovtest@gmail.com', 'name' => 'Awesome Laravel 4 Auth App'),

    'encryption' => 'tls',

    'username' => 'plamenyankovtest@gmail.com',

    'password' => 'C0lumb012',

    'sendmail' => '/usr/sbin/sendmail -bs',

    'pretend' => false,

);
