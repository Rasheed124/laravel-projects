<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use App\Repository\CompanyRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct(protected CompanyRepository $company)
    {
    }

    public function index(Request $request)
    {

        // dd($request->sort_by);

        $companies = $this->company->companies();

        // $contacts = Contact::latest()->paginate(10);

        $contacts = Contact::latest()->where(function ($query) {
            if ($companyId = request()->query("company_id")) {
                $query->where("company_id", $companyId);
            }
        })->paginate(10);

        // $contactsCollection = Contact::latest()->get();
        // $perPage            = 10;
        // $currentPage        = request()->query('page', 1);
        // $items              = $contactsCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->values();
        // $total              = $contactsCollection->count();
        // $contacts           = new LengthAwarePaginator($items, $total, $perPage, $currentPage, [
        //     'path'  => request()->url(),
        //     'query' => request()->query(),
        // ]);

        return view('contacts.index', compact('contacts', 'companies'));

    }

    public function create()
    {

        // $contacts = $this->getContacts();

        $companies = $this->company->companies();
        $contact = new Contact();

      return view('contacts.create', compact('companies', 'contact'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email',
            'phone'      => 'nullable',
            'address'    => 'nullable',
            'company_id' => 'required|exists:companies,id',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function show($id)
    {

        // $contacts = $this->getContacts();
        // abort_unless(isset($contacts[$id]), 404) ;

        // $contact = $contacts[$id];

        $contact = Contact::findOrFail($id);

        return view('contacts.show')->with('contact', $contact);

    }

    public function edit($id)
    {

        $companies = $this->company->companies();

        $contact = Contact::findOrFail($id);

        return view('contacts.edit', compact('companies', 'contact'));

    }

    // public function update($id)
    // {

    //     $companies = $this->company->companies();

    //     $contact = Contact::findOrFail($id);

    //     return view('contacts.edit', compact('companies', 'contact'));

    // }

    public function update(Request $request, $id)
    {

        $contact = Contact::findOrFail($id);
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email',
            'phone'      => 'nullable',
            'address'    => 'nullable',
            'company_id' => 'required|exists:companies,id',
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
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
