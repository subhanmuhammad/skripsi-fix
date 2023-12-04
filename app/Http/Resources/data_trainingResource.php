<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class data_trainingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'gender' => $this->gender,
            'tempat lahir' => $this->tempat_lahir,
            'agama' => $this->agama,
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s")

        ];
    }
}
