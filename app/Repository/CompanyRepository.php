<?php
namespace App\Repository;

use App\Models\Company;

class CompanyRepository
{

    public function companies()
    {

     return Company::orderBy('name')->pluck('name', 'id');

    }
}
