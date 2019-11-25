/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$localizaciones = Localizacion::find($id);

return view('localizacions/edit',['localizacion'=> $localizaciones]);
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$this->validate($request, [
'lugar' => 'required|max:255'
]);

$localizaciones = Localizacion::find($id);
$localizaciones->fill($request->all());

$localizaciones->save();

flash('Localizacion modificada correctamente');

return redirect()->route('localizacions.index');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$localizaciones = Localizacion::find($id);
$localizaciones->delete();
flash('Localizacion borrada correctamente');

return redirect()->route('localizacions.index');
}
}

