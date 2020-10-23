@extends('admin.layout.master')

@section('body')


    <h2 class="mb-4">User List</h2>

    <div class="card">

        <div class="card-header bg-white font-weight-bold">
            <div class="float-right icon-btn">
                <form method="get" class="form-inline" action="{{route('search.users')}}">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <button class="btn btn-outline btn-circle  btn-success" type="submit"><i
                                class="fa fa-search"></i></button>

                </form>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Details</th>
                </tr>
                </thead>
                <tbody>

                @if(count($users) >0)
                    @foreach($users as $user)
                        <tr>
                            <td data-label="Name">{{$user->fname}} {{$user->lname}}</td>
                            <td data-label="Username"><strong>{{$user->username}}</strong></td>
                            <td data-label="Email">{{$user->email}}</td>
                            <td data-label="Mobile">{{($user->phone) ?? '-'}}</td>
                            <td data-label="Details">
                                <a href="{{route('user.single', $user->id)}}" title="View"
                                   class="btn btn-icon btn-pill btn-primary">
                                    <i class="fa fa-eye"></i>  </a>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="5">
                            <strong>No Users Found !!!</strong>
                        </td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>




@endsection