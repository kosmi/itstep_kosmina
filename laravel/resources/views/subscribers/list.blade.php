@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('layouts.subscriberList')}}</div>

                <div class="panel-body">
                    <a href="{{ url('/subscribers/create') }}" class="btn btn-primary">{{trans('subscribers.addNew')}}</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{trans('lists.name')}}</th>
                                <th>{{trans('subscribers.email')}}</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($list as $subscriber) 
                            <tr>
                                <td>{{$subscriber['first_name']}} {{$subscriber['last_name']}}</td>
                                <td>{{$subscriber['email']}}</td>
                                <td>
                                    <form action="{{ url('/subscribers/'.$subscriber['id'].'/edit')}}" method="get">
                                        <input type="submit" value="{{trans('subscribers.edit')}}" class="btn btn-success">
                                        {{ csrf_field() }}
                                    </form>
                                    <!--                                    <a href="{{ route('subscribers.edit', $subscriber['id']) }}" class="btn btn-success">Edit</a> -->
                                    <!--                                    <a href="" class="btn btn-danger">Delete</a>-->
                                </td>
                                <td>
                                    <form class="form-delete" method="post" action="{{ url('/subscribers/'.$subscriber['id']) }}">
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="{{trans('lists.delete')}}" class="btn btn-danger">
                                        {{ csrf_field() }}
                                    </form>
                                </td>


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

