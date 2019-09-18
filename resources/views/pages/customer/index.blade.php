
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex flex-column-reverse">
            <div class=" col-8 offset-4" >
                    <div id="form-div">
                            <div   >
                                <a class=" btn btn-primary float-lg-right" href="/customer/create"> Create new customer</a>
                            </div>
                <table class="table table-light table-striped table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>number</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($customers) > 0)

                            @foreach ($customers as $customer)
                            <tr>
                                    <td>{{ $customer-> id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                            @endforeach

                        @else
                            <tr class=" text-warning h-10" >
                                    NO CUSOMER CREATED
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@php
                                echo time('y')
                            @endphp </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
