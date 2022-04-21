<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth()
                        <div id="inset_form"></div>
                    @endauth
                    <div class="row justify-content-center">
                        <div class="col-12">
                            @include('layouts.components.alert')
                            @if(empty($contacts->count()))
                                <div class="px-3 py-1">
                                    <div class="alert alert-info p-2">Nenhum registro encontrado</div>
                                </div>
                            @else
                                <table class="table table-striped table-borderless" id="sort">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        @auth()
                                            <th class="text-center">Actions</th>
                                        @endauth
                                    </tr>
                                    </thead>
                                    <tbody class="no-border-x">
                                    @foreach($contacts as $contact)
                                        <tr class="item align-middle" id="{!! $contact->uuid !!}">
                                            <td>
                                                <a href="{{ route('contact.view', ['contact' => $contact->uuid]) }}">
                                                    {!! $contact->name !!}
                                                    <i class="mdi mdi-open-in-new"></i>
                                                </a>
                                            </td>
                                            <td>{!! $contact->contact !!}</td>
                                            <td>{!! $contact->email !!}</td>
                                            @auth()
                                                <td class="text-center">
                                                    <a href="{{ route('contact.update', ['contact' => $contact->uuid]) }}"
                                                       class="btn btn-primary">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <button class="btn btn-danger"
                                                            onclick="deleteModal('{{ route('contact.delete', ['contact' => $contact->uuid]) }}')">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                </td>
                                            @endauth
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row mt-2 mx-2 justify-content-between">
                                    <div class="col-md-5 justify-content-start text-left m-0 p-0">
                                        {!! hPaginateDescription($contacts) !!}
                                    </div>
                                    <div class="col-md-5 justify-content-end text-right m-0 p-0">
                                        <div class="float-right">
                                            {{ $contacts->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
