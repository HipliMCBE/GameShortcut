<?php

namespace HipliAI\GameShortcut;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info(TextFormat::GREEN . "GameShortcut plugin has been enabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::RED . "Cette commande ne peut être utilisée que par un joueur.");
            return false;
        }

        switch ($command->getName()) {
            case "gmc":
                $sender->setGamemode(GameMode::CREATIVE());
                $sender->sendMessage(TextFormat::GREEN . "Mode de jeu changé en Créatif.");
                break;
            case "gms":
                $sender->setGamemode(GameMode::SURVIVAL());
                $sender->sendMessage(TextFormat::GREEN . "Mode de jeu changé en Survie.");
                break;
            case "gmsp":
                $sender->setGamemode(GameMode::SPECTATOR());
                $sender->sendMessage(TextFormat::GREEN . "Mode de jeu changé en Spectateur.");
                break;
            default:
                return false;
        }

        return true;
    }
}

