<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class MainController extends Controller {
	public function storeItem(Request $request) {
		$data = new Data ();
		$data->name = $request->name;
		$data->age = $request->age;
		$data->profession = $request->profession;
		$data->cpf = $request->cpf;
		$data->nac = $request->nac;
		$data->email = $request->email;
		$data->fone = $request->fone;
		$data->cep = $request->cep;
		$data->end = $request->end;
		$data->cidade = $request->cidade;
		$data->estado = $request->estado;
		$data->save ();
		return $data;
	}
	public function readItems() {
		$data = Data::all ();
		return $data;
	}
	public function deleteItem(Request $request) {
		$data = Data::find ( $request->id )->delete ();
	}
	public function editItem(Request $request, $id){
		$data =Data::where('id', $id)->first();
		$data->name = $request->get('val_1');
		$data->age = $request->get('val_2');
		$data->profession = $request->get('val_3');
		$data->cpf = $request->get('val_4');
		$data->nac = $request->get('val_5');
		$data->email = $request->get('val_6');
		$data->fone = $request->get('val_7');
		$data->cep = $request->get('val_8');
		$data->end = $request->get('val_9');
		$data->cidade = $request->get('val_10');
		$data->estado = $request->get('val_11');
		$data->save();
		return $data;
	}
}