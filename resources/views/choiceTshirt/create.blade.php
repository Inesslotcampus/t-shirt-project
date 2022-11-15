@extends('layout')
@section('content')
<div class="m-4">
    <div class="bg-gray-50 m-6 p-6">
        <h1 class="text-xl text-center mb-6 font-semibold ">Créer un nouveau T-shirt</h1>
        <div class="flex justify-center ">
            <form method="POST" action="{{ route('choiceTshirt.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <h2 class=" text-lg ">Genre</h2>
                    <div class="flex justify-center py-4">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" id="woman" name="genre" value="woman">
                        <label for="title" class="pl-4 pr-24">Femme </label><br />
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" id="man" name="genre" value="man">
                        <label for="title" class="pl-4 pr-24">Homme </label><br />
                    </div>
                    <h2 class=" text-lg ">Taille </h2>
                    <div class="flex justify-between py-4">
                        @foreach($size as $onesize)
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" id={{$onesize}} name="size" value={{$onesize}}>
                        <label for="title" class="pl-4 pr-24">{{$onesize}} </label>
                        @endforeach

                    </div>
                   
                    <h2 class=" text-lg mt-4 ">Motifs </h2>
                    <div class="flex justify-center">
                        <div>
                        <ul class=" m-10 max-w-md mx-auto">
                            @foreach($sourcesImages as $sourceOneImage)
                            <li class="relative">
                                <input class="sr-only peer" type="radio" value={{$sourceOneImage}} name="type" id="answer_no">
                                <label class="my-2 w-32 h-32 flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50  peer-checked:ring-2" for="answer_no">
                                <img src={{$sourceOneImage}}>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                        </div>
                        <div> <img class="w-80 mx-8 my-12" src="/image/t-shirt-blanc.jpg"></div>
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