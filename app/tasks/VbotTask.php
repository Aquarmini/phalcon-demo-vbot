<?php

namespace App\Tasks;

use Hanson\Vbot\Foundation\Vbot;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;

class VbotTask extends Task
{

    public function mainAction()
    {
        $config = include $this->config->application->configDir . 'vbot.php';

        $vbot = new Vbot($config);
        $vbot->messageHandler->setHandler(function (Collection $message) {
            Text::send($message['from']['UserName'], 'hi');
        });

        $vbot->server->serve();
    }

}

