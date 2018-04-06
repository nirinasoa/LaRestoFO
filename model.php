<?php
function prixpromo($prix,$pourcentage){
	$reponse=$prix-($prix*$pourcentage/100);
	return $reponse;
	
	
}
	///// PARTIE FIND	///////////////////////////////////////////////////////////////////////////////////////////////////////
	function find_table($nomtable,$condition,$connexion){
		$requete_prepare_1=$connexion->query("SELECT * FROM ".$nomtable." ".$condition.""); // on prépare notre requête
		$requete_prepare_1->setFetchMode(PDO::FETCH_OBJ);
		$tableau=array();
		while($lignes=$requete_prepare_1->fetch()){
			$tableau[]=$lignes;
		}
		return $tableau;
	}
	//Find_produitsvendus
		function find_produitsvendus($condition,$connexion){
		$requete_prepare_1=$connexion->query("select p.id as idp,a.idGenre,a.id,a.nombre,a.image,a.titre,p.nombres,a.prix,a.prix*p.nombres as total from produitsvendus p join utilisateur u on u.id=p.idutilisateur join article a on a.id=p.idproduits where  p.idutilisateur=".$condition.""); // on prépare notre requête
		$requete_prepare_1->setFetchMode(PDO::FETCH_OBJ);
		$tableau=array();
		while($lignes=$requete_prepare_1->fetch()){
			$tableau[]=$lignes;
		}
		return $tableau;
	}
	
		//Find_TOTALproduitsvendus
		function find_totalProduitsvendus($condition,$connexion){
		$requete_prepare_1=$connexion->query("select sum(a.prix*p.nombres) as total,sum(p.nombres) as qte,sum(a.prix) as prix from produitsvendus p join utilisateur u on u.id=p.idutilisateur join article a on a.id=p.idproduits where  p.idutilisateur=".$condition.""); // on prépare notre requête
		$requete_prepare_1->setFetchMode(PDO::FETCH_OBJ);
		$tableau=array();
		while($lignes=$requete_prepare_1->fetch()){
			$tableau[]=$lignes;
		}
		return $tableau;
	}
	///// PARTIE DELETE	///////////////////////////////////////////////////////////////////////////////////////////////////////
	function delete_valeur($nomtable,$id,$connexion){
		$requete_prepare_1=$connexion->query("delete FROM ".$nomtable." where id=".$id.""); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	function splitter($description){
	
		
		$newphrase =  str_replace(array(" ", "'", '"'), "-", $description);
		return $newphrase;
	}

	
	
	
	///// PARTIE UPDATE	///////////////////////////////////////////////////////////////////////////////////////////////////////
	//Update valeurs en string
	function update_valeurlettre($nomtable,$nomcolonne,$nouvellevaleur,$id,$connexion){
		$requete_prepare_1=$connexion->query("Update ".$nomtable." set ".$nomcolonne."='".$nouvellevaleur."' where id=".$id.""); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	//Update valeurs en int 
	function update_valeurchiffre($nomtable,$nomcolonne,$nouvellevaleur,$id,$connexion){
		$requete_prepare_1=$connexion->query("Update ".$nomtable." set ".$nomcolonne."=".$nouvellevaleur." where id=".$id.""); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	

	/////// TABLE genre ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_genre($types,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into genre(types) values('".$types."')"); // on prépare notre requête
		$requete_prepare_1->execute();
	}

	
	/////// TABLE typeArticle ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_typearticle($types,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into typeArticle(types) values('".$types."')"); // on prépare notre requête
		$requete_prepare_1->execute();
	}

	
	/////// TABLE marque ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_marque($nomMarque,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into marque(nomMarque) values('".$nomMarque."')"); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	
	
	/////// TABLE article ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_article($idGenre,$idTypeArticle,$idMarque,$prix,$description,$image,$promotion,$nouveau,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into article(idGenre,idTypeArticle,idMarque,prix,description,image,promotion,nouveau) values(".$idGenre.",".$idTypeArticle.",".$idMarque.",".$prix.",'".$description."','".$image."',".$promotion.",".$nouveau.")"); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	
	//Prendre un id
	function find_idarticle($titre,$connexion){
		$requete_prepare_1=$connexion->query("SELECT id n FROM article WHERE titre='".$titre."'"); // on prépare notre requête
		$ligne=$requete_prepare_1->fetch();
		$nombre=$ligne['n'];
		return $nombre;	
	}
	
	/////// TABLE utilisateur ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_Utilsateur($nom,$email,$motdepasse,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->exec("Insert into utilisateur(nom,adresseEmail,motdepasse) values('".$nom."','".$email."',sha1('".$motdepasse."'))"); // on prépare notre requête
	
	}
	function insert_contact($expediteur,$destinateur,$objet,$message,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->exec("Insert into contact(expediteur,destinateur,objet,email) values('".$expediteur."','".$destinateur."','".$objet."','".$email."')");// on prépare notre requête
	
	}
	
	// Verification si l'utilisateur est dans la liste des utilisateurs 
	function verification_utilisateur($login, $password, $connexion){
		$requete_prepare_1=$connexion->query("SELECT * FROM utilisateur WHERE nom='".$login."' and motdepasse=sha1('".$password."')"); // on prépare notre requête
		$requete_prepare_1->setFetchMode(PDO::FETCH_OBJ);
		$tableau=array();
		while($lignes=$requete_prepare_1->fetch()){
			$tableau[]=$lignes;
		}
		return $tableau;
	}
	
	
	
	/////// TABLE imageContenus ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_imageContenus($description,$titre,$image,$idmenus,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into imageContenus(description,titre,image,idmenus)  values('".$description."','".$titre."','".$image."',".$idmenus.")"); // on prépare notre requête
	
	}
	function insert_paragrapheContenus($paragraphe,$idmenus,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into paragrapheContenus(paragraphe,idmenus)  values('".$paragraphe."',".$idmenus.")"); // on prépare notre requête
	   
	}
	

	function supprimer_doublonsArticle($connexion){
		$requete_prepare_1=$connexion->query("DELEtE  produitsvendus from produitsvendus LEFt OUtER JOIN (SELECt MIN(id) as id, idproduits, nombres, idutilisateur FROM produitsvendus GROUP BY idproduits, nombres, idutilisateur ) as produitsvendus1  ON produitsvendus.id = produitsvendus1.id WHERE produitsvendus1.id IS NULL"); // on prépare notre requête
		$requete_prepare_1->execute();
	}

	
	
	function insert_panier($idUtilisateur,$idArticle,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into Panier(idUtilisateur,idArticle,daty) values(".$idUtilisateur.",".$idArticle.",now())"); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	
	/////// TABLE Facture ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_facture($idutilisateur,$prixtotal,$modepaiement,$numerodecompte,$lieu,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->exec("Insert into facture(idutilisateur,prixtotal,modepaiement,numerodecompte,lieu,daty) values(".$idutilisateur.",".$prixtotal.",".$modepaiement.",'".$numerodecompte."','".$lieu."',now())"); // on prépare notre requête
	
	}
	
	
	/////// TABLE Vente ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_vente($idUtilisateur,$idarticle,$prixarticle,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into vente(idUtilisateur,idarticle,prixarticle,daty) values(".$idUtilisateur.",".$idarticle.",".$prixarticle.",now())"); // on prépare notre requête
		$requete_prepare_1->execute();
	}	
?>