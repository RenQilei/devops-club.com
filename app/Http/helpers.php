<?php

function object2Array($object) {
    $object = json_decode(json_encode($object),true);
    return $object;
}