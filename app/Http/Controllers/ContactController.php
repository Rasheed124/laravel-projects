<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
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

        $query    = Contact::query();
        $contacts = Contact::allowedTrash()
            ->allowedSorts(['first_name', 'last_name', 'email'], "-id")
            ->allowedFilters('company_id')
            ->allowedSearch('first_name', 'last_name', 'email')->paginate(10);

        return view('contacts.index', compact('contacts', 'companies'));

    }

    public function create()
    {

        // $contacts = $this->getContacts();

        $companies = $this->company->companies();
        $contact   = new Contact();

        return view('contacts.create', compact('companies', 'contact'));

    }

    public function store(ContactRequest $request)
    {

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function show(Contact $contact)
    {

        return view('contacts.show')->with('contact', $contact);

    }

    public function edit(Contact $contact)
    {

        $companies = $this->company->companies();

        return view('contacts.edit', compact('companies', 'contact'));

    }

    public function update(ContactRequest $request, Contact $contact)
    {

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        $redirect = request()->query('redirect');
        return ($redirect ? redirect()->route($redirect) : back())
            ->with('message', 'Contact has been moved to trash.')
            ->with('undoRoute', $this->getUndoRoute('contacts.restore', $contact));
    }

    public function restore(Contact $contact)
    {
        // $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->restore();
        return back()
            ->with('message', 'Contact has been restored from trash.')
            ->with('undoRoute', $this->getUndoRoute('contacts.destroy', $contact));
    }

    protected function getUndoRoute($name, $resource)
    {
        return request()->missing('undo') ? route($name, [$resource->id, 'undo' => true]) : null;
    }

    public function forceDelete(Contact $contact)
    {
        // $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->forceDelete();
        return back()
            ->with('message', 'Contact has been removed permanently.');
    }
}
