<?php

namespace itsep\Http\Controllers;

use Illuminate\Http\Request;
use itsep\Mail\Test as TestMail;
use itsep\User as UserModel;
use itsep\Models\ListModel;
use itsep\Jobs\SendEmail as SendEmailJob;

class SendController extends Controller
{
	public function form() {
		$lists=UserModel::find(\Auth::user()->id)->lists()->get();
		return view('send.form',['lists'=>$lists]);
	}
	public function send(Request $request) {
		// $data =[
		// 'text'=>$request->get('message')
		// ];
		// \Mail::send('emails.test', $data, function($message) use ($request) {
		// 	$message->to($request->get('to'))->subject($request->get('subject'));
		// });
		//$when = \Carbon\Carbon::now()->addMinutes(1);
		//$mail = new TestMail($request->get('message'), $request->get('subject'));
		//\Mail::to($request->get('to'))->queue($mail); //попадает в очередь
		//\Mail::to($request->get('to'))->later($when, $mail); // отправляется позже через 1 минуту

		// $listSubscribers = ListModel::findOrFail($request->get('list_id'))->subscribers()->get();
		// foreach ($listSubscribers as $subscriber) {
		// 	$mail = new TestMail($request->get('message'), $request->get('subject'));
		// 	\Mail::to($subscriber->email)->send($mail);
		// }

		dispatch(new SendEmailJob (
			$request->get('list_id'),
			$request->get('message'),
			$request->get('subject'),
			\Auth::user()->id
			));

	}
    
}
