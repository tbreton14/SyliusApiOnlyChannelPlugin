<?php
namespace Tbreton14\SyliusApiOnlyChannelPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;

trait ChannelTrait {
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private bool $apiOnly = false;

    public function isApiOnly(): bool { return $this->apiOnly; }

    public function setApiOnly(bool $apiOnly): void { $this->apiOnly = $apiOnly; }
}
