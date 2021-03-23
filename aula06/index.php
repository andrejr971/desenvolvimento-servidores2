<?php
  require_once 'classes/People.php';
  require_once 'classes/Exams.php';
  require_once 'classes/PerformScreening.php';
  require_once 'classes/Attendance.php';

  $patient = new Patient('André', '000.000.000-00', '00.000.000-0', '0001');

  $attendant = new Attendant('Miriã', '2222');
  
  $nurse = new Nurse('Midiam', '2222');

  $performScreening = new PerformScreening($nurse);
  $performScreening->setTemperature(36.4);
  $performScreening->setPression('12/8');

  
  $radiologyTechnician = new RadiologyTechnician('Eleazar', '33333');
  $doctor = new Doctor('Jubileu', '2222');

  $urineAnalysis = new UrineAnalysis();
  $urineAnalysis->setCode(1);
  $urineAnalysis->setUrine('yYy');

  $fecesAnalysis = new FecesAnalysis();
  $fecesAnalysis->setCode(2);
  $fecesAnalysis->setFeces('yYy');

  $bloodAnalysis = new BloodAnalysis();
  $bloodAnalysis->setCode(3);
  $bloodAnalysis->setBlood('O +');

  $attendance = new Attendance($patient, $attendant);
  $attendance->setPerformScreening($performScreening);
  $attendance->startedAttendance($doctor);
  $attendance->performXRay($radiologyTechnician);
  $attendance->addExams($urineAnalysis);
  $attendance->addExams($fecesAnalysis);
  $attendance->addExams($bloodAnalysis);

  $medication = [
    'Medicação 1 - 1 doses a cada 8hr',
    'Medicação 2 - 1 dose por dia',
  ];

  $attendance->setMedication($medication);
  $attendance->render();
