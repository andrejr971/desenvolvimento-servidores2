<?php
  require_once 'classes/People.php';

  $patient = new Patient('André', '000.000.000-00', '00.000.000-0', '0001');
  echo "/***PACIENTE***/<br />";
  $patient->render();
  
  echo "<br />";
  echo "<br />";
  
  $attendant = new Attendant('Miriã', '2222');
  echo "/***ATENDENTE***/<br />";
  $attendant->render();

  echo "<br />";
  echo "<br />";
  
  $nurse = new Nurse('Midiam', '2222');
  echo "/***TRIAGEM***/<br />";
  $nurse->render();

  echo "<br />";
  echo "<br />";

  $radiologyTechnician = new RadiologyTechnician('Eleazar', '33333');
  echo "/***RAIO X***/<br />";
  $radiologyTechnician->render();

  echo "<br />";
  echo "<br />";

  $doctor = new Doctor('Jubileu', '2222');
  echo "/***DIAGNOSTICAR E MEDICAR***/<br />";
  $doctor->render();
