<div class="col-lg-4 col-md-6">
    <div class="mt-3">
        <div class="modal applyLoanModal fade" id="addMailModal" tabindex="-1" aria-labelledby="sendMailModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h4 class="modal-title">Envoyer un mail</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('messagerie.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="admin" value="admin">
                            <div class="row">
                                <div class="col-lg-6 mb-4 pb-2">
                                    <div class="form-group">
                                        <label for="sender" class="form-label">Administrateur
                                            <span class="text-danger">*</span></label>
                                        <input name="sender" readonly type="text" value="{{ Auth::user()->name }}"
                                            class="form-control shadow-none" id="sender" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4 pb-2">
                                    <div class="form-group">
                                        <label for="receiver_email" class="form-label">Email du destinataire<span
                                                class="text-danger">*</span></label>
                                        <input name="receiver_email" placeholder="exemple@gmail.com" type="email"
                                            class="form-control shadow-none @error('receiver_email') is-invalid @enderror"
                                            id="receiver_email" value="{{ old('receiver_email') }}" required>
                                        <div class="invalid-feedback">
                                            @error('receiver_email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-4 pb-2">
                                    <div class="form-group">
                                        <label for="message" class="form-label">Message <span
                                                class="text-danger">*</span></label>
                                        <textarea name="message" id="message" placeholder="Le contenu du mail ici..." class="form-control" required></textarea>
                                        <div class="invalid-feedback">
                                            @error('message')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        Envoyer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
