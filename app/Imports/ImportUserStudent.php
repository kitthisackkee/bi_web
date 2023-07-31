<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUserStudent implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'code' => $row['code'],
            'gender' => $row['gender'],
            'name' => $row['firstname'],
            'lastname' => $row['lastname'],
            'birthday' => $row['birthday'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'term_id' => $row['term'],
            'classroom_id' => $row['classroom'],
            'password' => bcrypt(888888),
            'role_id' => 5,
        ]);
    }
}
