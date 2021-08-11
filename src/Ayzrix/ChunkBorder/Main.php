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

namespace Ayzrix\ChunkBorder;

use Ayzrix\ChunkBorder\Tasks\BorderTask;
use Ayzrix\ChunkBorder\Commands\Border;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    /** @var Main $instance */
    private static $instance = null;

    public function onEnable() {
        $this->saveDefaultConfig();
        self::$instance = $this;
        $this->getScheduler()->scheduleRepeatingTask(new BorderTask(), 15);
        $this->getServer()->getCommandMap()->register("chunkborder", new Border($this));
    }

    public static function getInstance(): Main {
        return self::$instance;
    }
}
