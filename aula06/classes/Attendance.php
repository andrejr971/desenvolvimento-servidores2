<?php 
  class Attendance {
    private Patient $patient;
    private Attendant $attendant;
    private RadiologyTechnician $technician;
    private PerformScreening $performScreening;
    private $exams = [];
    private Doctor $doctor;
    private String $code;
    private $medication = [];

    public function __construct(Patient $patient, Attendant $attendant) {
      $this->patient = $patient;
      $this->attendant = $attendant;
      $this->code = '105086';
    }

    public function setPerformScreening(PerformScreening $performScreening): void {
      $this->performScreening = $performScreening;
    }
    
    public function startedAttendance(Doctor $doctor): void {
      $this->doctor = $doctor;
    }

    public function performXRay(RadiologyTechnician $technician): void {
      $this->technician = $technician;
    }

    public function addExams(Exams $exams): void {
      $this->exams[] = $exams;
    }

    public function removeExams(Exams $exams): void {
      $index = 0;

      foreach($this->exams as $exam) {
        if ($exam->getCode() == $exams->getCode()) { 
          unset($this->exams[$index]);
        }
        $index++;
      }
    }

    public function setMedication(Array $medication): void {
      $this->medication = $medication;
    }

    public function render(): void {
      echo "/***CÓDIGO ATENDIMENTO***/";
      echo "<br />";
      echo "Número: {$this->code}";
      echo "<br />";
      echo "<br />";

      echo "/***PACIENTE***/<br />";
      $this->patient->render();
      
      echo "<br />";
      echo "<br />";

      echo "/***ATENDENTE***/<br />";
      $this->attendant->render();

      echo "<br />";
      echo "<br />";

      echo "/***TRIAGEM***/<br />";
      $this->performScreening->render();

      echo "<br />";
      echo "<br />";

      echo "/***RAIO X***/<br />";
      $this->technician->render();

      echo "<br />";
      echo "<br />";
      
      echo "/***EXAMES***/";
      echo "<br />";
      foreach ($this->exams as $exams) {
        $exams->render();
        echo "<br />";
        echo "----------------------------";
        echo "<br />";
      }

      echo "<br />";

      echo "/***DIAGNOSTICAR E MEDICAR***/<br />";
      $this->doctor->render();
      foreach ($this->medication as $medication) {
        echo "{$medication}";
        echo "<br />";
        echo "----------------------------";
        echo "<br />";
      }
    }
  }