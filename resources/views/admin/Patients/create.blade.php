@extends('admin.main-layout')
    @section('HeadLink')
    <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">

    @endsection
    @section('title', $Patients->exists ? __('patient.UpdatePatient') : __('patient.CreerUnPatient'))

    @section('content')
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h4>@yield('title')</h4>
                          </div>
                          <div class="card-body">
                            <div id="accordion">
                              <div class="accordion">
                                <div class="accordion-header" style="border: 1px solid black;" role="button" data-toggle="collapse" data-target="#panel-body-1"
                                  aria-expanded="true">
                                  <h4>{{__('patient.titreQui')}}</h4>
                                </div>
                                <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <label name="name" >{{__('patient.titrePatient')}}</label>
                                                <select class="form-control form-control-sm" name="sexe">
                                                    <option value="">Non Attribué</option>
                                                    <option value="Mr.">M.</option>
                                                    <option value="Mrs.">Mme.</option>
                                                    <option value="Ms.">Mlle.</option>
                                                    <option value="Dr.">Dr</option>
                                                  </select>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
    
                                            <div class="form-group">
                                                <label name="name" >{{__('utilisateur.nom')}}</label>
                                                <input type="text" name="name"  placeholder="nom" id="name" class="form-control">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
            
                                            <div class="form-group">
                                                <label name="lastname">{{__('utilisateur.prenom')}}</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="lastname" id="lastname"> 
                                                @if ($errors->has('lastname'))
                                                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                    <label name="sexe" >{{__('utilisateur.sexe')}}</label>
                                                    <select class="form-control form-control-sm" name="sexe">
                                                        <option value="" selected>{{__('utilisateur.choisirSexe')}}</option>
                                                        <option value="masculin">{{__('utilisateur.masculin')}}</option>
                                                        <option value="feminin">{{__('utilisateur.feminin')}}</option>
                                                    </select>
                                                    @if ($errors->has('sexe'))
                                                        <span class="text-danger">{{ $errors->first('sexe') }}</span>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="dateNaissance">{{__('utilisateur.dateNaissance')}}</label>
                                                <input type="date" class="form-control"   placeholder="carte d'identite"
                                                        name="dateNaissance" id="dateNaissance">
                                                @if ($errors->has('dateNaissance'))
                                                    <span class="text-danger">{{ $errors->first('dateNaissance') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                          <div class="form-group">
                                              <label name="CNI">{{__('utilisateur.cni')}}</label>
                                              <input type="text" class="form-control"   placeholder="carte d'identite"
                                                  name="cni" id="cni"> 
                                              @if ($errors->has('cni'))
                                                  <span class="text-danger">{{ $errors->first('cni') }}</span>
                                              @endif
                                          </div>
                                          <div class="form-group">
                                            <label name="telephone">{{__('utilisateur.telephone')}}</label>
                                            <input type="tel" min="0" class="form-control"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="N_Tel"
                                                name="telephone" id="telephone"> 
                                            @if ($errors->has('telephone'))
                                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label name="telephone">Identité de genre :</label>
                                            <select class="form-control" name="IdentiteGenre" id="">
                                                <option value="">Non Attributé</option>
                                                <option value="446151000124109">S'identifie comme étant un homme</option>
                                                <option value="446141000124107">S'identifie comme étant une femme</option>
                                                <option value="407377005">Femme à homme (FTM)/Homme transgenre/Homme trans</option>
                                                <option value="407376001">Homme à femme (MTF)/Femme transgenre/Femme trans</option>
                                                <option value="ASKU">Choisit de ne pas divulguer</option>
                                            </select>
                                            @if ($errors->has('telephone'))
                                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label name="telephone">Orientation Sexuel:</label>
                                                <select name="" class="form-control" id="">
                                                    <option value="">Non Attributé</option><option value="20430005">Hétéro ou hétérosexuel</option>
                                                    <option value="38628009">Lesbiennes, gays ou homosexuels</option>
                                                    <option value="42035005">Bisexuel</option>
                                                    <option value="UNK">Ne sait pas</option>
                                                    <option value="ASKU">Choisissez de ne pas divulguer</option>
                                                </select>
                                            @if ($errors->has('telephone'))
                                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                              </div>
                              <div class="accordion">
                                <div class="accordion-header" style="border: 1px solid black;" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                  <h4>Contact</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                  
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="form-group">
                                                    <label name="adresse" >{{__('patient.adresse')}}</label>
                                                    <input type="text" name="adresse"  placeholder="Adresse" id="name" class="form-control">
                                                    @if ($errors->has('adresse'))
                                                        <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                                    @endif
                                                </div>
                
                                                <div class="form-group">
                                                    <label name="codePostal">{{__('patient.codePostal')}}</label>
                                                    <input type="text" class="form-control"   placeholder="Code postal"
                                                        name="codePostal" id="lastname"> 
                                                    @if ($errors->has('codePostal'))
                                                        <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label name="nomMere">{{__('patient.nomMere')}}</label>
                                                    <input type="text" class="form-control"   placeholder="nom de la mere"
                                                        name="nomMere" id="lastname"> 
                                                    @if ($errors->has('nomMere'))
                                                        <span class="text-danger">{{ $errors->first('nomMere') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label name="region" >{{__('patient.region')}}</label>
                                                    <select class="form-control" name="region">
                                                        <option value="Centre">Centre</option>
                                                        <option value="Littoral">Littoral</option>
                                                        <option value="Ouest">Ouest</option>
                                                        <option value="Est">Est</option>
                                                        <option value="Sud">Sud</option>
                                                        <option value="Nord">Nord</option>
                                                        <option value="Nord-Ouest">Nord-Ouest</option>
                                                        <option value="Sud-Ouest">Sud-Ouest</option>
                                                        <option value="Adamaoua">Adamaoua</option>
                                                        <option value="Extreme-nord">Extrême-Nord </option>
                                                    </select>
                                                    @if ($errors->has('region'))
                                                        <span class="text-danger">{{ $errors->first('region') }}</span>
                                                    @endif
                                                </div>
                                        </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="form-group">
                                                    <label name="TelephoneUrgence">{{__('patient.TelephoneUrgence')}}</label>
                                                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" class="form-control"   placeholder="Telephone d'urgence"
                                                        name="TelephoneUrgence" id="lastname"> 
                                                    @if ($errors->has('TelephoneUrgence'))
                                                        <span class="text-danger">{{ $errors->first('TelephoneUrgence') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label name="TelephoneProfessionel">{{__('patient.TelephoneProfessionel')}}</label>
                                                    <input type="tel" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"   placeholder="Prenom"
                                                        name="TelephoneProfessionel" id="lastname"> 
                                                    @if ($errors->has('TelephoneProfessionel'))
                                                        <span class="text-danger">{{ $errors->first('TelephoneProfessionel') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label name="emailDuContact">{{__('patient.emailDuContact')}}</label>
                                                    <input type="text" class="form-control"   placeholder="email@gmail.com"
                                                        name="emailDuContact" id="lastname"> 
                                                    @if ($errors->has('emailDuContact'))
                                                        <span class="text-danger">{{ $errors->first('emailDuContact') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                </div>
                                </div>
                              </div>
                              <div class="accordion">
                                <div class="accordion-header"  role="button" style="border: 1px solid black;" data-toggle="collapse" data-target="#panel-body-3">
                                  <h4>Choix</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Nom de L'employeur</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Nom de L'employeur</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="accordion">
                                <div class="accordion-header" role="button" style="border: 1px solid black;" data-toggle="collapse" data-target="#panel-body-4">
                                  <h4>{{__('patient.employeur')}}</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Nom de L'employeur</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Nom de L'employeur</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header" role="button" style="border: 1px solid black;" data-toggle="collapse" data-target="#panel-body-5">
                                  <h4>Stats</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-5" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Nom de L'employeur</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Nom de L'employeur</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header" role="button" style="border: 1px solid black;" data-toggle="collapse" data-target="#panel-body-6">
                                  <h4>{{__('patient.titreDivers')}}</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-6" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <label name="dateDeces" >{{__('patient.dateDeces')}}</label>
                                                <input type="date" name="dateDeces"   id="dateDeces" class="form-control">
                                                @if ($errors->has('dateDeces'))
                                                    <span class="text-danger">{{ $errors->first('dateDeces') }}</span>
                                                @endif
                                            </div>
            
                                            <div class="form-group">
                                                <label name="raisonDeces">{{__('patient.raisonDeces')}}</label>
                                                <input type="text" class="form-control"   placeholder="Raison du deces"
                                                    name="raisonDeces" id="lastname">
                                                @if ($errors->has('raisonDeces'))
                                                    <span class="text-danger">{{ $errors->first('raisonDeces') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                      
                                </div>
                              
                        </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header" style="border: 1px solid black;" role="button" data-toggle="collapse" data-target="#panel-body-7">
                                  <h4>{{__('patient.titregardien')}}</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-7" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomGuardian" >{{__('patient.nomGuardian')}}</label>
                                                <input type="text" placeholder="name" name="nomGuardian"   id="dateDeces" class="form-control">
                                                @if ($errors->has('nomGuardian'))
                                                    <span class="text-danger">{{ $errors->first('nomGuardian') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="lienParent" >{{__('patient.lienParent')}}</label>
                                                <select name="LienParent" class="form-control" id="">
                                                    <option value="frere">Frère</option>
                                                    <option value="soignant">Soignant</option>
                                                    <option value="enfant">Enfant</option>
                                                    <option value="personne handicapée">Personne handicapée à charge</option>
                                                    <option value="Partenaire de vie">Partenaire de vie</option>
                                                    <option value="Contact d'urgence ">Contact d'urgence</option>
                                                    <option value="employee">Employé(e)</option>
                                                    <option value="employeur">Employeur</option>
                                                    <option value="Famille étendue">Famille étendue</option>
                                                    <option value="Enfant adoptif">Enfant adoptif</option>
                                                    <option value="Ami">Ami</option>
                                                    <option value="Pere">Père</option>
                                                    <option value="Petit-enfant">Petit-enfant</option>
                                                    <option value="gardien">Gardien</option>
                                                    <option value="Grand-parent">Grand-parent</option>
                                                    <option value="gestionnaire">Gestionnaire</option>
                                                    <option value="mere">Mère</option>
                                                    <option value="Enfant naturel">Enfant naturel</option>
                                                    <option value="Aucun">Aucun(e)</option>
                                                    <option value="Autres Adulte">Autre adulte</option>
                                                    <option value="autres">Autre</option>
                                                    <option value="Propriétaire">Propriétaire</option>
                                                    <option value="parent">Parent</option>
                                                    <option value="Beau-enfant">Beau-enfant</option>
                                                    <option value="Auto">Auto</option>
                                                    <option value="Frère/sœur">Frère/sœur</option>
                                                    <option value="Sœur">Sœur</option>
                                                    <option value="Conjoint">Conjoint</option>
                                                    <option value="Formateur">Formateur</option>
                                                    <option value="Inconnu">Inconnu</option>
                                                    <option value="Quartier du tribunal">Quartier du tribunal</option>                                                        
                                                </select>
                                                @if ($errors->has('lienParent'))
                                                    <span class="text-danger">{{ $errors->first('lienParent') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="sexe">{{__('patient.sexe')}}</label>
                                                <select name="sexeParente" class="form-control" id="">
                                                    <option value="masculin">Masculin</option>
                                                    <option value="feminin">Feminin</option>
                                                    <option value="inconnu">Inconnu</option>
                                                </select>
                                                @if ($errors->has('sexe'))
                                                    <span class="text-danger">{{ $errors->first('sexe') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="adresse">{{__('patient.adresse')}}</label>
                                                <input type="text" class="form-control"   placeholder="Adresse"
                                                    name="AdresseLienParente" id="adresse" title="code">
                                                @if ($errors->has('AdresseLien'))
                                                    <span class="text-danger">{{ $errors->first('AdresseLien') }}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="codePostal">{{__('patient.TelephoneProfessionel')}}</label>
                                                <input type="tel" class="form-control"    pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="Telephone professionel"
                                                    name="TelephoneProfessionelLienParente" id="codePostal">
                                                @if ($errors->has('TelephoneProfessionelLienParente'))
                                                    <span class="text-danger">{{ $errors->first('TelephoneProfessionelLienParente') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">{{__('patient.Courriel')}}</label>
                                                <input type="text" class="form-control"    placeholder="Courriel"
                                                    name="CourrielLienParente" id="codePostal">
                                                @if ($errors->has('CourrielLienParente'))
                                                    <span class="text-danger">{{ $errors->first('CourrielLienParente') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="adresse">{{__('patient.ville')}}</label>
                                                <input type="text" class="form-control"   placeholder="ville"
                                                    name="villeLienParente" id="ville">
                                                @if ($errors->has('AdresseLien'))
                                                    <span class="text-danger">{{ $errors->first('AdresseLien') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">{{__('patient.codePostal')}}</label>
                                                <input type="text" class="form-control"   placeholder="code Postal"
                                                    name="codePostalLienParente" id="codePostal">
                                                @if ($errors->has('AdresseLien'))
                                                    <span class="text-danger">{{ $errors->first('AdresseLien') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header"  style="border: 1px solid black;" role="button" data-toggle="collapse" data-target="#panel-body-8">
                                  <h4>{{__('patient.assurance')}}</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-8" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Nom de L'employeur</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Nom de L'employeur</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">???</label>
                                                <input type="text" class="form-control"   placeholder="Prenom"
                                                    name="codePostal" id="lastname"> 
                                                @if ($errors->has('codePostal'))
                                                    <span class="text-danger">{{ $errors->first('codePostal') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion">
                                <button value="Enregistrer" style="width: 100%" class="btn btn-success m-t-15 waves-effect">save</button>                                </div>
                                
                            </div>
                            <div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                 
                </div>
        </section>
        
    @endsection

    @section('FootLink')

    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>

    @endsection