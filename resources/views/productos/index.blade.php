@extends("layouts.app")

@section("titulo", "nuestros productos")

@section("contenido")
 <div >
  <a href="{{route('productos.create')}}" class="btn btn-outline border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white">nuevo producto</a>
 </div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
@foreach($productos as $producto)
<div class="card bg-base-100 w-96 shadow-xl">
  <figure>
    <img
      src="https://picsum.photos/id/{{$producto -> id}}/240"
      alt="{{$producto -> nombre}}"/>
  </figure>
  <div class="card-body">

    <h2 class="card-title">{{$producto -> id}}</h2>
    <div class="badge badge-secondary">${{$producto -> precio}}</div>
    <p>{{$producto -> description}}</p>
    <div class="card-actions justify-end">
      <a href="{{route('productos.edit' , $producto -> id )}}" class="btn btn-outline btn-xs" >editar</a>
     <form action="{{route('productos.destroy' , $producto -> id )}}" method="POST">
@csrf
@method("DELETE")
<button type="submit" class="btn btn-outline btn-xs">eliminar</button>

     </form>
    
    </div>
  </div>
</div>

@endforeach

</div>
@endsection