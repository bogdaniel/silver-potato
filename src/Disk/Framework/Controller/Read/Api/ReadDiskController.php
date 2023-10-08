<?php

declare(strict_types=1);

namespace App\Disk\Framework\Controller\Read\Api;

use App\Disk\Domain\UseCases\Read\Contract\ReadDiskUseCaseContract;
use App\Disk\Domain\UseCases\Read\ReadDiskRequest;
use App\Disk\Framework\View\Read\ReadDiskHtmlView;
use App\Disk\Presentation\Read\Http\ReadDiskHtmlPresenter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

#[Route('/api/disk/read/{uuid}', name: 'app_disk_read')]
final class ReadDiskController extends AbstractController
{
    private ReadDiskHtmlView $registerView;
    private ReadDiskUseCaseContract $useCase;
    private ReadDiskHtmlPresenter $presenter;

    public function __construct(
        ReadDiskHtmlView $registerView,
        ReadDiskUseCaseContract $useCase,
        ReadDiskHtmlPresenter $presenter
    ) {
        $this->registerView = $registerView;
        $this->useCase = $useCase;
        $this->presenter = $presenter;
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function __invoke(ReadDiskRequest $request): Response
    {
        $this->useCase->execute($request, $this->presenter);

        return $this->registerView->generateView(
            $request,
            $this->presenter->viewModel()
        );
    }
}
