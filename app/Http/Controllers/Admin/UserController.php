<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::query()
                ->paginate(config('pagination.admin.users')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        $user = (new User())->fill($data);

        if(isset($data['is_admin'])) {
            $user->setIsAdmin();
        }

        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->setStatusCode(201)
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.users.create.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.users.create.fail'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, User $user)
    {
        $data = $request->validated();

        $user->fill($data);

        if(isset($data['is_admin'])) {
            $user->setIsAdmin();
        } else {
            $user->unsetIsAdmin();
        }

        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.users.update.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.users.update.fail'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('admin.users.index')
                ->with([
                    'type' => 'success',
                    'message' => __('messages.admin.users.destroy.success'),
                ]);
        }
        return back()->with([
            'type' => 'danger',
            'message' => __('messages.admin.users.destroy.fail'),
        ]);
    }
}
