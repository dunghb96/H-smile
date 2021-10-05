<div class="row">
    <div class="{{ !empty($classPreview) ? $classPreview : 'col-md-2 col-4' }}" id="image-preview-{{ $keyId }}">
        <img class="img-fluid" src="{{ isImage($inputValue) ? $inputValue : '/images/no-image.png' }}">
    </div>
    <div class="{{ !empty($classInput) ? $classInput : 'col-md-5 col-8' }}">
        <div class="input-group mb-3">
            <input type="text" id="{{ $keyId }}" name="{{ $inputName }}" value="{{ $inputValue }}" class="form-control @error('{{ $inputName }}') is-invalid @enderror">
            <div class="input-group-append">
                <button data-input="{{ $keyId }}" data-preview="image-preview-{{ $keyId }}" class="btn btn-primary lfm-{{ $lfmType && $lfmType === 'image' ? 'image' : 'file' }}" type="button"><i class="fas fa-folder-open"></i></button>
                <button onclick="resetInput('{{ $keyId }}') " class="btn btn-danger" type="button"><i class="fas fa-eraser"></i></button>
            </div>
        </div>
        <p class="text-muted">{{ $note }}</p>
    </div>
</div>
