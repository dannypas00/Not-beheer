{{-- CSRF --}}
<?php ?>
@csrf

{{-- Name --}}
<div class="row">
    <div class="col-6">
        <label for="name" class="mb-2">Naam van speler</label>
        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror"
               placeholder="John Doe" value="@if(!empty($player)) {{$player->name}} @endif">
        <small class="form-text text-muted">Een naam van een speler moet uniek zijn.</small>

        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    @if(empty($player))
        <div class="col-6">
            <label for="file" class="mb-2">Speler afbeelding (optioneel)</label>
            <input type="file" name="file" class="form-control">
            <small class="form-text text-muted">Afbeelding zal worden weergegeven bij matches.</small>

            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    @endif

</div>

<div class="row mt-4">
    <div class="col-12">
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
    </div>
</div>


