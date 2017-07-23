<?php

use Carbon\Carbon;

/**
 * Return latest git status
 *
 * @param $key
 * @return string
 */
function getLatestGitStatus($key)
{
    $file = @fopen(base_path(".git/logs/HEAD"), "r");

    if ($file) {
        $eof = "";
        $offset = -2;
        while($eof != "\n") {
            if (!fseek($file, $offset, SEEK_END)) {
                $eof = fgetc($file);
                $offset--;
            }
            else {
                break;
            }
        }
        $latestStatus = explode(" ", fgets($file));

        switch ($key) {
            case "hashcode":
                return $latestStatus[1];
            case "timestamp":
                return $latestStatus[5];
            default:
                return "";
        }
    }
    else {
        switch ($key) {
            case "hashcode":
                return "Nothing";
            case "timestamp":
                return Carbon::now()->timestamp;
            default:
                return "";
        }
    }

}

function object2Array($object) {
    $object = json_decode(json_encode($object),true);
    return $object;
}