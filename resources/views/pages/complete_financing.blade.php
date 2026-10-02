@extends('layouts.default')

@section('content')
<section class="rs-complete-financing pt-120 pb-120 md-pt-80 md-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="sec-title text-center mb-50">
                    <span class="sub-text">{{ translate(577) }}</span>
                    <h2 class="title">{{ translate(589) }}</h2>
                    <p class="desc">{{ translate(590) }}</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                @endif

                <div class="complete-financing-form">
                    <form action="{{ route('site.complete_financing.submit', ['language' => app()->getLocale()]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="form-label">{{ translate(625) }}</label>
                            <input type="text" class="form-control" value="{{ $fullname ?? '' }}" readonly>
                        </div>

                        <div class="documents-section-title">{{ translate(646) }}</div>

                        <div class="form-group mb-4">
                            <label class="form-label">{{ translate(525) }} *</label>
                            <div class="radio-group">
                                <div class="custom-radio">
                                    <input type="radio" name="document_type" id="id_card" value="id_card" required {{ old('document_type') === 'id_card' ? 'checked' : '' }}>
                                    <label for="id_card">{{ translate(527) }}</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" name="document_type" id="passport" value="passport" required {{ old('document_type') === 'passport' ? 'checked' : '' }}>
                                    <label for="passport">{{ translate(528) }}</label>
                                </div>
                            </div>
                            @error('document_type')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="id-card-fields" class="document-fields" style="display: none;">
                            <div class="form-group mb-4">
                                <label for="identity_front" class="form-label">{{ translate(529) }} *</label>
                                <input type="file" name="identity_front" id="identity_front" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                @error('identity_front')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="identity_back" class="form-label">{{ translate(530) }} *</label>
                                <input type="file" name="identity_back" id="identity_back" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                @error('identity_back')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div id="passport-fields" class="document-fields" style="display: none;">
                            <div class="form-group mb-4">
                                <label for="passport_file" class="form-label">{{ translate(531) }} *</label>
                                <input type="file" name="passport_file" id="passport_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                @error('passport_file')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="bank_statement" class="form-label">{{ translate(643) }} *</label>
                            <input type="file" name="bank_statement" id="bank_statement" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                            <p class="form-hint">{{ translate(644) }}</p>
                            @error('bank_statement')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="reference" value="{{ $reference ?? '' }}">
                        <input type="hidden" name="fullname" value="{{ $fullname ?? '' }}">

                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary">{{ translate(617) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.rs-complete-financing {
    background: #f8fafc;
}

.complete-financing-form {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.documents-section-title {
    font-size: 18px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid #e2e8f0;
}

.form-label {
    font-weight: 600;
    color: #334155;
    margin-bottom: 8px;
}

.form-control {
    padding: 12px 16px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 16px;
}

.form-control:focus {
    border-color: #0B6B3A;
    box-shadow: 0 0 0 3px rgba(11,107,58,0.1);
}

.form-hint {
    margin: 8px 0 0;
    font-size: 14px;
    color: #64748b;
    line-height: 1.5;
}

.radio-group {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.custom-radio {
    display: flex;
    align-items: center;
    gap: 8px;
}

.custom-radio input[type="radio"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
}

.custom-radio label {
    cursor: pointer;
    font-weight: 500;
}

.btn-primary {
    background: #0B6B3A;
    color: #fff;
    padding: 14px 32px;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #0A2E1C;
    transform: translateY(-2px);
}

@media(max-width: 768px) {
    .complete-financing-form {
        padding: 30px 20px;
    }

    .radio-group {
        flex-direction: column;
        gap: 12px;
    }
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const idCardRadio = document.getElementById('id_card');
    const passportRadio = document.getElementById('passport');
    const idCardFields = document.getElementById('id-card-fields');
    const passportFields = document.getElementById('passport-fields');
    const identityFront = document.getElementById('identity_front');
    const identityBack = document.getElementById('identity_back');
    const passportFile = document.getElementById('passport_file');

    function toggleDocumentFields() {
        const isIdCard = idCardRadio.checked;
        const isPassport = passportRadio.checked;

        idCardFields.style.display = isIdCard ? 'block' : 'none';
        passportFields.style.display = isPassport ? 'block' : 'none';

        if (identityFront) identityFront.required = isIdCard;
        if (identityBack) identityBack.required = isIdCard;
        if (passportFile) passportFile.required = isPassport;
    }

    idCardRadio.addEventListener('change', toggleDocumentFields);
    passportRadio.addEventListener('change', toggleDocumentFields);

    if (idCardRadio.checked || passportRadio.checked) {
        toggleDocumentFields();
    }
});
</script>
@endpush
@endsection
