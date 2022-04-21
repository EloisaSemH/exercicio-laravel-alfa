@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($contact) ? __('Update contact: ' . $contact->name) :__('Create contact') }}</div>

                    <div class="card-body">
                        @include('layouts.components.alert')
                        <form method="POST" action="{{ isset($contact) ? route('contact.update', ['contact' => $contact->uuid]) : route('contact.create') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">
                                    {{ __('Name') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name', $contact->name ?? '') }}" required autocomplete="name"
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="contact" class="col-md-4 col-form-label text-md-end">
                                    {{ __('Contact') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="contact" type="text" maxlength="9"
                                           class="form-control @error('contact') is-invalid @enderror" name="contact"
                                           value="{{ old('contact', $contact->contact ?? '') }}" required
                                           autocomplete="contact" autofocus>

                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">
                                    {{ __('Email Address') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" {{ isset($contact) ? 'readOnly' : '' }}
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email', $contact->email ?? '') }}" required
                                           autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
