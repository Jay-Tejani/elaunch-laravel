@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="post" id="form" name="form" class="form-horizontal" action="{{ url('/insert') }}">
                    {{ csrf_field() }}
                    <fieldset>
                        <legend>Laravel form</legend>
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="first_name" name="first_name"
                                    placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="last_name" name="last_name"
                                    placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                placeholder="Enter email">

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required="">
                        </div>

                        <div class="form-group row">
                            <label for="mobile_no" class="col-sm-4 col-form-label">Phone Number</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="mobile_no" name="mobile_no"
                                    placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salary" class="col-sm-4 col-form-label">Salary</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="salary" name="salary"
                                    placeholder="Salary">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth_date" class="col-sm-4 col-form-label">birth date</label>
                            <div class="col-sm-8">

                                <input type="date" class="form-control-plaintext" id="birth_date" name="birth_date"
                                    placeholder="birth date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="joining_date" class="col-sm-4 col-form-label">Joining Date</label>
                            <div class="col-sm-8">

                                <input type="date" class="form-control-plaintext" id="joining_date" name="joining_date"
                                    placeholder="Joining Date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passport_number" class="col-sm-4 col-form-label">Passport Number</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="passport_number"
                                    name="passport_number" placeholder="Passport Number">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <legend>Gender</legend>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="gender" value="1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="gender" value="2">
                                    Female
                                </label>
                            </div>

                        </fieldset>
                        <div class="form-group">
                            <label for="designation_id">designation</label>
                            <select class="form-control" id="designation_id" name="designation_id" required="">
                                {{-- <option>{{$designation->name}}</option> --}}
                                <?php foreach($designation as $desig){ ?>
                                <option value="{{ $desig->id }}">{{ $desig->name }}</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="depertment_id">depertment</label>
                            <select class="form-control" id="depertment_id" name="depertment_id" required="">
                                {{-- <option>{{$designation->name}}</option> --}}
                                <?php foreach($departments as $depart){ ?>
                                <option value="{{ $depart->id }}">{{ $depart->name }}</option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary" name="submit">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" name="reset">Reset</button>
                        <a href="{{ url('/home') }}" class="btn btn-outline-secondary"> back</a>
                    </fieldset>
                </form>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
