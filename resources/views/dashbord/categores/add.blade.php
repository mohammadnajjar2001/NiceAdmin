@extends('dashboard')

@section('title')
    Dashbord-Category-Add
@endsection
@section('titlepage')
    add category
@endsection
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">category</li>
    <li class="breadcrumb-item active">add</li>
@endsection
@section('content')
    <form>
        <div class="mb-3">
            <label for="name_prodct" class="form-label">Name Prodct : </label>
            <input type="text" class="form-control m-2" id="nameprodct" placeholder="name prodct">
        </div>
        <div class="mb-3">
            <label for="description" class="بorm-control">Description : </label>
            <textarea type="textarea" class="form-control m-2" id="description" placeholder="description" style="height: 200px"></textarea>
        </div>
        <div class="mb-3">
            <label for="imgprodct" class="form-label">upload photo the prodct : </label>
            <input class="form-control m-2" type="file" id="formFile">
        </div>
        <label for="statusnow" class="form-label">Status now : </label>
        <div class="form-check m-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                active
            </label>
        </div>
        <div class="form-check m-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                inactive
            </label>
        </div>
        <button type="submit" class="btn btn-primary m-5">Submit</button>
    </form>
    <center><button type="button" class="btn btn-info m-3"><a
                href="{{ route('dashbord.category.index') }}">Back</a></button></center>
@endsection
