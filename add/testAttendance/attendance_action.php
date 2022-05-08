<?php 

    include('./connexion.php');
    session_start();

    if (isset($_POST["action"]))
    {
        if ($_POST["action"] == "fetch")
        {
            $query=" 
        SELECT * from attendance
        inner join etudiant
        on attendance.cin=etudiant.cin";

        if (isset($_POST["search"]["value"])){
            $query.='
            etudiant.name like "%'.$_POST["search"]["value"]. '%"
            or etudiant.cin like "%'.$_POST["search"]["value"] .'%"
            or attendance.attendance_status like "%'.$_POST["search"]["value"] .'%"
            or attendance.attendance_date like "%'.$_POST["search"]["value"] .'%"
            ';
        }
        if (isset($_POST["order"]))
        {
            $quer .= '
                ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
            
            ';  /* not yet  */
        }


        }

    }
