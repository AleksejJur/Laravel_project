<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PhotoService;
use App\Service;
use App\Order;

class ServiceController extends Controller
{
    protected $photoService;

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function index(Request $request)
    {   
        $services = Service::all();
        $order_id = $request->order_id;

        return view('services.index', ['services' => $services, 'order_id' => $order_id]);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'price' => 'required',
            'photoForService' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        
        $service = Service::create(['title' => $request->title,
                                    'content' => $request->content,
                                    'price' => $request->price]);
        
        if($request->hasFile('photoForService')) {
            $file = $request->file('photoForService');
            $this->photoService->add($file, $service);
        }
        
        return redirect('/services');

    }

    public function show($id)
    {
        $services = Service::findOrFail($id);

        return view('services.show', ['services' => $services]);
    }

    public function edit(Request $request, $id)
    {
        $service = Service::FindOrFail($id);

        return view('services.edit', ['service' => $service]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'price' => 'required',
            'photoForService' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $service = Service::FindOrFail($id);
        $service->title = $request->title;
        $service->content = $request->content;
        $service->price = $request->price;
        $service->save();

        if($request->hasFile('photoForService')) {
            $file = $request->file('photoForService');
            $this->photoService->update($file, $service);
        }
        if ($request->has('file'))
        {
            $this->photoService->deleteSome($request->file);
        }

        return redirect('/services');
    }

    public function destroy(Request $request, $id)
    {
        $service = Service::FindOrFail($id);
        
        if ($service->orderItems->count() > 0 ) {   
            $request->session()->flash('message.content', 'You cant delete because service is used in order.');
            return redirect('/services');
        } else {  
            $this->photoService->delete($service);
            $service->delete();
            return redirect('/services');
        }
        
    }
}
