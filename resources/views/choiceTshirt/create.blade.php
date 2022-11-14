@extends('layout')
@section('content')
<div class="m-4">
    <div class="bg-gray-50 m-6 p-6">
        <h1 class="text-xl text-center mb-6 font-semibold ">Créer un nouveau T-shirt</h1>
        <div class="flex justify-center ">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div>
                    <h2 class=" text-lg ">Genre</h2>
                    <div class="flex justify-center py-4">
                        <input type="radio" id="woman" name="genre" value="woman">
                        <label for="title" class="pl-4 pr-24">Femme </label><br />
                        <input type="radio" id="man" name="genre" value="man">
                        <label for="title" class="pl-4 pr-24">Homme </label><br />
                    </div>
                    <h2 class=" text-lg ">Taille </h2>
                    <div class="flex justify-between py-4">
                        <input type="radio" id="xs" name="size" value="xs">
                        <label for="title" class="pl-4 pr-24">XS </label>
                        <input type="radio" id="s" name="size" value="s">
                        <label for="title" class="pl-4 pr-24">S </label>
                        <input type="radio" id="M" name="size" value="M">
                        <label for="title" class="pl-4 pr-24">M </label>
                        <input type="radio" id="L" name="size" value="L">
                        <label for="title" class="pl-4 pr-24">L </label>
                        <input type="radio" id="XL" name="size" value="XL">
                        <label for="title" class="pl-4 pr-24">XL </label>
                        <input type="radio" id="XXL" name="size" value="XXL">
                        <label for="title" class="pl-4 pr-24">XXL </label>
                    </div>
                </div>
                <div class="flex justify-center mt-8">
                    <input class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2" type="submit" name="valider" value="Valider">
                </div>
            </form>
        </div>
    </div>
</div>

@stop