@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="post" id="form" name="form" class="form-horizontal"
                    action="{{ url('/edit', [$employee->id]) }}">
                    {{ csrf_field() }}
                    <fieldset>
                        <legend>Laravel form</legend>
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="first_name" name="first_name"
                                    placeholder="First Name" value="<?php echo $employee->first_name; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="last_name" name="last_name"
                                    placeholder="Last Name" value="<?php echo $employee->last_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                placeholder="Enter email" value="<?php echo $employee->email; ?>">

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required="" value="<?php echo $employee->password; ?>">
                        </div>

                        <div class="form-group row">
                            <label for="mobile_no" class="col-sm-4 col-form-label">Phone Number</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="mobile_no" name="mobile_no"
                                    placeholder="Phone Number" value="<?php echo $employee->mobile_no; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salary" class="col-sm-4 col-form-label">Salary</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="salary" name="salary"
                                    placeholder="Salary" value="<?php echo $employee->salary; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth_date" class="col-sm-4 col-form-label">birth date</label>
                            <div class="col-sm-8">

                                <input type="date" class="form-control-plaintext" id="birth_date" name="birth_date"
                                    placeholder="birth date" value="<?php echo $employee->birth_date; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="joining_date" class="col-sm-4 col-form-label">Joining Date</label>
                            <div class="col-sm-8">

                                <input type="date" class="form-control-plaintext" id="joining_date" name="joining_date"
                                    placeholder="Joining Date" value="<?php echo $employee->joining_date; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passport_number" class="col-sm-4 col-form-label">Passport Number</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control-plaintext" id="passport_number"
                                    name="passport_number" placeholder="Passport Number" value="<?php echo $employee->passport_number; ?>">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <legend>Gender</legend>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="gender" value="1"
                                        <?= $employee->gender == '1' ? 'checked' : '' ?>>
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="gender" value="2"
                                        <?= $employee->gender == '2' ? 'checked' : '' ?>>
                                    Female
                                </label>
                            </div>

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
                                    <option value="{{ $depart->id }}"
                                        <?= $depart->id == $employee->designation_id ? ' selected="selected"' : '' ?>>{{ $depart->name }}</option>
                                    <?php } ?>
                                </select>
                            </div>

                        </fieldset>
                        <button type="submit" class="btn btn-outline-secondary" name="submit">Update</button>
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
