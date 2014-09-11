<?php

class MyBDDSessionHandler implements SessionHandlerInterface
{
    public function open($savePath, $sessionName)
    {
    	//initialisation du gestionnaire de sessions
        return true;
    }

    public function close()
    {
    	//fermeture / destruction du gestionnaire de sessions
        return true;
    }

    public function read($session_id)
    {
    	//recuperation des donnes de session
	    $sql = "SELECT session_data FROM sessions
	            WHERE session_id = '".$session_id."'";
	    $data = myFetchAssoc($sql);
	         
	    if(empty($data))
	    	return FALSE;
	    else
	    	return $data['session_data'];
	}

    public function write($session_id, $data)
    {
        $expire = intval(time() + 7200);//calcul de l'expiration de la session (ici par exemple, deux heures).
	    $data = myEscape($data);//prtotection des données pour injection en BDD
	         
	    $sql = "SELECT COUNT(session_id) AS total
	        FROM sessions
	        WHERE session_id = '".$session_id."'";
	    
	    $return = myFetchAssoc($sql);
	    if($return['total'] == 0)//si la session n'existe pas encore
	    {
	    	//alors on la crée
	        $sql = "INSERT INTO sessions
	            VALUES('$session_id','$expire','$data')";
	    }
	    else//sinon on la met a jour
	    {
	        $sql = "UPDATE sessions
	            SET session_expire = '".$expire."',
	            session_data = '".$data."'
	            WHERE session_id = '".$session_id."'";

	    }      
	    $query = myQuery($sql);
	    
	    return $query;
    }

    public function destroy($session_id)
    {
    	//on supprime la session de la bdd
        $sql = "DELETE FROM sessions
	        WHERE session_id = '".$session_id."'";
	    $result = myQuery($sql);
	    return $result;
    }

    public function gc($maxlifetime)
    {
    	//on supprime les vieilles sessions 
        $sql = "DELETE FROM sessions
            WHERE session_expire < ".time();
	    $query = myQuery($sql);
	    return $query;
    }
}