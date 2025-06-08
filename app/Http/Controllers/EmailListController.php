<?php

namespace App\Http\Controllers;

use App\Models\yes;
use Illuminate\Http\Request;
use App\Models\EmailList;
 // Assuming you have a model named EmailList


class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('email-list.index', [
            'emailsLists' => EmailList::query()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    


        return view('email-list.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required|string|max:255'],
            'Listfile' => ['required|file|' ,'mimesTypes:csv,txt,xlsx,xls'],
        ]);

        $file = request()->file('Listfile');
        $fileHandler = fopen($file->getRealPath(), 'r');
        $items = [];

        while (($row = fgetcsv($fileHandler, 1000, ',')) !== false) {
            if ($row[0] === 'name' && $row[1] === 'email') {
                continue; // Skip header row
            }
            $items[] = [
                'email' => $row[1],
                'name' => $row[0]?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            fclose($fileHandler);
        }

        $emaliList=EmailList::query()->create([
            'title' => $request->title,
        ]);

        $emaliList -> subscribers() -> createMany($items);
        

        return to_route('email-list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(no $no)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(no $no)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, no $no)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(no $no)
    {
        //
    }
}
