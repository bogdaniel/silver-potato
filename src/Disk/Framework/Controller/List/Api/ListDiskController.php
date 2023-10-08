<?php

declare(strict_types=1);

namespace App\Disk\Framework\Controller\List\Api;

use App\Disk\Domain\UseCases\List\Contract\ListDiskUseCaseContract;
use App\Disk\Domain\UseCases\List\ListDiskRequest;
use App\Disk\Framework\View\List\ListDiskHtmlView;
use App\Disk\Presentation\List\Http\ListDiskHtmlPresenter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

#[Route('/api/disk/list', name: 'app_api_disk_list')]
final class ListDiskController extends AbstractController
{
    private ListDiskHtmlView $registerView;
    private ListDiskUseCaseContract $useCase;
    private ListDiskHtmlPresenter $presenter;

    public function __construct(
        ListDiskHtmlView $registerView,
        ListDiskUseCaseContract $useCase,
        ListDiskHtmlPresenter $presenter
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
    public function __invoke(ListDiskRequest $request): Response
    {
        $this->useCase->execute($request, $this->presenter);

        return $this->registerView->generateView(
            $request,
            $this->presenter->viewModel()
        );
    }
}
