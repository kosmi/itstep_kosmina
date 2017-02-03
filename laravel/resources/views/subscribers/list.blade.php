@extends('layouts.app')

@section('content')


<div class="container">
       <div class="row">
               <div class="col-md-8 col-md-offset-2">
                       <div class="panel panel-default">
                               <div class="panel-heading">Subscriber</div>

                               <div class="panel-body">
                    <a href="{{ url('/subscribers/create') }}" class="btn btn-default pull-right">Add new</a>
                    
                    					<table class="table">
                        						<thead>
                            					      <tr>
                                					        <th>Name</th>
                                					        <th>Email</th>
                                                                                <th></th>
                                                                                <th></th>
                                					      </tr>
                            					    </thead>
                        					    <tbody>
                            					     
                            					     	@foreach($list as $subscriber) 
                            					     	<tr>
                                					     		<td>{{$subscriber['first_name']}} {{$subscriber['last_name']}}</td>
                                							<td>{{$subscriber['email']}}</td>
                                							<td><a href="">Update</a></td>
                                                                                        <td><a href="">Delete</a></td>
                                								
                                							</tr>
                            							@endforeach
                            					     	
                            					     
                            					      
                            					    </tbody>
                        					</table>
                                      
                                   </div>
                           </div>
                   </div>
           </div>
    </div>

 
@endsection 

