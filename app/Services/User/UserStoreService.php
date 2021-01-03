<?php


namespace App\Services\User;


use App\Model\User;
use App\Services\LogService;
use Carbon\Carbon;

class UserStoreService
{
    /**
     * @param array $request
     * @return array
     */
    public static function store(array $request)
    {
        try {
            $columns = self::formatColumns($request);
            return User::firstOrCreate($columns) ? self::returnSuccess() : self::returnError();
        } catch (\Throwable $throwable) {
            LogService::registerErrorsInLog($throwable);
            new \Exception('Ocorreu um erro inesperado ao cadastrar usuário.');
        }
    }

    public static function formatColumns($request)
    {
        $request['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request['data_nascimento'])->format('Y-m-d');
        $request['password'] = $request['senha'];
        unset($request['senha']);
        return $request;
    }

    public static function returnSuccess()
    {
        return [
            'status' => true,
            'mensagem' => 'Usuário cadastrado com sucesso.'
        ];
    }

    public static function returnError()
    {
        return [
            'status' => false,
            'mensagem' => 'Ocorreu um erro ao cadastrar usuário.'
        ];
    }
}
