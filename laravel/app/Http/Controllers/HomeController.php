<?php

namespace itsep\Http\Controllers;
use Illuminate\Http\Request;
use itsep\Models\Subscriber;
use itsep\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $UserEmail = \Auth::user()->email;
        return view('home')->with('UserEmail',$UserEmail );
    }
    public function logout()
    {
        \Auth::logout();
      return view('auth/login');
      }
    public function model()
    {
        // создать запись 1 вариант
        // Subscriber::create([
        //     'user_id'=>\Auth::user()->id,
        //     'first_name'=>'John',
        //     'last_name'=>'doe',
        //     'email'=>'john_doe@mail.com'
        //     ]);

        // создать запись 2 вариант
        // $subscriber = new Subscriber();

        // $subscriber -> user_id = \Auth::user()->id;
        // $subscriber -> first_name = 'First name 1';
        // $subscriber -> last_name = 'last name 1';
        // $subscriber -> email = 'test@email';
        // $subscriber ->save();

        // обновить запись
        // $subscriberId = 2;
        // $subscriber = Subscriber::find($subscriberId);
        // $subscriber->email = 'john_doe+1to@mail.com';
        // $subscriber->save();


        //поиск если нет значения в базе данных выдает ошибку
        // $subscriberId = 4;
        // $subscriber = Subscriber::findOrFail($subscriberId);

        // поиск объекта по базе данных where('в какой ячейке ищем', 'что ищем')-> first() - означает что берем первое совпадение
        //echo '<pre>'.print_r(Subscriber::where('first_name', 'First name 1')->first(), true).'</pre>';

        // get - масив из совпадений
        //echo '<pre>'.print_r(Subscriber::where('first_name', 'First name 1')->get(), true).'</pre>';

        // покажет тоько оди нужный массив
        //echo '<pre>'.print_r(Subscriber::where('first_name', 'First name 1')->get()->toArray(), true).'</pre>';

        //echo '<pre>'.print_r(Subscriber::where('first_name', 'First name 1')->toSQL()).'</pre>';

        // удаление
       //echo '<pre>'.print_r(Subscriber::find(2)->delete()).'</pre>';

        //echo '<pre>'.print_r(User::find(1)->subscribers()->get()->toArray(), true).'</pre>';

       }
      
}
