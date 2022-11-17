@extends('layout')
@section('content')
<div class="m-4">
    <div class="bg-gray-50 m-6 p-6">
        <h1 class="text-xl text-center mb-6 font-semibold ">Modifier un nouveau T-shirt</h1>
        <div class="flex justify-between ">
            <div>
                
                <div class="flex text-lg"><h2 class="pr-2 ">Taille : </h2>
                <p>{{$tShirt->title}}</p>
            </div>
            <div class="flex text-lg"><h2 class="pr-2 ">Genre : </h2>
                <p>{{$tShirt->type}}</p>
            </div>
            <div class="flex text-lg"><h2 class="pr-2 ">Image : </h2>
                <img class="w-80" src="/{{$tShirt->urlimg}}">
            </div>
            </div>

            <form method="post" action="{{ route('choiceTshirt.update', $tShirt) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
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
                                <input class="sr-only peer" type="radio" value={{$sourceOneImage}} name="type" id={{$sourceOneImage}}>
                                <label class="my-2 w-32 h-32 flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-black peer-checked:ring-2 peer-checked:border-transparent" for={{$sourceOneImage}}>
                                <img src=/{{$sourceOneImage}}>
                                </label>
                            </li>
                            @endforeach
                            <li>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full w-32 h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-800 dark:text-gray-900"><span class="font-semibold">Click to upload</span></p>
                                                
                                            </div>
                                            <input id="dropzone-file" type="file" name="type" class="hidden" />
                                        </label>
                                    </div>
                                </li>
                        </ul>
                        </div>
                        <div> <img class="w-80 mx-8 my-14" src="/image/t-shirt-blanc.jpg"></div>
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