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

namespace Ayzrix\ChunkBorder\Commands;

use Ayzrix\ChunkBorder\Main;
use Ayzrix\ChunkBorder\Utils\Utils;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;

class Border extends PluginCommand {

    public static $players = [];

    public function __construct(Main $plugin) {
        parent::__construct(Utils::getIntoConfig("command_name"), $plugin);
        $this->setDescription(Utils::getIntoConfig("command_description"));
        $this->setAliases(Utils::getIntoConfig("command_alias"));
    }

    public function execute(CommandSender $player, string $commandLabel, array $args) {
        if ($player instanceof Player) {
            if (!isset(self::$players[$player->getName()])) {
                self::$players[$player->getName()] = true;
                $player->sendMessage(Utils::getIntoConfig("border_activated"));
            } else {
                unset(self::$players[$player->getName()]);
                $player->sendMessage(Utils::getIntoConfig("border_deactivated"));
            }
        } else $player->sendMessage(Main::getInstance()->getConfig()->get("This command cannot be used from the console"));
    }
}