<?php

namespace wockkinmycup\advancedbounty;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use wockkinmycup\advancedbounty\Commands\BountyCommand;
use wockkinmycup\advancedbounty\Utils\BountyManager;
use wockkinmycup\advancedbounty\Utils\Utils;

class Loader extends PluginBase {

    public const NOPERMISSION = TextFormat::DARK_RED . "You do not have access to that command.";

    public static Loader $instance;

    public function onLoad(): void
    {
        self::$instance = $this;
    }

    public function onEnable(): void
    {
        foreach ($this->getResources() as $resource) {
            $this->saveResource($resource->getFilename());
        }
        $this->saveDefaultConfig();
        $this->registerCommands();
    }

    public function registerCommands() {
        $this->getServer()->getCommandMap()->registerAll("advancedbounty", [
            new BountyCommand()
        ]);
    }

    public function registerListeners() {
        $pluginMgr = $this->getServer()->getPluginManager();


    }

    public static function getInstance() : Loader {
        return self::$instance;
    }
}
