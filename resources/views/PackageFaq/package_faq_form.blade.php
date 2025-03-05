
<form id="faqAddUpdateForm" method="{{ isset($faq) ? 'PUT' : 'POST' }}">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ isset($faq) ? $faq->id : 0 }}">

    <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <input type="text" class="form-control" name="question" id="question" value="{{ $faq->question ?? '' }}" required>
        <div class="text-danger error-message" id="question-error"></div> <!-- For custom error message -->
    </div>

    <div class="mb-3">
        <label for="answer" class="form-label">Answer</label>
        <textarea class="form-control" name="answer" id="answer" rows="3" required>{{ $faq->answer ?? '' }}</textarea>
        <div class="text-danger error-message" id="answer-error"></div> <!-- For custom error message -->
    </div>

    <button id="submitfaqForm" type="button" class="btn btn-primary">
        {{ isset($faq) ? 'Update FAQ' : 'Save FAQ' }}
    </button>
</form>
