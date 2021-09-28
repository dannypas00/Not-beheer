{{-- CSRF --}}
@csrf

{{-- Name --}}
<div class="row">
    <div class="col-12">
        <label for="name">Name</label>
        <input id="name" type="text" class="@error('name') is-invalid @enderror">

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{--        <x-form.text name="name"></x-form.text>--}}
    </div>
</div>

<div class="row">
    <div class="col-12">
        <button type="submit">
            Submit
        </button>
    </div>
</div>


