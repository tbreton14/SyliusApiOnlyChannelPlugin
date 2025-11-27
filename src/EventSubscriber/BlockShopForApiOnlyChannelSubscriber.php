<?php
namespace Tbreton14\SyliusApiOnlyChannelPlugin\src\EventSubscriber;

use Sylius\Component\Channel\Context\ChannelContextInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class BlockShopForApiOnlyChannelSubscriber implements EventSubscriberInterface {

    private ChannelContextInterface $channelContext;

    public function __construct(ChannelContextInterface $channelContext){
        $this->channelContext = $channelContext;
    }

    public function onKernelRequest(RequestEvent $event): void {
        $request = $event->getRequest();

        if (!str_starts_with($request->attributes->get('_route',''), 'sylius_shop_')) return;

        $channel = $this->channelContext->getChannel();

        if (method_exists($channel, 'isApiOnly') && $channel->isApiOnly()) {
            throw new SuspiciousOperationException('This channel is API Only. Shop frontend is disabled.');
        }
    }

    public static function getSubscribedEvents(): array {
        return [ KernelEvents::REQUEST => ['onKernelRequest', 15] ];
    }
}
