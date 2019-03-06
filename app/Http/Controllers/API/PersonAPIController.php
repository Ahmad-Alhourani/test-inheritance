<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonAPIRequest;
use App\Http\Requests\API\UpdatePersonAPIRequest;
use App\Models\Person;
use App\Repositories\Backend\PersonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class PersonAPIController
 * @package App\Http\Controllers\API
 */
class PersonAPIController extends Controller
{
    /** @var  PersonRepository */
    private $personRepository;
    /** @var  PersonModel */
    private $personModel;

    public function __construct(PersonRepository $personRepo, Person $person)
    {
        $this->personRepository = $personRepo->skipCache(true);
        $this->personModel = $person;
    }

    /**
     * Display a listing of the Person.
     * GET|HEAD /tests
     *
     * @param Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $tests = $this->personRepository->all();
        return response()->json([
            'data' => $tests,
            'People retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Person in storage.
     * POST /tests
     *
     * @param CreatePersonAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreatePersonAPIRequest $request)
    {
        $input = $request->all();
        $this->personRepository->create($input);
        return response()->json(['Person saved successfully']);
    }

    /**
     * Display the specified Person.
     * GET|HEAD /tests/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        /** @var Person $person */
        //   $person = $this->personRepository->findByField('id',$id);
        $person = $this->personModel->find($id);
        return response()->json([
            'data' => $person,
            'Person retrieved successfully'
        ]);
    }

    /**
     * Update the specified Person in storage.
     * PUT/PATCH /tests/{id}
     *
     * @param  int $id
     * @param UpdatePersonAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function update($id, UpdatePersonAPIRequest $request)
    {
        $input = $request->all();
        /** @var Person $person */
        $person = $this->personModel->find($id);
        $person = $this->personRepository->update($person, $input);
        return response()->json(['Person updated successfully']);
    }

    /**
     * Remove the specified Person from storage.
     * DELETE /tests/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Person $person */
        $person = $this->personModel->find($id);
        $person->delete();

        return response()->json('Person deleted successfully');
    }
}
