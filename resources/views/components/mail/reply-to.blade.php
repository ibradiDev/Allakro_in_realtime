<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('Success'))
                <div class="alert alert-success mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
                    {{ session('Success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('Error'))
                <div class="alert alert-danger mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
                    {{ session('Error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <h3 class="card-header float-start text-danger">{{ __('Répondre à un mail') }}</h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('messagerie.store') }}">
                        @csrf

                        <input type="hidden" name="admin" value="admin">
                        <input type="hidden" name="message_state" value="repondu">
                        <input type="hidden" name="req_msg_id" value="{{ $mail->id }}">

                        <div class="row mb-3">
                            <label for="receiver"
                                class="col-md-4 col-form-label text-md-end">{{ __('Auteur') }}</label>
                            <div class="col-md-6">
                                <input id="receiver" type="text" readonly
                                    class="form-control @error('receiver') is-invalid @enderror" name="receiver"
                                    value="{{ $mail->sender }}" required autocomplete="receiver">

                                @error('receiver')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="receiver_email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Adresse email') }}</label>
                            <div class="col-md-6">
                                <input id="receiver_email" type="email" readonly
                                    class="form-control @error('receiver_email') is-invalid @enderror"
                                    name="receiver_email" value="{{ $mail->sender_email }}" required
                                    autocomplete="receiver_email">

                                @error('receiver_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="request_message"
                                class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>
                            <div class="col-md-6">
                                <textarea readonly name="request_message" required id="request_message"class="form-control">{{ $mail->message }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="message"
                                class="col-md-4 col-form-label text-md-end">{{ __('Message de réponse') }}</label>
                            <div class="col-md-6">
                                <textarea name="message" id="message" required class="form-control @error('message') is-invalid @enderror"></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Envoyer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
