<?php

namespace App\Service;


use App\Models\Address;
use Illuminate\Support\Facades\Log;

class SaveAddress
{
    /**
     * Save Address
     *
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        try {
            $result['street'] = $data->Address1 . $data->Address2;
            $result['city'] = $data->City;
            $result['state'] = $data->State;
            $result['zip_code'] = $data->Zip5;
            Address::create($result);
            return true;
        } catch (\Exception $e) {
            Log::error('Error save address', [
                'line' => $e->getLine(),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'data' => $e->getTraceAsString(),
            ]);
        }
    }
}
