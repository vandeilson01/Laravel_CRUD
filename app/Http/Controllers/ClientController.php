<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\Phone;
use App\Models\PhoneClient;
use App\Models\Type;
use App\Models\TypeClient;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clients = Client::paginate(10);
        $types = Type::get();
        $phones = Phone::get();

        return view('clients.index', compact('clients','types','phones'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Type::get();
        return view('clients.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $nameImage = '';

        if($request->hasFile('image') && $request->file('image')->isValid()){
              
            Validator::make($request->all(), [
                'image' => 'required|file|mimes:jpeg,png,jpg,PNG,JPEG,JPG,gif,GIF,svg|max:12048',
            ]);
        
            $image = $request->file('image');
            $name_image = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name_image);
            $nameImage = $name_image;
        }

      
        $client = Client::insertGetId([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'image' => $nameImage,
        ]);

        
       if($client){

            $all = $request->all();
           
            $people = $all['people'];

            if(!empty($people)){

                foreach($people as $key => $value){
                    TypeClient::insert([
                        'client' => $client,
                        'type' => $value,
                    ]);
                }

            }
         
            $number = $all['number'];

            $idphones = [];

            if(!empty($number)){

                foreach($number as $key => $value){
                    $idphone = Phone::insertGetId([
                        'number' => $value,
                    ]);
                    if($idphone){array_push($idphones, $idphone);}
                }

                for($i=0;$i<count($idphones);$i++){
                    PhoneClient::insert([
                        'client' => $client,
                        'phone' => $idphones[$i],
                    ]);
                }

            }
       }

        return redirect()->route('clients.index')
                        ->with('success','Cliente adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $clients = Client::where('id', $id)->first();
        $types = Type::get();

        $peoples = $clients->where('id', $clients->id)->first();
        $people = $peoples->type()->get();

        $phones = $clients->where('id', $clients->id)->first();
        $phone = $phones->phone()->get();
        
       
        return view('clients.show',compact('clients','people','types','phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::get();
        $client = Client::where('id', $id)->first();

        $types = Type::get();
        $typesclient = TypeClient::get();

        $peoples = $clients->where('id', $id)->first();
        $people = $peoples->type()->get();

        $phones = $clients->where('id', $id)->first();
        $phone = $phones->phone()->get();
        $phoneend = $phones->phone()->count();

        return view('clients.edit',compact('clients','client','types','typesclient','peoples','phone','phoneend'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $nameImage = '';

        if($request->hasFile('image') && $request->file('image')->isValid()){
              
            Validator::make($request->all(), [
                'image' => 'required|file|mimes:jpeg,png,jpg,PNG,JPEG,JPG,gif,GIF,svg|max:12048',
            ]);
        
            $image = $request->file('image');
            $name_image = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads');
            $ext = $image->extension();
            $name = md5(time()).'.'.$ext;
            $image->move($destinationPath, $name);
            $nameImage = $name;

            $client = Client::where('id',$id)->update([
                'image' => $name,
            ]);
        }

        $client = Client::where('id',$id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        
       if($id){

            $all = $request->all();
           
            $people = $all['people'];

            TypeClient::where('client', $id)->delete();

            if(!empty($people)){

                foreach($people as $key => $value){
                    TypeClient::insert([
                        'client' => $id,
                        'type' => $value,
                    ]);
                }

            }
         
            $number = $all['number'];

            $idphones = [];

            PhoneClient::where('client', $id)->delete();

            if(!empty($number)){

                foreach($number as $key => $value){
                    $idphone = Phone::insertGetId([
                        'number' => $value,
                    ]);
                    if($idphone){array_push($idphones, $idphone);}
                }

                for($i=0;$i<count($idphones);$i++){
                    PhoneClient::insert([
                        'client' => $id,
                        'phone' => $idphones[$i],
                    ]);
                }

            }
       }
      
        return redirect()->route('clients.index')
                        ->with('success','Cliente modificado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Client::where('id', $id)->delete();
        TypeClient::where('id', $id)->delete();
        PhoneClient::where('id', $id)->delete();
       
        return redirect()->route('clients.index')
                        ->with('success','Cliente deletado com sucesso.');
    }
}
