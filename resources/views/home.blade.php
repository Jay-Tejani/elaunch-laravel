@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <legend>Laravel Table Records</legend>
            <a href="{{ url('/create') }}" class="btn btn-outline-secondary" style="height: 35px;margin-right:50px"> Manage</a>
            @if (session('info'))
                {{ session('info') }}
            @endif
            <form method="post" action='{{ url('/deleteall') }}'>

                {{ csrf_field() }}

               

                <table class="yajra-datatable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Birth date</th>
                            <th scope="col">Joining date</th>
                            <th scope="col">Passport Number</th> 
                            <th scope="col">action</th>



                        </tr>
                    </thead>
                    <tbody></tbody>
{{-- 
                    <tbody>
                        @if (count($candidates) > 0)
                            @foreach ($candidates->all() as $candidate)

                                <tr class="table-light">

                                    <td>{{ $candidate->id }}</td>
                                    <td>{{ $candidate->first_name }}</td>
                                    <td>{{ $candidate->last_name }}</td>
                                    <td>{{ $candidate->email }}</td>
                                    <td>{{ $candidate->password }}</td>
                                    <td>{{ $candidate->mobile_no }}</td>
                                    <td>{{ $candidate->gender }}</td>
                                    <td>{{ $candidate->salary }}</td>
                                    <td>{{ $candidate->birth_date }}</td>
                                    <td>{{ $candidate->joining_date }}</td>
                                    <td>{{ $candidate->passport_number }}</td>


                                    <td><a href='{{ url("/update/{$candidate->id}") }}' class="btn btn-link">Update</a>
                                    </td>
                                    <td><a href='{{ url("/delete/{$candidate->id}") }}' class="btn btn-link">Delete</a>
                                    </td>


                                </tr>



                            @endforeach
                        @endif
                    </tbody> --}}

                </table>

            </form>
        </div>




    </div>
    
@endsection
@section('script')

@endsection


