<?php

use Fawkes\Users\UserRepository;

class ProfilesController extends \BaseController {
    /**
     * @var Fawkes\Users\UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

	/**
	 * Display a listing of the resource.
	 * GET /profiles
	 *
	 * @return Response
	 */
	public function index()
	{
	}

    /**
     * Display a listing of the resource.
     * GET /profiles
     *
     * @return Response
     */
    public function me()
    {
        return $this->show(Auth::id());
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /profiles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /profiles
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /profiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
//		$user = $this->userRepository->find($id);
        $user = Fenix::getPerson();
        return View::make('profiles.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /profiles/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /profiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /profiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}