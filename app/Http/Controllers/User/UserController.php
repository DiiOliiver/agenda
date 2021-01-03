<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Model\User;
use App\Services\LogService;
use App\Services\User\UserStoreService;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $result = UserStoreService::store($request->except(['_token', 'confirmar_senha']));
            if ($result['status']) {
                return response()->json($result, 201);
            }
            return response()->json($result, 422);
        } catch (\Throwable $throwable) {
            LogService::registerErrorsInLog($throwable);
            $result = [
                'status' => false,
                'mensagem' => 'Ocorreu um erro inesperado ao cadastrar usuário.'
            ];
            return response()->json($result, 500);
        }
    }
}
