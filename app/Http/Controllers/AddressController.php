<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckValidationRequest;
use App\Service\Check;
use App\Service\SaveAddress;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Throwable;

class AddressController extends Controller
{

    /**
     * @throws Throwable
     */
    public function check(CheckValidationRequest $request, Check $check): View|Factory|bool|int|Application
    {
        $res = $check($request->validated());
        try {
            throw_if($res->Address->Error, new Exception($res->Address->Error->Description));
        } catch (Exception $e) {
            Log::error('Error check address', [
                'line' => $e->getLine(),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'data' => $e->getTraceAsString(),
            ]);
            return view('welcome')->with('error', $e->getMessage());
        }
        return match ($request->input('action')) {
            'save' => $this->save($res->Address),
            'check' => $this->checkValidation($res->Address)
        };
    }

    /**
     * Save address
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        $addressService = new SaveAddress();
        $addressService->save($data);
        return view('welcome');
    }

    /**
     * @throws Throwable
     */
    public function checkValidation($data): Factory|View|Application
    {
        return view('welcome')->with('data', $data);
    }
}
