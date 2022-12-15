<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MontirResource extends JsonResource
{
    //member1 bikin variabel
    public $status;
    public $message;

    //member konstruktor
    function __construct($status, $message, $resource){
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    //member3 fungsi toArray

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'succes' => $this->status,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
