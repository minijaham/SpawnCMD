<?php

namespace minijaham\Spawn;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener
{
    /** @var string[] */
    private $config;
    
  public function onEnable() : void
	{
		$this->config = $this->getConfig()->getAll();
	}
  public function onCommand(CommandSender $s, Command $cmd,$label, array $args):bool
  {
    $ds = $this->getServer()->getDefaultLevel()->getSpawnLocation();
    $name = $s->getName();
    switch($cmd->getName())
    {
      case "spawn":
        if($s instanceof Player)
        {
          $s->sendMessage($this->config["onteleport"]);
          $s->teleport($ds);
          return true;
        }
        else
        {
            $s->sendMessage($this->config["useingame"]);
            return true;
        }

	}
  }
}