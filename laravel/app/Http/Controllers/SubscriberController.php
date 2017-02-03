<?php

namespace itsep\Http\Controllers;

use Illuminate\Http\Request;
use itsep\Models\Subscriber as SubscriberModel; //подключаем модель,добавляем ей алиас SubscriberModel


class SubscriberController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validator($request->all())->validate();
        SubscriberModel::create([
            'user_id' => \Auth::user()->id,
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email')
        ]);

    }
    public function lists(){
       
         $data['list']=SubscriberModel::where('user_id',\Auth::user()->id)->get()->toArray();
         
         return view('subscribers.list',$data);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        var_dump($id);
        $subscriber = SubscriberModel::find($id);
        var_dump($subscriber);
         return view('subscribers.edit', compact('subscriber'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
         $Subscriber=SubscriberModel::find($id);
        echo '<h4>Данные '.$request->get('email'). ' успешно обновлены</h4>';
         $Subscriber['first_name']=$request->get('first_name');
         $Subscriber['last_name']=$request->get('last_name');
         $Subscriber['email']=$request->get('email');
         $Subscriber->save();
          $data['list']=SubscriberModel::where('user_id',\Auth::user()->id)->get()->toArray();
          return view('subscribers.list',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    protected function validator(array $data) {
        return \Validator::make($data, [
                    'first_name' => 'required|max:128|min:2',
                    'last_name' => 'required|max:128|min:2',
                    'email' => 'required|email|max:256'
        ]);
    }

}
