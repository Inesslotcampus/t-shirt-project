@extends('layout')
@section('content')

<div class="flex justify-center bg-gray-200 mx-32">
    

   <img src="{{ route('choiceTshirt.result', $request->type)}}" class="w-80 mr-4">
    
    <form method="POST" action="{{ route('choiceTshirt.store') }}" enctype="multipart/form-data">
        @csrf
        
        <input name="pathImg" type="hidden" value="{{$request->type}}" />
        <input name="genre" type="hidden" value="{{$request->genre}}" />
        <input name="size" type="hidden" value="{{$request->size}}" />

        <div class="ml-32 mt-32 flex flex-col  ">
            <div class="font-medium text-lg text-gray-800 mb-4">Enregistrer le résultat : </div>
            <input class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2" type="submit" name="valider" value="Enregistrer">
        </div>


    </form>
</div>

@stop