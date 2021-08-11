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

namespace Ayzrix\ChunkBorder\Tasks;

use Ayzrix\ChunkBorder\Commands\Border;
use Ayzrix\ChunkBorder\Main;
use pocketmine\level\particle\DustParticle;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class BorderTask extends Task {

    public function onRun(int $currentTick) {
        foreach (Border::$players as $playerName => $bool) {
            $player = Server::getInstance()->getPlayer($playerName);
            if ($player instanceof Player) {
                $level = $player->getLevel();
                $chunk = $level->getChunkAtPosition($player);
                $minX = (float)$chunk->getX() * 16;
                $maxX = (float)$minX + 16;
                $minZ = (float)$chunk->getZ() * 16;
                $maxZ = (float)$minZ + 16;
                for ($x = $minX; $x <= $maxX; $x += 0.5) {
                    for ($z = $minZ; $z <= $maxZ; $z += 0.5) {
                        if ($x === $minX || $x === $maxX || $z === $minZ || $z === $maxZ) {
                            $color = explode(", ", Main::getInstance()->getConfig()->get("rgb"));
                            $player->getLevel()->addParticle(new DustParticle(new Vector3($x, $player->getY() + 0.8, $z), (int)$color[0], (int)$color[1], (int)$color[2]), [$player]);
                        }
                    }
                }
            }
        }
    }
}