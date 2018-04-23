<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Template;
use Zend\Expressive\Plates\PlatesRenderer;
use Common\Service\AbstractService;
use Common\Exception\AppException;

class HomePageAction implements ServerMiddlewareInterface
{
    /**
     * @var \App\Service\PostService
     */
    private $service;

    /**
     * @var Template\TemplateRendererInterface
     */
    private $template;

    /**
     * @param \App\Service\PostService $service
     * @param Template\TemplateRendererInterface $template
     */
    public function __construct(AbstractService $service, Template\TemplateRendererInterface $template = null)
    {
        $this->service = $service;
        $this->template = $template;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $collection = $this->service->index();

        if (!$this->template) {
            return new JsonResponse($collection);
        }

        $data = [
            'templateName'  => 'Plates',
            'templateDocs'  => 'http://platesphp.com/',
            'collection'    => $collection
        ];

        return new HtmlResponse($this->template->render('app::home-page', $data));
    }
}
