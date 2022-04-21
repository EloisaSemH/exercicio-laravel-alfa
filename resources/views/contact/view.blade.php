@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $contact->name }}
                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <a href="{{ route('contact.update', ['contact' => $contact->uuid]) }}"
                               class="btn btn-primary">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <a href="{{ route('contact.update', ['contact' => $contact->uuid]) }}"
                               class="btn btn-danger">
                                <i class="mdi mdi-trash-can"></i>
                            </a>
                        </div>
                        <ul>
                            <li><b>Name:</b> {!! $contact->name !!}</li>
                            <li><b>Contact:</b> {!! $contact->contact !!}</li>
                            <li><b>E-mail:</b> {!! $contact->email !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
