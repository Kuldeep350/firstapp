<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemDetails;
use Illuminate\Http\Request;

class UploadController extends Controller

{

public function uploadForm()

{

return view('upload_form');

}

public function uploadSubmit(Request $request)

{

$this->validate($request, [

'name' => 'required',

'photos'=>'required',

]);

if($request->hasFile('photos'))

{

$allowedfileExtension=['pdf','jpg','png','docx'];

$files = $request->file('photos');

foreach($files as $file){

$filename = $file->getClientOriginalName();

$extension = $file->getClientOriginalExtension();

$check=in_array($extension,$allowedfileExtension);

//dd($check);

if($check)

{

$items= Item::create($request->all());

foreach ($request->photos as $photo) {

$filename
 = $photo->store('storage/photos');

ItemDetailS::create([

'item_id' => $items->id,

'filename' => $filename

]);

}

echo "Upload Successfully";

}

else

{

echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';

}

}

}

}

}?>