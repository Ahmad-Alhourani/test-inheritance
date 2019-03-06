<?php

namespace App\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Person\CreatePerson;
use App\Http\Requests\Backend\Person\UpdatePerson;
use App\Repositories\Backend\PersonRepository;
use App\Events\Backend\Person\PersonCreated;
use App\Events\Backend\Person\PersonUpdated;
use App\Events\Backend\Person\PersonDeleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Person;

class PersonController extends Controller
{
    /** @var $testRepository */
    private $testRepository;

    public function __construct(PersonRepository $testRepo)
    {
        $this->testRepository = $testRepo;
    }

    /**
     * Display a listing of the Person.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->testRepository->pushCriteria(new RequestCriteria($request));
        $data = $this->testRepository->getPaginatedAndSortable(10);

        return view('backend.tests.index')->with('tests', $data);
    }

    /**
     * Show the form for creating a new Person.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        return view('backend.tests.create');
    }

    /**
     * Store a newly created Person in storage.
     *
     * @param CreatePerson $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreatePerson $request)
    {
        $obj = $this->testRepository->create(
            $request->only(["name", "email", "sms"])
        );

        event(new PersonCreated($obj));
        return redirect()
            ->route('admin.test.index')
            ->withFlashSuccess(__('alerts.frontend.test.saved'));
    }

    /**
     * Display the specified Person.
     *
     * @param Person $test
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Person $test)
    {
        return view('backend.tests.show')->with('test', $test);
    }

    /**
     * Show the form for editing the specified Person.
     *
     * @param Person $test
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Person $test)
    {
        return view('backend.tests.edit')->with('test', $test);
    }

    /**
     * Update the specified Person in storage.
     *
     * @param UpdatePerson $request
     *
     * @param Person $test
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdatePerson $request, Person $test)
    {
        $obj = $this->testRepository->update($request->all(), $test);

        event(new PersonUpdated($obj));
        return redirect()
            ->route('admin.test.index')
            ->withFlashSuccess(__('alerts.frontend.test.updated'));
    }

    /**
     * Remove the specified Person from storage.
     *
     * @param Person $test
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Person $test)
    {
        $obj = $this->testRepository->delete($test);
        event(new PersonDeleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.test.deleted'));
    }
}
