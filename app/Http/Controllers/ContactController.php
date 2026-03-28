<?php
namespace App\Http\Controllers;

use App\Repository\CompanyRepository;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{

    public function __construct(protected CompanyRepository $company)
    {
    }

    public function index(Request $request)
    {

        // dd($request->sort_by);

        $contacts = $this->getContacts();

        $companies = $this->company->companies();

        return view('contacts.index', compact('contacts', 'companies'));

    }

    public function create()
    {

        $contacts = $this->getContacts();

        return view('contacts.create', compact('contacts'));

    }
    public function show($id)
    {

        $contacts = $this->getContacts();
        abort_unless(isset($contacts[$id]), 404);

        $contact = $contacts[$id];

        return view('contacts.show')->with('contact', $contact);

    }

    protected function getContacts()
    {
        return [
            1 => ['id' => 1, 'name' => 'Name 1', 'phone' => '1234567890'],
            2 => ['id' => 2, 'name' => 'Name 2', 'phone' => '2345678901'],
            3 => ['id' => 3, 'name' => 'Name 3', 'phone' => '3456789012'],
        ];
    }
}
