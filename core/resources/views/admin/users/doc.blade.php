@extends('admin.layout.master')

@section('body')

    <h4 class="mb-4"><i class="fas fa-users"></i> {{$page_title}}</h4>

    <div class="card">

        <div class="card-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"> Name</th>
                    <th scope="col"> Username</th>
                    <th scope="col"> Document Verify Status</th>
                    <th scope="col"> Mobile</th>
                    <th scope="col">Details</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td data-label="Name">
                            {{$user->fname}}  {{$user->lname}}
                        </td>

                        <td data-label="Username">
                            <strong>{{$user->username}}</strong>
                        </td>
                        <td data-label="Email">
                            @if($user->doc_verify == 2)
                                <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                        <td data-label="Phone">
                            {{$user->phone}}
                        </td>
                        <td data-label="Details">
                            <a href="{{route('user.single', $user->id)}}"
                               class="btn btn-icon btn-pill btn-primary " title="View">
                                <i class="fa fa-eye"></i> </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $users->render()!!}
        </div>
    </div>





@endsection
