@extends('backend.master')
@section('content')

<main class="Rightside">
                <section class="add-new-blog">
                    <div class="page-title">
                        <h1 class="f-32 c-dark f-w-5 freedoka">Add New FAQ</h1>
                    </div>
                </section>
                <section class="">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="question">  Question   </label>
                                    <input type="text" class="" id="question" placeholder="Enter question...">
                                </div>
                                <div class="form-group">
                                    <label for="Answer">Answer  </label>
                                   <textarea name="" id="Answer" placeholder="Enter your answer...." ></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="select-wrapper b-orange br-5">
                            <select name="" id="" class="c-dark f-16 f-w-4 freedoka">
                                <option value="" class="c-light f-16 f-w-4 freedoka">Select Category</option>
                                <option value="" class="c-light f-16 f-w-4 freedoka">Billing</option>
                                <option value="" class="c-light f-16 f-w-4 freedoka">Support</option>
                                <option value="" class="c-light f-16 f-w-4 freedoka">General</option>
                            </select>
                        </div>
                                </div>
                                 <div class="form-group">
                                    <label for=""> Status: </label>
                                    <ul class="radio-card">
                                        <li><label class="radio-container">Publis
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label></li>
                                        <li> <label class="radio-container">Draft
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label></li>
                                    </ul>
                                </div>
                                  
                            </form>
                        </div>
                    </div>
                </section>
                <section class="bottom-buttons">
                    <button class="save-faq f-18 c-orange f-w-5 freedoka b-orange">Save FAQ</button>
                    <button class="cancel f-18 c-light f-w-5 freedoka b-light">cancel</button>
                </section>
            </main>

@endsection
