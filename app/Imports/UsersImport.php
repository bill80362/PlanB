<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;


class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        dd($rows->toArray());
        foreach ($rows as $row)
        {
//            User::create([
//                'name' => $row[0],
//            ]);
        }
    }
}
