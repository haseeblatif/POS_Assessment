<div class="row mb-3 align-items-center">
    <label class="col-sm-3 col-form-label text-end">Name : </label>
    <div class="col-sm-9">
        <input type="text" name="name" id="customer" class="form-control" value="{{ old('name', $customer->name ?? '') }}" required>
    </div>
</div>

<div class="row mb-3 align-items-center">
    <label class="col-sm-3 col-form-label text-end">Phone : </label>
    <div class="col-sm-9">
        <input type="text" name="phone" id="customer" class="form-control" value="{{ old('phone', $customer->phone ?? '') }}" required>
    </div>
</div>

<div class="row mb-3 align-items-center">
    <label class="col-sm-3 col-form-label text-end">Email : </label>
    <div class="col-sm-9">
        <input type="email" name="email" id="customer" class="form-control" value="{{ old('email', $customer->email ?? '') }}">
    </div>
</div>

<div class="row mb-3 align-items-center">
    <label class="col-sm-3 col-form-label text-end">Address : </label>
    <div class="col-sm-9">
        <textarea name="address" id="customer" class="form-control" rows="2">{{ old('address', $customer->address ?? '') }}</textarea>
    </div>
</div>
<style>
    #customer{
border-radius: 18px;
    }
</style>