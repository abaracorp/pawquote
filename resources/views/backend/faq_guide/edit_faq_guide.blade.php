@extends('backend.master')

@section('content')
<main class="Rightside">
    <x-alert />

    <section class="add-new-blog">
        <div class="page-title">
            <h1 class="f-32 c-dark f-w-5 freedoka">Edit {{ $text }}</h1>
        </div>
    </section>

    

    
    <form action="{{ route('admin.updateFaqGuide', ['type' => $type, 'faqguide' => $faqGuide]) }}" id="editFaqGuideForm" method="POST">
        @csrf
        @method('PUT')

        <section class="">
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" class="" name="question_text" id="question"
                            value="{{ old('question_text', $faqGuide->question_text) }}" placeholder="Enter question...">
                    </div>

                    <div class="form-group">
                        <label for="Content">Answer</label>
                        <textarea name="content" id="Content" placeholder="Enter your answer....">{{ old('content', $faqGuide->content) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Status:</label>
                        <ul class="radio-card">
                            <li>
                                <label class="radio-container">Publish
                                    <input type="radio" name="status" value="0" {{ $faqGuide->status == 0 ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-container">Draft
                                    <input type="radio" name="status" value="1" {{ $faqGuide->status == 1 ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <section class="bottom-buttons">
            <button type="submit" class="save-faq f-18 c-orange f-w-5 freedoka b-orange">Update {{ $text }}</button>
            <button type="button" onclick="clearFormData(this.form.id)" class="cancel f-18 c-light f-w-5 freedoka b-light">Clear</button>
            {{-- <a href="{{ route('admin.faqGuide', ['type' => $type]) }}"
               class="cancel f-18 c-light f-w-5 freedoka b-light">Cancel</a> --}}
        </section>
    </form>
</main>

@push('scripts')
    <script src="{{ asset('js/ckEditor.js') }}"></script>
@endpush

@endsection
