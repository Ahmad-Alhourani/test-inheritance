<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTestAPIRequest;
use App\Http\Requests\API\UpdateTestAPIRequest;
use App\Models\Test;
use App\Repositories\Backend\TestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class TestAPIController
 * @package App\Http\Controllers\API
 */
class TestAPIController extends Controller
{
    /** @var  TestRepository */
    private $testRepository;
    /** @var  TestModel */
    private $testModel;

    public function __construct(TestRepository $testRepo, Test $test)
    {
        $this->testRepository = $testRepo->skipCache(true);
        $this->testModel = $test;
    }

    /**
     * Display a listing of the Test.
     * GET|HEAD /tests
     *
     * @param Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $tests = $this->testRepository->all();
        return response()->json([
            'data' => $tests,
            'Tests retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Test in storage.
     * POST /tests
     *
     * @param CreateTestAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreateTestAPIRequest $request)
    {
        $input = $request->all();
        $this->testRepository->create($input);
        return response()->json(['Test saved successfully']);
    }

    /**
     * Display the specified Test.
     * GET|HEAD /tests/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        /** @var Test $test */
        //   $test = $this->testRepository->findByField('id',$id);
        $test = $this->testModel->find($id);
        return response()->json([
            'data' => $test,
            'Test retrieved successfully'
        ]);
    }

    /**
     * Update the specified Test in storage.
     * PUT/PATCH /tests/{id}
     *
     * @param  int $id
     * @param UpdateTestAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function update($id, UpdateTestAPIRequest $request)
    {
        $input = $request->all();
        /** @var Test $test */
        $test = $this->testModel->find($id);
        $test = $this->testRepository->update($test, $input);
        return response()->json(['Test updated successfully']);
    }

    /**
     * Remove the specified Test from storage.
     * DELETE /tests/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Test $test */
        $test = $this->testModel->find($id);
        $test->delete();

        return response()->json('Test deleted successfully');
    }
}
