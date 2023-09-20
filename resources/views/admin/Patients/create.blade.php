@extends('admin.main-layout')
    @section('HeadLink')
    <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">

    @endsection
 
@section('title', $patients->exists ?  __('patient.UpdatePatient') : __('patient.CreerUnPatient'))

    @section('content')
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h4>@yield('title')</h4>
                            <div class="card-header-action">
                                <a href="{{url()->previous()}}" class="btn btn-success">
                                 <i class="fas fa-arrow-circle-left"></i> {{__('main.retour')}}</a>
                              </div>    
                          </div>
                          <div class="card-body">
                        <form action="{{ route('patient.store')}}" method="POST">
                            @csrf
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
                                                <select class="form-control form-control-sm" name="titrePatient">
                                                    <option value="Non Attribué">Non Attribué</option>
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
                                                <input type="text" name="name" value="{{old('name')}}"  placeholder="nom" id="name" class="form-control">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
            
                                            <div class="form-group">
                                                <label name="lastname">{{__('utilisateur.prenom')}}</label>
                                                <input type="text" class="form-control"  value="{{old('lastname')}}" placeholder="Prenom"
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
                                                <input type="date" class="form-control"  value="{{old('dateNaissance')}}" placeholder="carte d'identite"
                                                        name="dateNaissance" id="dateNaissance">
                                                @if ($errors->has('dateNaissance'))
                                                    <span class="text-danger">{{ $errors->first('dateNaissance') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                          <div class="form-group">
                                              <label name="CNI">{{__('utilisateur.cni')}}</label>
                                              <input type="text" class="form-control"  value="{{old('cni')}}" placeholder="carte d'identite"
                                                  name="cni" id="cni"> 
                                              @if ($errors->has('cni'))
                                                  <span class="text-danger">{{ $errors->first('cni') }}</span>
                                              @endif
                                          </div>
                                          <div class="form-group">
                                                <label name="telephone">{{__('utilisateur.telephone')}}</label>
                                                <input type="tel" min="0" class="form-control" value="{{old('numeroTelephone')}}" pattern="^\+(?:[0-9] ?){6,14}[0-9]$" placeholder="N_Tel"
                                                    name="numeroTelephone" id="telephone"> 
                                                @if ($errors->has('numeroTelephone'))
                                                    <span class="text-danger">{{ $errors->first('numeroTelephone') }}</span>
                                                @endif
                                            </div>
                                        <div class="form-group">
                                            <label name="telephone">Identité de genre :</label>
                                            <select class="form-control" name="IdentiteGenre" id="">
                                                <option value="Non Attributé">Non Attributé</option>
                                                <option value="S'identifie comme étant un homme">S'identifie comme étant un homme</option>
                                                <option value="S'identifie comme étant une femme">S'identifie comme étant une femme</option>
                                                <option value="Femme à homme (FTM)/Homme transgenre/Homme trans">Femme à homme (FTM)/Homme transgenre/Homme trans</option>
                                                <option value="Homme à femme (MTF)/Femme transgenre/Femme trans">Homme à femme (MTF)/Femme transgenre/Femme trans</option>
                                                <option value="Choisit de ne pas divulguer">Choisit de ne pas divulguer</option>
                                            </select>
                                            @if ($errors->has('IdentiteGenre'))
                                                <span class="text-danger">{{ $errors->first('IdentiteGenre') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label name="telephone">Orientation Sexuel:</label>
                                                <select name="OrientationSexuel" class="form-control" id="">
                                                    <option value="">Non Attributé</option><option value="20430005">Hétéro ou hétérosexuel</option>
                                                    <option value="Lesbiennes, gays ou homosexuels">Lesbiennes, gays ou homosexuels</option>
                                                    <option value="Bisexuel">Bisexuel</option>
                                                    <option value="Ne sait pas">Ne sait pas</option>
                                                    <option value="Choisissez de ne pas divulguer">Choisissez de ne pas divulguer</option>
                                                </select>
                                            @if ($errors->has('OrientationSexuel'))
                                                <span class="text-danger">{{ $errors->first('OrientationSexuel') }}</span>
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
                                                        <option value="null">Chosir la Region du Patient</option>
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
                                                    <input type="tel" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"   placeholder="Telehone Professionel"
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
                                                <div class="form-group">
                                                    <label name="telephone">Quartier du patient</label>
                                                    <input type="text" class="form-control" placeholder="Quartier du patient"
                                                        name="quartier" id="telephone"> 
                                                    @if ($errors->has('quartier'))
                                                        <span class="text-danger">{{ $errors->first('quartier') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>
                              </div>
                              <div class="accordion">
                                <div class="accordion-header"  style="border: 1px solid black;" role="button" data-toggle="collapse" data-target="#panel-body-9">
                                  <h4>{{__('patient.InformationMedical')}}</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-9" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="AntecedentMedicaux">{{__('patient.AntecedentMedicaux')}}</label>
                                                <input type="text" class="form-control"   placeholder="Antecedent medical"
                                                    name="AntecedentMedicaux" id="lastname"> 
                                                @if ($errors->has('AntecedentMedicaux'))
                                                    <span class="text-danger">{{ $errors->first('AntecedentMedicaux') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="allergie">{{__('patient.allergie')}}</label>
                                                <input type="text" class="form-control"   placeholder="details Assurance"
                                                    name="allergie" id="lastname"> 
                                                @if ($errors->has('allergie'))
                                                    <span class="text-danger">{{ $errors->first('allergie') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="chirugieAnterieurs">{{__('patient.chirugieAnterieurs')}}</label>
                                                <input type="text" class="form-control"   placeholder="details Assurance"
                                                    name="chirugieAnterieurs" id="lastname"> 
                                                @if ($errors->has('allergie'))
                                                    <span class="text-danger">{{ $errors->first('chirugieAnterieurs') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="MedicamentsActuel">{{__('patient.MedicamentsActuel')}}</label>
                                                <input type="text" name="MedicamentsActuel"  id="name" class="form-control">
                                                @if ($errors->has('MedicamentsActuel'))
                                                    <span class="text-danger">{{ $errors->first('MedicamentsActuel') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="ProblemeSante">{{__('patient.ProblemeSante')}}</label>
                                                <input type="text" class="form-control"   placeholder="Coordonnee Assurance"
                                                    name="ProblemeSante" id="lastname"> 
                                                @if ($errors->has('ProblemeSante'))
                                                    <span class="text-danger">{{ $errors->first('ProblemeSante') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="HistoriqueVaccination">{{__('patient.HistoriqueVaccination')}}</label>
                                                <input type="text" name="HistoriqueVaccination"  id="name" class="form-control">
                                                @if ($errors->has('HistoriqueVaccination'))
                                                    <span class="text-danger">{{ $errors->first('HistoriqueVaccination') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="resultatTestMedicaux">{{__('patient.resultatTestMedicaux')}}</label>
                                                <input type="text" class="form-control"   placeholder="Coordonnee Assurance"
                                                    name="resultatTestMedicaux" id="lastname"> 
                                                @if ($errors->has('resultatTestMedicaux'))
                                                    <span class="text-danger">{{ $errors->first('resultatTestMedicaux') }}</span>
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
                                                <label name="contactEmployeur">Contact de L'employeur</label>
                                                <input type="text" class="form-control"   placeholder="Prenom" name="contactEmployeur" id="lastname"> 
                                                @if ($errors->has('contactEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('contactEmployeur') }}</span>
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
                                                <label name="AdresseEmployeur">Adresse de L'employeur</label>
                                                <input type="text" class="form-control"   placeholder="Adresse employeur" name="AdresseEmployeur" id="lastname"> 
                                                @if ($errors->has('AdresseEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('AdresseEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="ProfessionEmployeur">Profession</label>
                                                <input type="text" class="form-control"   placeholder="Votre Profession"
                                                    name="ProfessionEmployeur" id="lastname"> 
                                                @if ($errors->has('ProfessionEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('ProfessionEmployeur') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="VilleEmployeur">Ville</label>
                                                <input type="text" name="VilleEmployeur"  placeholder="Ville de L'employeur" id="name" class="form-control">
                                                @if ($errors->has('VilleEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('VilleEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="PaysEmployeur">Pays</label>
                                                <input type="text" class="form-control"   placeholder="Pays Employeur"
                                                    name="PaysEmployeur" id="lastname"> 
                                                @if ($errors->has('PaysEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('PaysEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">Code Postal</label>
                                                <input type="text" class="form-control"   placeholder="code Postal"
                                                    name="codePostalEmployeur" id="lastname"> 
                                                @if ($errors->has('codePostalEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('codePostalEmployeur') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header" role="button" style="border: 1px solid black;" data-toggle="collapse" data-target="#panel-body-5">
                                  <h4>Statistiques</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-5" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="LangueStat" >Langue</label>
                                                <select name="LangueStat" class="form-control" id="">
                                                    <option value="null">Choisit un element</option>
                                                    <option value="francais">Francais</option>
                                                    <option value="Anglais">Anglais</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label name="nomEmployeur">Origine Ethnique</label>
                                                <input type="text" name="OrigineEthnique"  placeholder="Entrez L'origine" id="name" class="form-control">
                                                @if ($errors->has('OrigineEthnique'))
                                                    <span class="text-danger">{{ $errors->first('OrigineEthnique') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">Taille de Famille</label>
                                                <input type="text" class="form-control"   placeholder="taille famille"
                                                    name="TailleFamille" id="lastname"> 
                                                @if ($errors->has('TailleFamille'))
                                                    <span class="text-danger">{{ $errors->first('TailleFamille') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">Source de Reference</label>
                                                <input type="text" class="form-control"   placeholder="Source reference"
                                                    name="SourceReference" id="lastname"> 
                                                @if ($errors->has('SourceReference'))
                                                    <span class="text-danger">{{ $errors->first('SourceReference') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">Religion</label>
                                                <select name="Religion" class="form-control" id="">
                                                    <option value="null">Choisit un element</option>
                                                    <option value="Christianisme">Christianisme</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Bouddhisme">Bouddhisme</option>
                                                    <option value="Sikhisme">Sikhisme</option>
                                                    <option value="Bahaïsme">Bahaïsme</option>
                                                    <option value="autres">autres</option>
                                                </select>
                                                @if ($errors->has('Religion'))
                                                    <span class="text-danger">{{ $errors->first('Religion') }}</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label name="nomEmployeur">Course</label>
                                                <input type="text" name="CourseStatistique"  placeholder="No" id="name" class="form-control">
                                                @if ($errors->has('CourseStatistique'))
                                                    <span class="text-danger">{{ $errors->first('CourseStatistique') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">Date de l'examen financier :</label>
                                                <input type="date" class="form-control"   placeholder="Prenom"
                                                    name="dateFinancier" id="lastname"> 
                                                @if ($errors->has('dateFinancier'))
                                                    <span class="text-danger">{{ $errors->first('dateFinancier') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">
                                                    Sans-abri, etc. :</label>
                                                    <select name="SansAbri" class="form-control" id="">
                                                        <option value="null">Choisit un element</option>
                                                        <option value="oui">oui</option>
                                                        <option value="non">non</option>
                                                    </select>
                                                @if ($errors->has('SansAbri'))
                                                    <span class="text-danger">{{ $errors->first('SansAbri') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">
                                                    Migrant/Saisonnier :
                                                </label>
                                                    <select name="SansAbri" class="form-control" id="">
                                                        <option value="null">Choisit un element</option>
                                                        <option value="oui">oui</option>
                                                        <option value="non">non</option>
                                                    </select>
                                                @if ($errors->has('SansAbri'))
                                                    <span class="text-danger">{{ $errors->first('SansAbri') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="codePostal">
                                                   VFC :
                                                </label>
                                                    <select name="SansAbri" class="form-control" id="">
                                                        <option value="Non attribue">Non attribue</option>
                                                        <option value="Admissible">Admissible</option>
                                                        <option value="ineligible">ineligible</option>
                                                    </select>
                                                @if ($errors->has('SansAbri'))
                                                    <span class="text-danger">{{ $errors->first('SansAbri') }}</span>
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
                                                    <option value="null">Choisit un element</option>
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
                                                    <option value="null">Inconnu</option>
                                                    <option value="masculin">Masculin</option>
                                                    <option value="feminin">Feminin</option>
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
                                                <input type="tel" class="form-control"    pattern="^(6\d|2\d)\s\d{2}\s\d{2}\s\d{2}$" placeholder="Telephone professionel"
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
                                                <label name="nomEmployeur">Fournisseur d’assurance principal</label>
                                                <input type="text" name="nomEmployeur"  placeholder="Nom de l'assurance" id="name" class="form-control">
                                                @if ($errors->has('nomEmployeur'))
                                                    <span class="text-danger">{{ $errors->first('nomEmployeur') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="numeroPoliceAssurance">{{__('patient.numeroPoliceAssurance')}}</label>
                                                <input type="text" class="form-control"   placeholder="Numero Police Assurance"
                                                    name="numeroPoliceAssurance" id="lastname"> 
                                                @if ($errors->has('numeroPoliceAssurance'))
                                                    <span class="text-danger">{{ $errors->first('numeroPoliceAssurance') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="detailAssuranceMedicale">{{__('patient.detailAssuranceMedicale')}}</label>
                                                <input type="text" class="form-control"   placeholder="details Assurance"
                                                    name="detailAssuranceMedicale" id="lastname"> 
                                                @if ($errors->has('detailAssuranceMedicale'))
                                                    <span class="text-danger">{{ $errors->first('detailAssuranceMedicale') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="PaysAssurance">pays</label>
                                                <input type="text" class="form-control"   placeholder="Pays Assurance"
                                                    name="PaysAssurance" id="lastname"> 
                                                @if ($errors->has('PaysAssurance'))
                                                    <span class="text-danger">{{ $errors->first('PaysAssurance') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="PaysAssurance">Code Postal</label>
                                                <input type="text" class="form-control"   placeholder="code postal Assurance"
                                                    name="codePostalAssurance" id="lastname"> 
                                                @if ($errors->has('codePostalAssurance'))
                                                    <span class="text-danger">{{ $errors->first('codePostalAssurance') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="PaysAssurance">Numero de groupe</label>
                                                <input type="text" class="form-control"   placeholder="Numero groupe Assurance"
                                                    name="numeroGroupeAssurance" id="lastname"> 
                                                @if ($errors->has('numeroGroupeAssurance'))
                                                    <span class="text-danger">{{ $errors->first('numeroGroupeAssurance') }}</span>
                                                @endif
                                            </div>
                                          
                                            <div class="form-group">
                                                <label name="dateExpirationAssurance">{{__('patient.dateExpirationAssurance')}}</label>
                                                <input type="date" name="dateExpirationAssurance"  id="name" class="form-control">
                                                @if ($errors->has('dateExpirationAssurance'))
                                                    <span class="text-danger">{{ $errors->first('dateExpirationAssurance') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            
                                            <div class="form-group">
                                                <label name="coordonneAssurance">{{__('patient.coordonneAssurance')}}</label>
                                                <input type="text" class="form-control"   placeholder="Coordonnee Assurance"
                                                    name="coordonneAssurance" id="lastname"> 
                                                @if ($errors->has('coordonneAssurance'))
                                                    <span class="text-danger">{{ $errors->first('coordonneAssurance') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="PaysAssurance">Abonnes : </label>
                                                <input type="text" class="form-control"   placeholder="Nom de l'abonne"
                                                    name="AbonneAssurance" id="lastname"> 
                                                @if ($errors->has('AbonneAssurance'))
                                                    <span class="text-danger">{{ $errors->first('AbonneAssurance') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="PaysAssurance"> Adresse abonne</label>
                                                <input type="text" class="form-control"   placeholder="Adresse de l'abonne "
                                                    name="AdresseAbonne" id="lastname"> 
                                                @if ($errors->has('AdresseAbonne'))
                                                    <span class="text-danger">{{ $errors->first('AdresseAbonne') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label name="PaysAssurance">date de naissance</label>
                                                <input type="date" class="form-control"   
                                                    name="dateNaissanceAbonnee" id="lastname"> 
                                                @if ($errors->has('dateNaissanceAbonnee'))
                                                    <span class="text-danger">{{ $errors->first('dateNaissanceAbonnee') }}</span>
                                                @endif
                                            </div>
                                        
                                            <div class="form-group">
                                                <label name="PaysAssurance">Relation</label>
                                                <select name="RelationAbonne" class="form-control" id="">
                                                    <option value="null">Choisit un element</option>
                                                    <option value="soi">Soi</option>
                                                    <option value="conjoint">Conjoint</option>
                                                    <option value="enfant">Enfant</option>
                                                    <option value="autres">Autres</option>
                                                </select>                                                   
                                                @if ($errors->has('AbonneAssurance'))
                                                    <span class="text-danger">{{ $errors->first('AbonneAssurance') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label name="coordonneAssurance">Sexe Abonne</label>
                                                <select name="RelationAbonne" class="form-control" id="">
                                                    <option value="null">Choisit un element</option>
                                                    <option value="masculin">masculin</option>
                                                    <option value="feminin">feminin</option>
                                                </select> 
                                                @if ($errors->has('coordonneAssurance'))
                                                    <span class="text-danger">{{ $errors->first('coordonneAssurance') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label name="PaysAssurance">Code Postal Abonne</label>
                                                <input type="text" class="form-control"   placeholder="code postal Assurance"
                                                    name="codePostalAssurance" id="lastname"> 
                                                @if ($errors->has('codePostalAssurance'))
                                                    <span class="text-danger">{{ $errors->first('codePostalAssurance') }}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                         
                            <div class="accordion">
                                <input type="submit" value="{{__('utilisateur.enregister')}}" style="width: 100%" class="btn btn-success m-t-15 waves-effect">   
                            </div>
                            </div>
                            <div>
                            </div>
                          </div>
                        </form>
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