@extends('backend.master')
@section('content')
    <main class="Rightside">

         <x-alert />

        <section class="add-new-blog">
            <div class="page-title">
                <h1 class="f-32 c-dark f-w-5 freedoka">Add New {{$text}}</h1>
            </div>
        </section>
        <form action="{{route('admin.saveFaqGuideData',['type' => $type])}}" id="faqGuideForm" method="POST">
            @csrf
        <section class="">
            <div class="row">
                <div class="col-lg-6">
                        <div class="form-group">
                            <label for="question"> Question </label>
                            <input type="text" class="" name="question_text" id="question" placeholder="Enter question...">
                        </div>
                        <div class="form-group">
                            <label for="Content">Answer </label>
                            <textarea name="content" id="Content" placeholder="Enter your answer...."></textarea>
                        </div>

                        <div class="form-group">
                            <label for=""> Status: </label>
                            <ul class="radio-card">
                                <li><label class="radio-container">Publish
                                        <input type="radio" name="status" checked value="0">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li> <label class="radio-container">Draft
                                        <input type="radio" name="status" value="1" >
                                        <span class="checkmark"></span>
                                    </label></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>
            <section class="bottom-buttons">
                <button type="button" onclick="clearFormData(this.form.id)" class="cancel f-18 c-light f-w-5 freedoka b-light">Clear</button>
                <button type="submit"  class="save-faq f-18 c-orange f-w-5 freedoka b-orange">Save {{$text}}</button>
            </section>
        </form>
    </main>

    @push('scripts')
        <script src="{{asset('js/ckEditor.js')}}"></script>
    @endpush

@endsection
