<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    


	public function liste_etudiant()
	{
		$etudiants = Etudiant::all();
		return view('Etudiant.liste', compact('etudiants'));
	}






	public function ajouter_etudiant()
	{
		return view('Etudiant.add');
	}
	public function ajouter_etudiant_traitement(Request $request)
	{
		$request->validate([
			'nom' => 'required',
			'prenom' => 'required',
			'classe' => 'required',
		]);

		$etudiant = new Etudiant();

		$etudiant->nom = $request->nom;
		$etudiant->prenom = $request->prenom;
		$etudiant->classe = $request->classe;

		$etudiant->save();

		return redirect('/ajouter')->with('status', 'Add Etudiant with success');
	}







	public function update_etudiant($id)
	{
		$etudiant = Etudiant::find($id);
		return view('Etudiant.update', compact('etudiant'));
	}


	public function update_etudiant_traitement(Request $request)
	{
		$request->validate([
			'nom' => 'required',
			'prenom' => 'required',
			'classe' => 'required',
		]);

		$etudiant = Etudiant::find($request->id);

		$etudiant->nom = $request->nom;
		$etudiant->prenom = $request->prenom;
		$etudiant->classe = $request->classe;

		$etudiant->update();

		return redirect('/etudiant')->with('status', 'Modification Etudiant with success');
	}





public function sup_etudiant($id)
	{
		$etudiant = Etudiant::find($id);

		$etudiant->delete();

		return redirect('/etudiant')->with('status', 'Delete Etudiant with success');
	}




}
