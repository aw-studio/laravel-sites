<?php

namespace AwStudio\Sites\Controllers;

use AwStudio\Sites\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SiteController
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string',
            'content' => 'sometimes',
        ]);

        Site::updateOrCreate([
            'name' => $validated['name'],
        ], [
            'content' => $validated['content'],
        ]);

        return Redirect::route($validated['route']);
    }

    public function upload(Request $request, Site $site)
    {
        $validated = $request->validate([
            'route' => 'required|string',
            'file'  => 'required',
        ]);

        $site->addFile($validated['file'])->save();

        return Redirect::route($validated['route']);
    }
}
