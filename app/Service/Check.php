<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class Check
{
    /**
     * Check address validation.
     *
     * @param array $data
     * @return \$1|false|\SimpleXMLElement
     * @throws \Exception
     */
    public function __invoke(array $data)
    {
        $xml = new \SimpleXMLElement('<AddressValidateRequest></AddressValidateRequest>');
        $xml->addAttribute( 'USERID', env('USPS_USER_ID'));
        $xml->addChild("Revision", "1");
        $new = $xml->addChild("Address");
        $new->addAttribute("ID", "0");
        $new->addChild('Address1', $data['street']);
        $new->addChild('Address2');
        $new->addChild('City', $data['city']);
        $new->addChild('State', $data['state']);
        $new->addChild('Zip5', $data['zip_code']);
        $new->addChild('Zip4');
        $params = [
        "API" => "Verify",
        "XML" => $xml->asXML()
        ];
        $response = Http::get("https://secure.shippingapis.com/ShippingAPI.dll", $params);
        return simplexml_load_string($response->body());
    }
}
