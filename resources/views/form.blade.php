<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Name:</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $client->name or old('name') }}" required>
    @include('partials.errors', ['field' => 'name'])
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">E-mail:</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{ $client->email or old('email') }}" required>
    @include('partials.errors', ['field' => 'email'])
</div>
<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
    <label for="location" class="control-label">Location:</label>
    <input type="text" name="location" id="location" class="form-control" placeholder="Location" value="{{ $client->email or old('location') }}" required>
    @include('partials.errors', ['field' => 'location'])
</div>
<div class="form-group text-right">
    <button class="btn btn-primary">Save</button>
</div>
