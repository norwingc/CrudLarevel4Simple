<?php

class ProductosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$productos = Producto::all();
        return View::make('productos.index')->with('productos', $productos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('productos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	//si es una peticion post
		if(Input::get()){
			$inputs = $this->getInputs(Input::all());
			if($this->validateForms($inputs) === true){
				$producto = new Producto($inputs);				
				if($producto->save()){
					Session::flash('message', 'Producto Agregado Correctamente');
					return Redirect::to('productos');
				}	
			}else{
				return Redirect::to('productos/create')->withErrors($this->validateForms($inputs))->withInput();	
			}		
		}else{//cuando es peticion get
			return View::make('productos.create');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$producto = Producto::find($id);
        return View::make('productos.show')->with('producto', $producto);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$producto = Producto::find($id);
        return View::make('productos.edit')->with('producto', $producto);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$producto  = Producto::find($id);

		if(Input::get()){//si es metodo post			
			if($producto){//si existe
				$inputs = $this->getInputs(Input::all());

				if($this->validateForms($inputs) === true){
					$producto->nombre = Input::get('nombre');
					$producto->descripcion = Input::get('descripcion');
					$producto->stock = Input::get('stock');
					$producto->precio = Input::get('precio');

					if($producto->save()){
						Session::flash('message', 'Producto Modificado Correctamente');
						return Redirect::to('productos');
					}
				}else{
					return Redirect::to('productos/'. $id .'/edit')->withErrors($this->validateForms($inputs))->withInput();
				}
			}else{
				return View::make('productos');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$producto = Producto::find($id);
		$producto->delete();

		Session::flash('message', 'Producto Borrado Correctamente :(');
		return Redirect::to('productos');

	}


	private function validateForms($inputs = array()){
		$rules = array(
			'nombre' => 'required',
			'descripcion' => 'required',
			'stock' => 'required|numeric',
			'precio' => 'required|numeric'
			);
		$messages = array(
			 'required'  => 'El campo :attribute es obligatorio.',
			 'numeric' => 'El campo :attribute solo acepta numeros.'
			);

		$validation = Validator::make($inputs, $rules, $messages);

		if($validation->fails()){
			return $validation;
		}else{
			return true;
		}
	}

	private function getInputs($inputs = array()){
		foreach ($inputs as $key => $value) {
			$inputs[$key] = $value;
		}
		return $inputs;
	}

}
