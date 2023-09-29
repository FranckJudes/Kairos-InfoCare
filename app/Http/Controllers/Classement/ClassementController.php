<?php

namespace App\Http\Controllers\Classement;

use App\Http\Controllers\Controller;
use App\Models\PlanClassement;
use Illuminate\Http\Request;

class ClassementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @ \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Classement.index',[
            'PlanClassement' => PlanClassement::where('type' , 'dossier')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entity = new PlanClassement();

        if ($request->input('parent_id')) {
            $parentId = $request->input('parent_id');

            if ($parentId < $entity->id) {
                throw new Exception('L\'entité parent ne peut pas être une entité enfant.');
            }

            $entity->libelle = $request->libelle;
            $entity->description = $request->description;
            $entity->type = $request->type;
            $entity->parent()->associate($request->input('parent_id'));
            $entity->save();
        } else {
            $entity->libelle = $request->libelle;
            $entity->description = $request->description;
            $entity->type = $request->type;
            $entity->save();
        }

       
        return view('admin.Classement.index',[
            'PlanClassement' => PlanClassement::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $treeData =  PlanClassement::find($id);
         return response()->json($treeData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            // Recherchez l'élément à mettre à jour
            $element = PlanClassement::findOrFail($id);
    
            // Mettez à jour les attributs avec les nouvelles valeurs
            $element->libelle = $request->input('libelle');
            $element->parent_id = $request->input('parent_id');
            $element->description = $request->input('description');
            $element->type = $request->input('type');
    
            // Enregistrez les modifications
            $element->save();
    
            return response()->json(['success' => true, 'message' => 'Élément mis à jour avec succès.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erreur lors de la mise à jour de l\'élément.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getEntites()
    {
        $customIcons = [
            'dossier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/folder.png'),
            'fichier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/2.png'),
        ];
        $entites = PlanClassement::all();

        $treeData = [];
        foreach ($entites as $entite) {
            if ($entite->type == 'dossier') {
   
                $treeData[] = [
                    'id'   => $entite->id,
                    'pId' => $entite->parent_id,
                    'name' => $entite->libelle,
                    'type' => $entite->type,
                    'icon'=> $customIcons['dossier']
                ];
            }else {
                $treeData[] = [
                    'id' => $entite->id,
                    'pId' => $entite->parent_id,
                    'name' => $entite->libelle,
                    'type' => $entite->type,
                    'icon'=> $customIcons['fichier']
                ];
            }
        }
    
            return response()->json(['treeData' => $treeData]);

    }

    public function delete($id)
    {
        $sup =  PlanClassement::find($id);

        $sup->delete();

        $entites = PlanClassement::all();

        $treeData = [];
        foreach ($entites as $entite) {
            $treeData[] = [
                'id' => $entite->id,
                'pId' => $entite->parent_id,
                'name' => $entite->libelle,
                'type' => $entite->type
            ];
        }
        return response()->json($treeData);
         
    }
}
