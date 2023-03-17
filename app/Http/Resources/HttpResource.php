<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HttpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $resBody = parent::toArray($request);

        $response = [
            'meta' =>[
                'message' => $resBody['message'],
                'status' => $resBody['status'],
                'pagination' => null,
            ],
            'data' => [],
        ];
        if (gettype($resBody['data']) != 'array') {
            $response['data'] = $resBody['data']->toArray();
        }
        
        if (array_key_exists('current_page', $response['data'])) {
            $res = $response['data']['data'];
            unset($response['data']['data']);
            unset($response['data']['links']);

            if (count($res)) {
                $response['meta']['pagination'] = $response['data'];
            }

            $response['data'] = $res;
        }

        return $response;
    }
}
