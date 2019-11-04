<?php


namespace App\Controller\Api;


use App\Query\TaskQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class TaskController extends AbstractController
{
    /**
     * @var TaskQuery
     */
    private $taskQuery;

    public function __construct(TaskQuery $todoQuery)
    {
        $this->taskQuery = $todoQuery;
    }

    /**
     * @Route("/api/task", methods={"GET"})
     */
    public function all(): JsonResponse
    {
        return new JsonResponse($this->taskQuery->findAll());
    }
}
