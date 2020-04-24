<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsParsing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resources;
use App\Services\XMLParserService;
use Carbon\Carbon;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function parse(XMLParserService $parserService)
    {
        $start = date('c');
        $link = Resources::query()->get();
        foreach ($link as $itemLink) {
            NewsParsing::dispatch($itemLink['link']);
        }
        return redirect()->back()->with('success', 'Новости успешно добавлены!');
    }

    public function index()
    {
        $resources = Resources::query()->paginate(5);
        return view('admin.resourcesIndex', ['resources' => $resources]);
    }

    public function create(Request $request)
    {
        $resources = new Resources();
        if ($request->isMethod('post')) {
            $data = $this->validate($request, Resources::rules(), [], Resources::attributeNames());
            $result = $resources->fill([$data,
                'link' => $request['link']
            ])->save();
            if ($result) {
                return redirect()->route('admin.resourcesIndex')->with('success', 'Ссылка успешно добавлена!');
            } else {
                $request->flash();
                return redirect()->route('admin.createResources')->with('error', 'Ошибка добавления ссылки!');
            }
        }
         return view('admin.addResources');

    }

    public function edit(Request $request, Resources $resources)
    {
        return view('admin.editResources', ['resources' => $resources]);
    }

    public function update(Request $request, Resources $resources)
    {
        if ($request->isMethod('post')) {
            $data = $this->validate($request, Resources::rules(), [], Resources::attributeNames());
            $result = $resources->fill([$data,
                'link' => $request['link']
            ])->save();

            if ($result) {
                return redirect()->route('admin.resourcesIndex')->with('success', 'Ссылка успешно обновлена!');
            } else {
                $request->flash();
                return redirect()->route('admin.editResources')->with('error', 'Ошибка обновления ссылки!');
            }
        }

    }

    public function destroy(Resources $resources)
    {
        $resources->delete();
        return redirect()->back()->with('success', 'Ссылка успешно удалена!');
    }

}
