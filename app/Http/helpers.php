<?php

function makeImageFromName($name)
{
    $userImage = "";
    $shortname = "";

    $names = explode(" ", $name);

    foreach ($names as $w) {
        $shortname .= $w[0];
    }
    $userImage = '<div class="name-image bg-primary">' . $shortname . '</div>';
    return $userImage;
}
