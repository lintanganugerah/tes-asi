<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nomor" => $this->nomor,
            "nama" => $this->nama,
            "jabatan" => $this->jabatan,
            "talahir" => $this->talahir,
            "photo_upload_path" => $this->photo_upload_path,
            "created_by" => $this->created_by,
            "updated_by" => $this->updated_by,
            "deleted_on" => $this->deleled_on,
        ];
    }
}
