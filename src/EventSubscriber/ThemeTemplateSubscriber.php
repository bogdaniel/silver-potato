<?php

namespace App\EventSubscriber;

use App\Service\ThemeManager;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;
use Twig\Loader\LoaderInterface;

class ThemeTemplateSubscriber implements EventSubscriberInterface
{
    private $themeManager;
    private $twig;
    private string $projectDir;

    public function __construct(ThemeManager $themeManager, Environment $twig, string $projectDir)
    {
        $this->themeManager = $themeManager;
        $this->twig = $twig;

        $this->projectDir = $projectDir;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        // Get the active theme
        $activeTheme = $this->themeManager->getActiveTheme();

        $twigLoader = $this->twig->getLoader();
        // Set the template namespace based on the active theme
        $twigLoader->addPath($this->projectDir . '/themes/' . $activeTheme . '/', $activeTheme);

        // You can also adjust the template paths further if needed
         Example: $this->twig->getLoader()->prependPath($this->projectDir . '/themes/' . $activeTheme . '/');

        // Optionally, you can pass the active theme to the template
        $this->twig->addGlobal('active_theme', $activeTheme);
    }
}

