<?php

/***
 *       _____ _                 _    ____                _
 *      / ____| |               | |  |  _ \              | |
 *     | |    | |__  _   _ _ __ | | _| |_) | ___  _ __ __| | ___ _ __
 *     | |    | '_ \| | | | '_ \| |/ /  _ < / _ \| '__/ _` |/ _ \ '__|
 *     | |____| | | | |_| | | | |   <| |_) | (_) | | | (_| |  __/ |
 *      \_____|_| |_|\__,_|_| |_|_|\_\____/ \___/|_|  \__,_|\___|_|
 *
 *
 */

namespace Ayzrix\ChunkBorder\Utils;

use Ayzrix\ChunkBorder\Main;

class Utils {

    /**
     * @param string $value
     * @return string|null|array
     */
    public static function getIntoConfig(string $value) {
        return Main::getInstance()->getConfig()->get($value);
    }
}