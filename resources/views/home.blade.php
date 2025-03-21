<form action="{{ route('acredidate.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row clearfix">
        @foreach(config('forms.default_form') as $field)
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label for="{{ $field['name'] }}">
                    {{ $field['label'] }}
                    @if($field['required'])
                        <span style="color: red;">*</span>
                    @endif
                </label>
                @if($field['type'] === 'select')
                    <select name="fields[{{ $field['name'] }}]" 
                            id="{{ $field['name'] }}" 
                            class="form-control" 
                            {{ $field['required'] ? 'required' : '' }}>
                        <option value="">-- Sélectionnez une option --</option>
                        @foreach($field['options'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                @else
                    <input type="{{ $field['type'] }}" 
                           name="fields[{{ $field['name'] }}]" 
                           id="{{ $field['name'] }}" 
                           class="form-control" 
                           placeholder="{{ $field['label'] }}" 
                           {{ $field['required'] ? 'required' : '' }}>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Bouton de soumission -->
    <div class="form-group mt-4">
        <button type="submit" class="theme-btn btn-style-seven">
            <span class="txt">Soumettre</span>
        </button>
    </div>
</form>

