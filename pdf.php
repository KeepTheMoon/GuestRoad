<?php
require_once "mpdf/mpdf.php";
require_once "Modele/dao.php";
require_once "Modele/dossier.php";
/**
 * Fichier qui permet de générer un PDF
 */
/**
 * test
 */

        $mpdf=new mPDF('c');
        $dao=new dao();
        $dossiers = $dao->getListeSuiviDossier();

        $test='<table class="bpmTopicC">
                    <thead><tr>
                        <th>Nom</th>
                        <th>Prise de contact</th>
                        <th>Pré-étude</th>
                        <th>RDV</th>
                        <th>ARC</th>
                        <th>Envoi mandat</th>
                        <th>DDP</th>
                        <th>Relance banque</th>
                        <th>RDV banque</th>
                        <th>Attente édition</th>
                        <th>Facture</th>
                        <th>Clos</th>
                </tr></thead>
                    <tbody>';
        
        foreach ($dossiers as $dossier){
            $nom = $dossier->getNom()." ".$dossier->getPrenom();
            $etat = $dossier->getEtat()->getId();
            $part = $dossier->getPart();
            $test = $test.ligneTableau($nom, $etat, $part);
        }
        $test= $test."</tbody></table>";
        
        $mpdf=new mPDF('c','A4','','',32,25,27,25,16,13);
        
        $mpdf->SetDisplayMode('fullpage');
        
        $mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
        
        // LOAD a stylesheet
        $stylesheet = file_get_contents('mpdfstyletables.css');
        $mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
        
        $mpdf->WriteHTML($test,2);
        
        $mpdf->Output('mpdf.pdf','I');
        exit;
        /**
         * Pour chaque ligne du tableau
         * @param string $nom
         * @param etat $etat
         * @param integer $part
         * @return string
         */
    function ligneTableau($nom, $etat, $part){
        $html="<tr class='oddrow'>
            <td id='".$nom."'>".$nom."</td>";
            if($etat=='1'){$html= $html."<td class='Prisedecontact'>".$part."€</td>";}else{$html= $html."<td class='Prisedecontact'></td>";}
            if($etat=='2'){$html= $html."<td class='Préétude'>".$part."€</td>";}else{$html= $html."<td class='Préétude'></td>";}
            if($etat=='3'){$html= $html."<td class='RDV'>".$part."€</td>";}else{$html= $html."<td class='RDV'></td>";}
            if($etat=='4'){$html= $html."<td class='ARC'>".$part."€</td>";}else{$html= $html."<td class='ARC'></td>";}
            if($etat=='5'){$html= $html."<td class='Envoimandat'>".$part."€</td>";}else{$html= $html."<td class='Envoimandat'></td>";}
            if($etat=='6'){$html= $html."<td class='DDP'>".$part."€</td>";}else{$html= $html."<td class='DDP'></td>";}
            if($etat=='7'){$html= $html."<td class='Relancebanque'>".$part."€</td>";}else{$html= $html."<td class='Relancebanque'></td>";}
            if($etat=='8'){$html= $html."<td class='RDVbanque'>".$part."€</td>";}else{$html= $html."<td class='RDVbanque'></td>";}
            if($etat=='9'){$html= $html."<td class='Attenteédition'>".$part."€</td>";}else{$html= $html."<td class='Attenteédition'></td>";}
            if($etat=='10'){$html= $html."<td class='Facture'>".$part."€</td>";}else{$html= $html."<td class='Facture'></td>";}
            if($etat=='11'){$html= $html."<td class='Clos'>".$part."€</td>";}else{$html= $html."<td class='Clot'></td>";}
            $html= $html. "</tr>";
        return $html;
    }